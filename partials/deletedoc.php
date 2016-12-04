<?php
include "connectdb.php";

$data = json_decode(file_get_contents("php://input"));
$uid = $data -> uid;

$query = "DELETE FROM docente WHERE uid = ".$uid;

$dbhandle -> query($query);
?>