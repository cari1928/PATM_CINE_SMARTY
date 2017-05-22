<?php

/**
 * REGISTER NOTIFICATIONS
 */

require '../cine.class.php';

$web->conexion();

if (isset($_POST["Token"])) {
  $token = $_POST["Token"];
  $web->setTabla("firetoken");
  $web->insert(array(
    "Token" => $token,
  ));
}
