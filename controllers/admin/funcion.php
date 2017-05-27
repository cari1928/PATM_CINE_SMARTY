<?php

class Funcion extends Cine
{

  public function showList(
    $template, $url, $nombre, $route = "", $selected = null) {

    $datos = $this->execGET($url);

    if ($nombre == "pelicula_id") {
      $datos = $this->setPeliData($datos);
    } else if ($nombre == "sala_id") {
      $datos = $this->setSalaData($datos);
    }

    $template->assign('selected', $selected);
    $template->assign('datos', $datos);
    $template->assign('nombre', $nombre);
    $template->assign('lim', (sizeof($datos[0]) - 2));
    return $template->fetch($route . 'select.component.html'); //Esto es hermoso T-T
  }

  private function setPeliData($data)
  {
    $arr = array();
    for ($i = 0; $i < sizeof($data); $i++) {
      $arr[$i] = array(
        $data[$i]['pelicula_id'],
        $data[$i]['titulo'],
      );
    }
    return $arr;
  }

  private function setSalaData($data)
  {
    $arr = array();
    for ($i = 0; $i < sizeof($data); $i++) {
      $sucursales = $data[$i]['sucursal'];
      for ($j = 0; $j < sizeof($sucursales); $j++) {
        $arr[$i] = array(
          $data[$i]['sala_id'],
          $data[$i]['nombre'],
          $sucursales[$j]['pais'],
          $sucursales[$j]['ciudad'],
          $sucursales[$j]['direccion'],
        );
      }
    }
    return $arr;
  }

}
