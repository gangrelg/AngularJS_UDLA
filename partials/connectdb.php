<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "ingweb");

$dbhandle = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE) or die ("No se puede conectar a la BDD!");

?>