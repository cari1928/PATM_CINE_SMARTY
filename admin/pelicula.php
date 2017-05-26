<?php

include '../cine.class.php';

$template = $web->templateEngine();
$template->setTemplateDir('../templates/admin/');
$template->assign('titulo', 'CM-Administrador');

if (isset($_GET['accion'])) {

  switch ($_GET['accion']) {
    case 'form_nuevo':
      $template->display('form_pelicula.html');
      die();
      break;

    case 'form_editar':
      //para obtener los valores a mostrar en el formulario
      $url = $web->getPhpPath() . "pelicula/ver/"
        . $_GET['id'];
      $pelicula = $web->execGET($url);
      if (isset($pelicula[0])) {
        $template->assign('pelicula_id', $_GET['id']);
        $template->assign('pelicula', $pelicula[0]);
        $template->display('form_pelicula.html');
        die();
      } else {
        $web->simple_message($template, 'danger', 'No existe la pelicula');
      }
      break;

    case 'nuevo':
      $url = $web->getPhpPath() . "pelicula/add/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $json = array(
        "titulo"        => $_POST['titulo'],
        "descripcion"   => $_POST['descripcion'],
        "f_lanzamiento" => $_POST['f_lanzamiento'],
        "lenguaje"      => $_POST['lenguaje'],
        "duracion"      => $_POST['duracion'],
        "poster"        => $_POST['poster'],
      );
      $json   = json_encode($json);
      $result = $web->execPOST($url, $json);
      if (!$web->contains('nombre', $result)) {
        $web->simple_message($template, 'info', 'Añadido con éxito');
      } else {
        $web->simple_message($template, 'danger', 'Error');
      }
      break;

    case 'editar':
      $url = $web->getPhpPath() . "pelicula/update/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $json = array(
        "pelicula_id"   => $_POST['pelicula_id'],
        "titulo"        => $_POST['titulo'],
        "descripcion"   => $_POST['descripcion'],
        "f_lanzamiento" => $_POST['f_lanzamiento'],
        "lenguaje"      => $_POST['lenguaje'],
        "duracion"      => $_POST['duracion'],
        "poster"        => $_POST['poster'],
      );
      $json   = json_encode($json);
      $result = $web->execPUT($url, $json);
      if (!$web->contains('pelicula_id', $result)) {
        $web->simple_message($template, 'info', 'Editado con éxito');
      } else {
        $web->simple_message($template, 'danger', 'Error');
      }
      break;

    case 'eliminar':
      $url = $web->getPhpPath() . "pelicula/delete/"
        . $_GET['id'] . "/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $result = $web->execDELETE($url);
      if (!$web->contains('Eliminado', $result)) {
        $web->simple_message($template, 'info', 'Eliminado con éxito');
      } else {
        $web->simple_message($template, 'danger', 'Error al intentar eliminar');
      }
      break;
  }

}

$url = $web->getPhpPath() . "pelicula/list";

//para mostrar la tabla
$peliculas = $web->execGET($url);
if (sizeof($peliculas) > 0) {
  if (isset($peliculas['status'])) {
    session_destroy(); //se destruye la sesion
    header('Location: ../login.php');
  } else {
    $template->assign('peliculas', $peliculas);
  }
} else {
  $web->simple_message($template, 'danger', 'No hay peliculas o no cuenta con los permisos necesarios para su visualización');
}

$template->display('pelicula.html');
