<?php

include '../cine.class.php';

$templates = $web->templateEngine();
$templates->setTemplateDir("../templates/admin/"); //???
$web = new Sucursal;
$web->conexion();
$templates->assign('titulo', 'CM-Administrador');

if (isset($_GET['accion'])) {

  switch ($_GET['accion']) {
    case 'form_nuevo':
      $templates->assign('type', $_GET['accion']);
      $templates->display('form_sucursal.html');
      die();
      break;

    case 'form_editar':
      break;

    case 'nuevo':
      $web->execAPI("");
      break;

    case 'editar':
      break;

    case 'eliminar':
      break;
  }

}

//para mostrar la tabla
$sucursales = $web
  ->execAPI("http://192.168.1.67/cineSlim/public/index.php/api/sucursal/listado/app");
$templates->assign('sucursales', $sucursales);
$templates->display('sucursal.html');
