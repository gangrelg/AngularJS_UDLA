<?php

define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'ingweb');

$dbhandle = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die ("No se puede conectar a la BDD!");

?>