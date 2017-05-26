<?php
define('PATH', 'C:/xampp/htdocs/cineMaster/');

// Archivo de configuración de CPweb
define('DB_IP', 'localhost'); //se debe modificar cada que se acceda a internet
define('DB_NAME', 'cine');
define('DB_USER', 'postgres');
define('DB_PASS', '1234');
define('DB_ENGINE', 'pgsql'); //2016-10-17 cambiado a postgres
// define('DB_ENGINE', 'mysql');

/*
Constantes del motor de plantillas (importante la última diagonal)
se relaciona la cte con una dirección
se ocupa en cp_web.class.php->templateEngine()
 */
define('TEMPLATE', PATH . 'templates/');
define('TEMPLATE_C', PATH . 'templates_c/');
define('CACHE', PATH . 'cache/');
define('CONFIGS', PATH . 'configs/');
