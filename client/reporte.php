<?php

include '../cine.class.php';

$template = $web->templateEngine();
$template->setTemplateDir('../templates/client/');
$template->assign('titulo', 'CM-Cliente');
$reporte = array();

if (isset($_GET['accion'])) {
  switch ($_GET['accion']) {
    case 'comprar':
      // $web->debug($_SESSION);

      $url = $web->getPhpPath() . "compra/add/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];

      $json = array(
        "cliente_id"  => $_SESSION['userData']['persona_id'],
        "funcion_id"  => $_SESSION['compra'][1]['funcion'],
        "empleado_id" => $_SESSION['empleado_id'],
        "total"       => $_POST['total'],
        "entradas"    => $_POST['entradas'],
        "tipo_pago"   => $_POST['tipo_pago'],
      );
      $json   = json_encode($json);
      $result = $web->execPOST($url, $json);
      if (isset($compra['status'])) {
        if ($compra['status'] == "token no valido") {
          $web = new Login;
          $web->logout();
          header('Location: ../login.php');
        }
      }
      if (!$web->contains('cliente_id', $result)) {
        $web->simple_message($template, 'info', 'Añadido con éxito');
      } else {
        $web->simple_message($template, 'danger', 'Error');
      }

      // reserva los asientos
      $url = $web->getPhpPath() . "asientos_reservados/add/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];

      $json = array(
        "cliente_id" => $_SESSION['userData']['persona_id'],
        "asiento_id" => $_SESSION['compra'][4]['asiento'],
        "sala_id"    => $_SESSION['compra'][2]['sala'],
        "funcion_id" => $_SESSION['compra'][1]['funcion'],
      );
      $json   = json_encode($json);
      $result = $web->execPOST($url, $json);

      unset($_SESSION['compra']);
      header('Location: index.php');
      break;
  }
}

$url = $web->getJavaPath() . "persona/verp/"
  . $_SESSION['userData']['persona_id'] . "/"
  . $_SESSION['userData']['token'];
$usuario = $web->execGET($url);

$url = $web->getPhpPath() . "pelicula/ver/"
  . $_SESSION['compra']['3']['pelicula'];
$pelicula = $web->execGET($url);

$url = $web->getPhpPath() . "sala/ver/"
  . $_SESSION['compra']['2']['sala'] . "/"
  . $_SESSION['userData']['persona_id'] . "/"
  . $_SESSION['userData']['token'];
$sala     = $web->execGET($url);
$sucursal = $sala[0]['sucursal'][0];

// $web->debug($sala);
if (isset($sala['status'])) {
  $web = new Login;
  $web->logout();
  header('Location: ../index.php');
}

$url = $web->getPhpPath() . "funcion/ver/"
  . $_SESSION['compra']['1']['funcion'] . "/"
  . $_SESSION['userData']['persona_id'] . "/"
  . $_SESSION['userData']['token'];
$funcion = $web->execGET($url);

$numEntradas = sizeof($_SESSION['compra'][4]);
$total       = $numEntradas * 79;

$tipo_pago = "Tarjeta";
if ($_SESSION['compra'][5]['tipo_pago'] == 1) {
  $tipo_pago = "Efectivo";
}

$reporte = array(
  "usuario"   => $usuario['nombre'] . " " . $usuario['apellidos'],
  "pelicula"  => $pelicula[0]['titulo'],
  "sala"      => $sala[0]['nombre'] . " " . $sucursal['pais'] . " " . $sucursal['ciudad'] . " " . $sucursal['direccion'],
  "funcion"   => $funcion[0]['hora'] . " - " . $funcion[0]['hora_fin'],
  "total"     => $total,
  "entradas"  => $numEntradas,
  "tipo_pago" => $tipo_pago,
);

$template->assign('reporte_id', 1);
$template->assign('reporte', $reporte);
$template->display('reporte.html');
