<?php

/**
 * IGNORAR LAS CARPETAS:
 * CSS, JS, SCSS, VENDOR
 * IGNORAR LOS ARCHIVOS:
 * gulpfile.js, package.json
 */

include '../cine.class.php';

// $web->debug($_SESSION);

$templates = $web->templateEngine();
$templates->setTemplateDir("../templates/client/"); //???
$templates->assign('titulo', 'CM-Client');
$templates->display('index.html');
