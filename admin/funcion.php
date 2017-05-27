<?php

include '../cine.class.php';

$web      = new Funcion;
$template = $web->templateEngine();
$template->setTemplateDir('../templates/admin/');
$template->assign('titulo', 'CM-Administrador');

if (isset($_GET['accion'])) {

  switch ($_GET['accion']) {
    case 'form_nuevo':
      $url           = $web->getPhpPath() . "pelicula/list";
      $cmb_peliculas = $web->showList($template, $url, "pelicula_id", "../");
      $template->assign('cmb_peliculas', $cmb_peliculas);

      $url = $web->getPhpPath() . "sala/listado/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $cmb_salas = $web->showList($template, $url, "sala_id", "../");
      $template->assign('cmb_salas', $cmb_salas);
      $template->display('form_funcion.html');
      die();
      break;

    case 'form_editar':
      //para obtener los valores a mostrar en el formulario
      $url = $web->getPhpPath() . "funcion/ver/"
        . $_GET['id'] . "/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $funcion = $web->execGET($url);
      // $web->debug($funcion);
      if (isset($funcion[0])) {
        //para obtener los valores del combo
        $url           = $web->getPhpPath() . "pelicula/list";
        $cmb_peliculas = $web->showList(
          $template, $url, "pelicula_id", "../", $funcion[0]['pelicula_id']);
        $template->assign('cmb_peliculas', $cmb_peliculas);

        $url = $web->getPhpPath() . "sala/listado/"
          . $_SESSION['userData']['persona_id'] . "/"
          . $_SESSION['userData']['token'];
        $cmb_salas = $web->showList(
          $template, $url, "sala_id", "../", $funcion[0]['sala_id']);
        $template->assign('cmb_salas', $cmb_salas);

        $template->assign('funcion_id', $_GET['id']);
        $template->assign('funcion', $funcion[0]);
        $template->display('form_funcion.html');
        die();
      } else {
        $web->simple_message($template, 'danger', 'No existe la funcion');
      }
      break;

    case 'nuevo':
      $url = $web->getPhpPath() . "funcion/add/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $json = array(
        "pelicula_id" => $_POST['pelicula_id'],
        "sala_id"     => $_POST['sala_id'],
        "fecha"       => $_POST['fecha'],
        "hora"        => $_POST['hora'],
        "fecha_fin"   => $_POST['fecha_fin'],
        "hora_fin"    => $_POST['hora_fin'],
      );
      $json   = json_encode($json);
      $result = $web->execPOST($url, $json);
      if (!$web->contains('pelicula_id', $result)) {
        $web->simple_message($template, 'info', 'Añadido con éxito');
      } else {
        $web->simple_message($template, 'danger', 'Error');
      }
      break;

    case 'editar':
      $url = $web->getPhpPath() . "funcion/update/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $json = array(
        "funcion_id"  => $_POST['funcion_id'],
        "pelicula_id" => $_POST['pelicula_id'],
        "sala_id"     => $_POST['sala_id'],
        "fecha"       => $_POST['fecha'],
        "hora"        => $_POST['hora'],
        "fecha_fin"   => $_POST['fecha_fin'],
        "hora_fin"    => $_POST['hora_fin'],
      );

      $json   = json_encode($json);
      $result = $web->execPUT($url, $json);
      if (!$web->contains('pais', $result)) {
        $web->simple_message($template, 'info', 'Editado con éxito');
      } else {
        $web->simple_message($template, 'danger', 'Error');
      }
      break;

    case 'eliminar':
      $url = $web->getPhpPath() . "funcion/delete/"
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

$url = $web->getPhpPath() . "funcion/listado";

//para mostrar la tabla
$funciones = $web->execGET($url);
if (sizeof($funciones) > 0) {
  if (isset($funciones['status'])) {
    session_destroy(); //se destruye la sesion
    header('Location: ../login.php');
  } else {
    $template->assign('funciones', $funciones);
  }
} else {
  $web->simple_message($template, 'danger', 'No hay funcion o no cuenta con los permisos necesarios para su visualización');
}

$template->display('funcion.html');
