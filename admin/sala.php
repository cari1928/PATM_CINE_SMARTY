<?php

include '../cine.class.php';

$web      = new Sala;
$template = $web->templateEngine();
$template->setTemplateDir('../templates/admin/');
$template->assign('titulo', 'CM-Administrador');

if (isset($_GET['accion'])) {

  switch ($_GET['accion']) {
    case 'form_nuevo':
      $url = $web->getPhpPath() . "sucursal/listado/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $cmb_salas = $web->showList($template, $url, "sucursal_id", "../");
      $template->assign('cmb_salas', $cmb_salas);
      $template->display('form_sala.html');
      die();
      break;

    case 'form_editar':
      //para obtener los valores a mostrar en el formulario
      $url = $web->getPhpPath() . "sala/ver/"
        . $_GET['id'] . "/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $sala = $web->execGET($url);
      //para obtener los valores del combo
      $url = $web->getPhpPath() . "sucursal/listado/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      if (isset($sala[0])) {
        $cmb_salas = $web->showList($template, $url, "sucursal_id", "../");
        $template->assign('cmb_salas', $cmb_salas);
        $template->assign('sala_id', $_GET['id']);
        $template->assign('sala', $sala[0]);
        $template->assign('type', $_GET['accion']);
        $template->display('form_sala.html');
        die();
      } else {
        $web->simple_message($template, 'danger', 'No existe la sala');
      }
      break;

    case 'nuevo':
      // llenar sala_asientos
      $numFilas  = $_POST['num_filas']; //20
      $numCols   = $_POST['num_cols']; //10
      $countFila = 65; //para que empiece desde A
      if ($numFilas > 90) {
        $web->simple_message($template, 'danger',
          'No es posible ése número de filas');
      } else {
        $url = $web->getPhpPath() . "sala/add/"
          . $_SESSION['userData']['persona_id'] . "/"
          . $_SESSION['userData']['token'];
        $json = array(
          "nombre"      => $_POST['nombre'],
          "num_filas"   => $numFilas,
          "num_cols"    => $numCols,
          "sucursal_id" => $_POST['sucursal_id'],
          "numero_sala" => $_POST['numero_sala'],
        );
        $json   = json_encode($json);
        $result = $web->execPOST($url, $json);
        if (!$web->contains('nombre', $result)) {
          $web->simple_message($template, 'info', 'Añadido con éxito');
        } else {
          $web->simple_message($template, 'danger', 'Error');
        }
      }
      break;

    case 'editar':
      $url = $web->getPhpPath() . "sala/update/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $json = array(
        "sala_id"     => $_POST['sala_id'],
        "nombre"      => $_POST['nombre'],
        "sucursal_id" => $_POST['sucursal_id'],
        "numero_sala" => $_POST['numero_sala'],
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
      $url = $web->getPhpPath() . "sala/delete/"
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

$url = $web->getPhpPath() . "sala/listado/"
  . $_SESSION['userData']['persona_id'] . "/"
  . $_SESSION['userData']['token'];

//para mostrar la tabla
$salas = $web->execGET($url);
if (sizeof($salas) > 0) {
  if (isset($salas['status'])) {
    session_destroy(); //se destruye la sesion
    header('Location: ../login.php');
  } else {
    $template->assign('salas', $salas);
  }
} else {
  $web->simple_message($template, 'danger', 'No hay salas o no cuenta con los permisos necesarios para su visualización');
}

$template->display('sala.html');
