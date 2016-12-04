<?php
include "connectdb.php";

$data = json_decode(file_get_contents("php://input"));

//Conexion a base de datos utilizando real_escape_string
//Dato importante

$btnNameDocCur = $dbhandle -> real_escape_string($data -> btnNameDoccur);

if ($btnNameDocCur == 'Insertar') {

$docente_uid = $dbhandle -> real_escape_string($data -> docente_uid);

$curso_uid = $dbhandle -> real_escape_string($data -> curso_uid);

$result = mysqli_query($dbhandle,"SELECT * FROM registrodoc WHERE curso_UIDCURSO = ".$curso_uid." AND docente_UID = ".$docente_uid."");

$num_rows = mysqli_num_rows($result);

if($num_rows > 0){
	echo "Docente y Curso registrados!";
}else{

$query = "INSERT INTO registrodoc (curso_UIDCURSO, docente_UID) VALUES (".$curso_uid.", ".$docente_uid.")";

$dbhandle -> query($query);
}

} else {

	$uiddocur = $dbhandle -> real_escape_string($data -> uiddocur);

	$docente_uid = $dbhandle -> real_escape_string($data -> docente_uid);

	$curso_uid = $dbhandle -> real_escape_string($data -> curso_uid);

	$query = "UPDATE registrodoc SET docente_UID = ".$docente_uid.", curso_UIDCURSO = ".$curso_uid." WHERE uiddocur = $uiddocur";

	$dbhandle -> query($query);
}

?>