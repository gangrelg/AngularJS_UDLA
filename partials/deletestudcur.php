<?php
include "connectdb.php";

$data = json_decode(file_get_contents("php://input"));
$uidstudcur = $data -> uidstudcur;

$query = "DELETE FROM registrostud WHERE uidstudcur = ".$uidstudcur;

$dbhandle -> query($query);
?>