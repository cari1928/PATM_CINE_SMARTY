<?php

include '../cine.class.php';

$web      = new Funcion;
$template = $web->templateEngine();
$template->setTemplateDir('../templates/client/');
$template->assign('titulo', 'CM-Client');

if (isset($_GET['accion'])) {

  switch ($_GET['accion']) {
    case 'select':
      $_SESSION['compra'][1] = array('funcion' => $_GET['id']);

      $url = $web->getPhpPath() . "funcion/ver/"
        . $_GET['id'] . "/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $info = $web->execGET($url);

      $_SESSION['compra'][2] = array("sala" => $info[0]['sala_id']);
      $_SESSION['compra'][3] = array("pelicula" => $info[0]['pelicula_id']);
      header('Location: asientos_disponibles.php');
      break;
  }
}

// $web->debug($_SESSION);
$url = $web->getPhpPath() . "funcion/listSuc/"
  . $_SESSION['compra'][0]['sucursal'] . "/"
  . $_SESSION['userData']['persona_id'] . "/"
  . $_SESSION['userData']['token'];
$funciones = $web->execGET($url); //para mostrar la tabla
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
