<?php
include '../cine.class.php';

$url = $web->getPhpPath() . "sala/ver/"
  . 6 . "/"
  . $_SESSION['userData']['persona_id'] . "/"
  . $_SESSION['userData']['token'];
$sala = $web->execGET($url);

$numFilas  = $sala[0]['num_filas'];
$numCols   = $sala[0]['num_cols'];
$countFila = 65;

$web->conexion();
$rows = $web->fetchAll("SELECT MAX(funcion_id) from funcion");

for ($i = 0; $i < $numFilas; $i++) {
  $fila = chr($countFila);
  ++$countFila;
  for ($j = 0; $j < $numCols; $j++) {
    $columna = ($j + 1);

    $url = $web->getPhpPath() . "sala_asientos/add/"
      . $_SESSION['userData']['persona_id'] . "/"
      . $_SESSION['userData']['token'];
    $json = array(
      "columna"    => $columna,
      "fila"       => $fila,
      "sala_id"    => 6,
      "funcion_id" => $rows[0]['max'],
    );
    $json   = json_encode($json);
    $result = $web->execPOST($url, $json);
  }
}
