<?php
include "connectdb.php";

$data = json_decode(file_get_contents("php://input"));
$uidcurso = $data -> uidcurso;

$query = "DELETE FROM curso WHERE uidcurso = ".$uidcurso;

$dbhandle -> query($query);
?>