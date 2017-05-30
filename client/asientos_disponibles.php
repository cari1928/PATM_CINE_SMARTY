<?php

include '../cine.class.php';

$template = $web->templateEngine();
$template->setTemplateDir('../templates/client/');
$template->assign('titulo', 'CM-Cliente');

// $web->debug($_SESSION);

if (isset($_GET['accion'])) {

  switch ($_GET['accion']) {
    case 'select':
      $_SESSION['compra'][4] = array("asiento" => $_GET['id']);
      $_SESSION['compra'][5] = array('tipo_pago' => "Tarjeta");
      // $web->debug($_SESSION);
      header('Location: compra.php');
      break;
  }

}

$url = $web->getPhpPath() . "sala_asientos/disponibles/"
  . $_SESSION['compra'][1]['funcion'] . "/"
  . $_SESSION['compra'][0]['sucursal'] . "/"
  . $_SESSION['compra'][2]['sala'] . "/"
  . $_SESSION['userData']['persona_id'] . "/"
  . $_SESSION['userData']['token'];

//para mostrar la tabla
$asientos = $web->execGET($url);

if (sizeof($asientos) > 0) {
  if (isset($asientos['status'])) {
    session_destroy(); //se destruye la sesion
    header('Location: ../login.php');
  } else {
    $template->assign('asientos', $asientos);
  }
} else {
  $web->simple_message($template, 'danger', 'No hay asientos o no cuenta con los permisos necesarios para su visualización');
}

$template->display('asientos_disponibles.html');
