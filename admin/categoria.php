<?php

include '../cine.class.php';

// $web      = new Categoria;
$template = $web->templateEngine();
$template->setTemplateDir('../templates/admin/');
$template->assign('titulo', 'CM-Administrador');

if (isset($_GET['accion'])) {

  switch ($_GET['accion']) {
    case 'form_nuevo':
      $template->display('form_categoria.html');
      die();
      break;

    case 'form_editar':
      $url       = $web->getJavaPath() . "categoria/ver/" . $_GET['id'];
      $categoria = $web->execGET($url);
      if (sizeof($categoria) > 0) {
        $template->assign('categoria_id', $_GET['id']);
        $template->assign('categoria', $categoria);
        $template->display('form_categoria.html');
        die();
      } else {
        $web->simple_message($template, 'danger', 'No existe la sala');
      }
      break;

    case 'nuevo':
      $url = $web->getJavaPath() . "categoria/insertar/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $json   = array("categoria" => $_POST['categoria']);
      $json   = json_encode($json);
      $result = $web->execPOST($url, $json);
      if (!$web->contains('"status": "POST"', $result)) {
        $web->simple_message($template, 'info', 'Añadido con éxito');
      } else {
        $web->simple_message($template, 'danger', 'Error');
      }
      header('Location: categoria.php');
      break;

    case 'editar':
      $url = $web->getJavaPath() . "categoria/actualizar/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $json = array(
        "categoria_id" => $_POST['categoria_id'],
        "categoria"    => $_POST['categoria'],
      );
      $json   = json_encode($json);
      $result = $web->execPUT($url, $json);
      if (!$web->contains('"status": "PUT"', $result)) {
        $web->simple_message($template, 'info', 'Editado con éxito');
      } else {
        $web->simple_message($template, 'danger', 'Error');
      }
      break;

    case 'eliminar':
      $url = $web->getJavaPath() . "categoria/borrar/"
        . $_GET['id'] . "/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $result = $web->execDELETE($url);
      if (!$web->contains('"status": "DELETE"', $result)) {
        $web->simple_message($template, 'info', 'Eliminado con éxito');
      } else {
        $web->simple_message($template, 'danger', 'Error al intentar eliminar');
      }
      break;
  }

}

$url = $web->getJavaPath() . "categoria/listado";

//para mostrar la tabla
$categorias = $web->execGET($url);
if (sizeof($categorias) > 0) {
  if (isset($categorias['status'])) {
    session_destroy(); //se destruye la sesion
    header('Location: ../login.php');
  } else {
    $template->assign('categorias', $categorias['categoria']);
  }
} else {
  $web->simple_message($template, 'danger', 'No hay categorias o no cuenta con los permisos necesarios para su visualización');
}

$template->display('categoria.html');
