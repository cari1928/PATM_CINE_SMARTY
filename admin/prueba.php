<?php
include '../cine.class.php';

$url = $web->getJavaPath() . "pelicula/listado/full/"
  . $_SESSION['userData']['persona_id'] . "/"
  . "19f0e99757f05050c995919bd8b3ff45";

$datos = $web->execGET($url);

$web->debug($datos);
