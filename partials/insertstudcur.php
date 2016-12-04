<?php
include "connectdb.php";

$data = json_decode(file_get_contents("php://input"));

//Conexion a base de datos utilizando real_escape_string
//Dato importante
$btnNameStudCur = $dbhandle -> real_escape_string($data -> btnNameStudcur);

if ($btnNameStudCur == 'Insertar') {

$student_id = $dbhandle -> real_escape_string($data -> student_id);

$curso_uid = $dbhandle -> real_escape_string($data -> curso_uid);

$query = "INSERT INTO registrostud (curso_UIDCURSO, student_id) VALUES (".$curso_uid.", ".$student_id.")";

$dbhandle -> query($query);

} else {

	$uidstudcur = $dbhandle -> real_escape_string($data -> uidstudcur);

	$student_id = $dbhandle -> real_escape_string($data -> student_id);

	$curso_uid = $dbhandle -> real_escape_string($data -> curso_uid);

	$query = "UPDATE registrostud SET student_id = ".$student_id.", curso_UIDCURSO = ".$curso_uid." WHERE uidstudcur = $uidstudcur";

	$dbhandle -> query($query);
}

?>