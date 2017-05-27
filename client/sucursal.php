<?php

include '../cine.class.php';

$template = $web->templateEngine();
$template->setTemplateDir('../templates/client/');
$template->assign('titulo', 'CM-Cliente');

if (isset($_GET['accion'])) {

  switch ($_GET['accion']) {
    case 'select':
      $_SESSION['compra'][0] = array('sucursal' => $_GET['id']);
      // $web->debug($_SESSION);
      header('Location: funcion.php'); // mostrar funciones disponibles en ésa sucursal
      break;
  }

}

$url = $web->getPhpPath() . "sucursal/listado/"
  . $_SESSION['userData']['persona_id'] . "/"
  . $_SESSION['userData']['token'];

//para mostrar la tabla
$sucursales = $web->execGET($url);
if (sizeof($sucursales) > 0) {
  if (isset($sucursales['status'])) {
    session_destroy(); //se destruye la sesion
    header('Location: ../login.php');
  } else {
    $template->assign('sucursales', $sucursales);
  }
} else {
  $web->simple_message($template, 'danger', 'No hay sucursales o no cuenta con los permisos necesarios para su visualización');
}

$template->display('sucursal.html');
