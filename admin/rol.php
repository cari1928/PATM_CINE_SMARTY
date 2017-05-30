<?php

include '../cine.class.php';

$web      = new Rol;
$template = $web->templateEngine();
$template->setTemplateDir('../templates/admin/');
$template->assign('titulo', 'CM-Administrador');

if (isset($_GET['accion'])) {

  switch ($_GET['accion']) {
    case 'form_nuevo':
      $template->display('form_rol.html');
      die();
      break;

    case 'form_editar':
      $url = $web->getJavaPath() . "rol/ver/"
        . $_GET['id'] . "/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $rol = $web->execGET($url);

      if (isset($rol['rol'])) {
        $template->assign('rol_id', $_GET['id']);
        $template->assign('rol', $rol);
        $template->display('form_rol.html');
        die();
      } else {
        $web->simple_message($template, 'danger', 'No existe la pelicula');
      }
      break;

    case 'nuevo':
      $url = $web->getJavaPath() . "rol/insertar/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $json   = array("rol" => $_POST['rol']);
      $json   = json_encode($json);
      $result = $web->execPOST($url, $json);
      header('Location: rol.php');
      break;

    case 'editar':
      $url = $web->getJavaPath() . "rol/actualizar/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $json = array(
        "rol_id" => $_POST['rol_id'],
        "rol"    => $_POST['rol'],
      );
      $json   = json_encode($json);
      $result = $web->execPUT($url, $json);
      header('Location: rol.php');
      break;

    case 'eliminar':
      $url = $web->getJavaPath() . "rol/borrar/"
        . $_GET['id'] . "/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $result = $web->execDELETE($url);
      header('Location: rol.php');
      break;
  }

}

$url = $web->getJavaPath() . "rol/listado/"
  . $_SESSION['userData']['persona_id'] . "/"
  . $_SESSION['userData']['token'];
$roles = $web->execGET($url); //para mostrar la tabla

if (sizeof($roles) == 0) {
  session_destroy(); //se destruye la sesion
  header('Location: ../login.php');
}
if (sizeof($roles) > 0) {
  if (isset($roles['ERROR'])) {
    session_destroy(); //se destruye la sesion
    header('Location: ../login.php');
  } else {
    $template->assign('roles', $roles['rol']);
  }
} else {
  $web->simple_message($template, 'danger', 'No hay roles o no cuenta con los permisos necesarios para su visualización');
}

$template->display('rol.html');
