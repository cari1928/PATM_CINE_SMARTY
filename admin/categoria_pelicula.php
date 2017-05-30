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
      $url = $web->getJavaPath() . "categoria_pelicula/ver/"
        . $_GET['id'] . "/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $cp = $web->execGET($url);

      if (!isset($cp['pelicula_id'])) {return;}

      $url = $web->getJavaPath() . "pelicula/listado/full/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $cmb_peliculas = $web->showList(
        $template, $url, "pelicula_id", "../", $cp['pelicula_id']);

      $url            = $web->getJavaPath() . "categoria/listado";
      $cmb_categorias = $web->showList(
        $template, $url, "categoria_id", "../", $cp['categoria_id']);

      $template->assign('cmb_peliculas', $cmb_peliculas);
      $template->assign('cmb_categorias', $cmb_categorias);
      $template->assign('categoria_pelicula_id', $_GET['id']);
      $template->display('form_categoria_pelicula.html');
      die();
      break;

    case 'nuevo':
      $url = $web->getJavaPath() . "categoria_pelicula/insertar/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $json = array(
        "pelicula_id"  => $_POST['pelicula_id'],
        "categoria_id" => $_POST['categoria_id'],
      );
      $json   = json_encode($json);
      $result = $web->execPOST($url, $json);
      if (!$web->contains('ERROR', $result)) {
        $web->simple_message($template, 'info', 'Añadido con éxito');
      } else {
        $web->simple_message($template, 'danger', 'Error');
      }
      header('Location: categoria_pelicula.php');
      break;

    case 'editar':
      $url = $web->getJavaPath() . "categoria_pelicula/actualizar/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $json = array(
        "categoria_pelicula_id" => $_POST['categoria_pelicula_id'],
        "categoria_id"          => $_POST['categoria_id'],
        "pelicula_id"           => $_POST['pelicula_id'],
      );
      $json   = json_encode($json);
      $result = $web->execPUT($url, $json);
      if (!$web->contains('PUT', $result)) {
        $web->simple_message($template, 'info', 'Editado con éxito');
      } else {
        $web->simple_message($template, 'danger', 'Error');
      }
      header('Location: categoria_pelicula.php');
      break;

    case 'eliminar':
      $url = $web->getJavaPath() . "categoria_pelicula/borrar/"
        . $_GET['id'] . "/"
        . $_SESSION['userData']['persona_id'] . "/"
        . $_SESSION['userData']['token'];
      $result = $web->execDELETE($url);
      if (!$web->contains('DELETE', $result)) {
        $web->simple_message($template, 'info', 'Eliminado con éxito');
      } else {
        $web->simple_message($template, 'danger', 'Error al intentar eliminar');
      }
      header('Location: categoria_pelicula.php');
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
