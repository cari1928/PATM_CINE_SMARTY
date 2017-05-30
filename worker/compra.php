<?php

include '../cine.class.php';

$template = $web->templateEngine();
$template->setTemplateDir('../templates/client/');
$template->assign('titulo', 'CM-Cliente');

if (isset($_GET['accion'])) {
  switch ($_GET['accion']) {
    case 'select':
      $_SESSION['compra'][5] = array('tipo_pago' => $_GET['id']);
      header('Location: reporte.php');
      break;
  }
}

$template->display('compra.html');
