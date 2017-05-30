<?php

class CategoriaPelicula extends Cine
{

  public function showList(
    $template, $url, $nombre, $route = "", $selected = null) {

    $datos = $this->execGET($url);

    // $this->debug($datos);

    $template->assign('selected', $selected);
    if ($nombre == "pelicula_id") {
      $datos = $this->setDataPeli($datos);
    } else {
      $datos = $this->setDataCat($datos);
    }

    $template->assign('datos', $datos);
    $template->assign('nombre', $nombre);
    $template->assign('lim', (sizeof($datos[0]) - 2));
    return $template->fetch($route . 'select.component.html'); //Esto es hermoso T-T
  }

  private function setDataPeli($data)
  {
    $arr = array();
    for ($i = 0; $i < sizeof($data['pelicula']); $i++) {
      $arr[$i] = array(
        $data['pelicula'][$i]['pelicula_id'],
        $data['pelicula'][$i]['titulo'],
      );
    }
    return $arr;
  }

  private function setDataCat($data)
  {
    $arr = array();
    for ($i = 0; $i < sizeof($data['categoria']); $i++) {
      $arr[$i] = array(
        $data['categoria'][$i]['categoria_id'],
        $data['categoria'][$i]['categoria'],
      );
    }
    return $arr;
  }

}
