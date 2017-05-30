<?php

class Rol extends Cine
{

  public function showList(
    $template, $url, $nombre, $route = "", $selected = null) {
    $datos = $this->execGET($url);
    $datos = $this->setData($datos);
    $template->assign('selected', $selected);
    $template->assign('datos', $datos);
    $template->assign('nombre', $nombre);
    $template->assign('lim', (sizeof($datos[0]) - 2));
    return $template->fetch($route . 'select.component.html'); //Esto es hermoso T-T
  }

  private function setData($data)
  {
    $arr = array();
    for ($i = 0; $i < sizeof($data); $i++) {
      $arr[$i] = array(
        $data[$i]['rol_id'],
        $data[$i]['rol'],
      );
    }
    return $arr;
  }

}
