<?php
include "connectdb.php";

$data = json_decode(file_get_contents("php://input"));
$uiddocur = $data -> uiddocur;

$query = "DELETE FROM registrodoc WHERE uiddocur = ".$uiddocur;

$dbhandle -> query($query);
?>