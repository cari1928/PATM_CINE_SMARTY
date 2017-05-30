<?php

include '../cine.class.php';

$web      = new CategoriaPelicula;
$template = $web->templateEngine();
$template->setTemplateDir('../templates/admin/');
$template->assign('titulo', 'CM-Administrador');

if (isset($_GET['accion'])) {

  switch ($_GET['accion']) {
    case 'form_nuevo':

      $url = $web->getJavaPath() . "pelicula/listado/full/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $cmb_peliculas = $web->showList($template, $url, "pelicula_id", "../");

      $url            = $web->getJavaPath() . "categoria/listado";
      $cmb_categorias = $web->showList($template, $url, "categoria_id", "../");

      $template->assign('cmb_peliculas', $cmb_peliculas);
      $template->assign('cmb_categorias', $cmb_categorias);
      $template->display('form_categoria_pelicula.html');
      die();
      break;

    case 'form_editar':
      //para obtener los valores a mostrar en el formulario
      $url = $web->getJavaPath() . "sala/ver/"
        . $_GET['id'] . "/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $sala = $web->execGET($url);
      //para obtener los valores del combo
      $url = $web->getJavaPath() . "sucursal/listado/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      if (isset($sala[0])) {
        $cmb_salas = $web->showList($template, $url, "sucursal_id", "../");
        $template->assign('cmb_salas', $cmb_salas);
        $template->assign('sala_id', $_GET['id']);
        $template->assign('sala', $sala[0]);
        $template->assign('type', $_GET['accion']);
        $template->display('form_categoria_pelicula.html');
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
        $url = $web->getJavaPath() . "sala/add/"
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
      $url = $web->getJavaPath() . "sala/update/"
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
      $url = $web->getJavaPath() . "sala/delete/"
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

$url = $web->getJavaPath() . "categoria_pelicula/listado/full/"
  . $_SESSION['userData']['persona_id'] . "/"
  . $_SESSION['userData']['token'];
$categoria_peliculas = $web->execGET($url); //para mostrar la tabla

$mod = $categoria_peliculas['categoria_pelicula'];
for ($i = 0; $i < sizeof($mod); $i++) {
  $mod[$i]['categoria'] = $mod[$i]['categoria']['categoria'];
  unset($mod[$i]['categoriaId']);

  $mod[$i]['pelicula'] = $mod[$i]['pelicula']['titulo'];
  unset($mod[$i]['pelicula_id']);
}

if (sizeof($categoria_peliculas) == 0) {
  $web->simple_message($template, 'danger', 'No hay Categorias - Películas o no cuenta con los permisos necesarios para su visualización');
}

$template->assign(
  'categoria_peliculas', $mod);
$template->display('categoria_pelicula.html');
