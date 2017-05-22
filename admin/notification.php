<?php

include '../cine.class.php';

if (isset($_GET['accion'])) {
  $action = $_GET['accion'];

  switch ($action) {
    case 'send':
      $web     = new Notification;
      $title   = $_POST['title'];
      $text    = $_POST['text'];
      $message = $_POST['message'];

      $web->conexion();
      $query  = "select token from firetoken";
      $result = $web->fetchAll($query);
      $tokens = array();

      for ($i = 0; $i < sizeof($result); $i++) {
        $tokens[] = $result[$i]["token"];
      }

      $notification = array(
        "title" => $title,
        "text"  => $text,
      );
      $message        = array("message" => $message);
      $message_status = $web->send_notification($tokens, $notification, $message);
      echo $message_status;
      break;
  }
}

$templates = $web->templateEngine();
$templates->setTemplateDir("../templates/admin/"); //???
$templates->assign('titulo', 'CM-Administrador');
$templates->display('form_notifications.html');
