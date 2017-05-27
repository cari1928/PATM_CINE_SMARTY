<?php

include '../cine.class.php';

$template = $web->templateEngine();
$template->setTemplateDir('../templates/client/');
$template->assign('titulo', 'CM-Cliente');

$url = $web->getPhpPath() . "compra/listado/cliente/"
  . $_SESSION['userData']['persona_id'] . "/"
  . $_SESSION['userData']['token'];
$compras = $web->execGET($url); //para mostrar la tabla

for ($i = 0; $i < sizeof($compras); $i++) {
  $pelicula = $compras[$i]['funcion'][0]['pelicula'];
  unset($compras[$i]['funcion'][0]['pelicula']);
  $compras[$i]['pelicula'] = $pelicula;

  $sucursal = $compras[$i]['funcion'][0]['sala'][0]['sucursal'];
  unset($compras[$i]['funcion'][0]['sala'][0]['sucursal']);
  $compras[$i]['sucursal'] = $sucursal;

  $sala = $compras[$i]['funcion'][0]['sala'];
  unset($compras[$i]['funcion'][0]['sala']);
  $compras[$i]['sala'] = $sala;
}

// $web->debug($compras);

$template->assign('compras', $compras);
$template->display('historial.html');
