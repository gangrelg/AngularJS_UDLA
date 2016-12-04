<?php
include "connectdb.php";

$data = json_decode(file_get_contents("php://input"));

//Conexion a base de datos utilizando real_escape_string
//Dato importante
$btnName = $dbhandle -> real_escape_string($data -> btnName);

if ($btnName == 'Insertar') {

$namestudent = $dbhandle -> real_escape_string($data -> namestudent);

$matriculastudent = $dbhandle -> real_escape_string($data -> matriculastudent);

$emailstudent = $dbhandle -> real_escape_string($data -> emailstudent);

$query = "INSERT INTO student (namestudent, matriculastudent, emailstudent) VALUES ('".$namestudent."', '".$matriculastudent."', '".$emailstudent."')";

$dbhandle -> query($query);

} else {

	$id = $dbhandle -> real_escape_string($data -> id);

	$namestudent = $dbhandle -> real_escape_string($data -> namestudent);

	$emailstudent = $dbhandle -> real_escape_string($data -> emailstudent);

	$query = "UPDATE student SET namestudent = '".$namestudent."', emailstudent = '".$emailstudent."' WHERE id = $id";

	$dbhandle -> query($query);
}

?>