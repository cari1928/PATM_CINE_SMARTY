<?php
include 'cine.class.php';

$templates = $web->templateEngine();
$web       = new Login;
$web->conexion();

if (isset($_GET['accion'])) {
  $accion = $_GET['accion'];

  switch ($accion) {
    case 'login':
      $username = $_POST['username'];
      $pass     = $_POST['pass'];
      $web->newLogin($username, $pass);
      die();
      break;

    case 'logout':
      $web->logout();
      header('Location: index.php');
      break;
  }
}

$templates->setTemplateDir("templates");
$templates->assign('titulo', 'CineMaster');
$templates->display('login.html');
