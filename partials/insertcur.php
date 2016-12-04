<?php
include "connectdb.php";

$data = json_decode(file_get_contents("php://input"));

//Conexion a base de datos utilizando real_escape_string
//Dato importante
$btnNameCur = $dbhandle -> real_escape_string($data -> btnNameCur);

if ($btnNameCur == 'Insertar') {

$nombrecurso = $dbhandle -> real_escape_string($data -> nombrecurso);

$descripcion = $dbhandle -> real_escape_string($data -> descripcion);

$rama = $dbhandle -> real_escape_string($data -> rama);

$query = "INSERT INTO curso (nombrecurso, descripcion, rama) VALUES ('".$nombrecurso."', '".$descripcion."', '".$rama."')";

$dbhandle -> query($query);

} else {

	$uidcurso = $dbhandle -> real_escape_string($data -> uidcurso);

	$nombrecurso = $dbhandle -> real_escape_string($data -> nombrecurso);

	$descripcion = $dbhandle -> real_escape_string($data -> descripcion);

	$rama = $dbhandle -> real_escape_string($data -> rama);

	$query = "UPDATE curso SET nombrecurso = '".$nombrecurso."', descripcion = '".$descripcion."', rama = '".$rama."' WHERE uidcurso = $uidcurso";

	$dbhandle -> query($query);
}

?>