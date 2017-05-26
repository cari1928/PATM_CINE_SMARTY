<?php

include '../cine.class.php';

$template = $web->templateEngine();
$template->setTemplateDir('../templates/admin/');
$web = new Sucursal;
$template->assign('titulo', 'CM-Administrador');

if (isset($_GET['accion'])) {

  switch ($_GET['accion']) {
    case 'form_nuevo':
      $template->assign('type', $_GET['accion']);
      $template->display('form_sucursal.html');
      die();
      break;

    case 'form_editar':
      $url = $web->getPhpPath() . "sucursal/ver/"
        . $_GET['id'] . "/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $sucursal = $web->execGET($url);
      if (isset($sucursal[0])) {
        $template->assign('sucursal_id', $_GET['id']);
        $template->assign('sucursal', $sucursal[0]);
        $template->assign('type', $_GET['accion']);
        $template->display('form_sucursal.html');
        die();
      } else {
        $web->simple_message($template, 'danger', 'No existe la sucursal');
      }
      break;

    case 'nuevo':
      $url = $web->getPhpPath() . "sucursal/add/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $json = array(
        "pais"      => $_POST['pais'],
        "ciudad"    => $_POST['ciudad'],
        "direccion" => $_POST['pais'],
        "latitud"   => $_POST['latitud'],
        "longitud"  => $_POST['longitud'],
      );
      $json   = json_encode($json);
      $result = $web->execPOST($url, $json);

      if (!$web->contains('pais', $result)) {
        $web->simple_message($template, 'info', 'Añadido con éxito');
      } else {
        $web->simple_message($template, 'danger', 'Error');
      }

      break;

    case 'editar':
      $url = $web->getPhpPath() . "sucursal/update/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $json = array(
        "sucursal_id" => $_POST['sucursal_id'],
        "pais"        => $_POST['pais'],
        "ciudad"      => $_POST['ciudad'],
        "direccion"   => $_POST['direccion'],
        "latitud"     => $_POST['latitud'],
        "longitud"    => $_POST['longitud'],
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
      $url = $web->getPhpPath() . "sucursal/delete/"
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
