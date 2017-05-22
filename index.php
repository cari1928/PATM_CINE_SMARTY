<?php

include 'cine.class.php';

$templates = $web->templateEngine();
$templates->setTemplateDir("templates"); //???
$templates->assign('titulo', 'CineMaster');
$templates->display('index.html');
