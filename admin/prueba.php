<?php
include '../cine.class.php';

$url       = $web->getJavaPath() . "categoria/ver/1";
$categoria = $web->execGET($url);

$web->debug($categoria);
