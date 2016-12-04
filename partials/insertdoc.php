<?php
include "connectdb.php";

$data = json_decode(file_get_contents("php://input"));

//Conexion a base de datos utilizando real_escape_string
//Dato importante
$btnNameDoc = $dbhandle -> real_escape_string($data -> btnNameDoc);

if ($btnNameDoc == 'Insertar') {

$nombredocente = $dbhandle -> real_escape_string($data -> nombredocente);

$cedula = $dbhandle -> real_escape_string($data -> cedula);

$emaildocente = $dbhandle -> real_escape_string($data -> emaildocente);

$query = "INSERT INTO docente (nombredocente, cedula, emaildocente) VALUES ('".$nombredocente."', '".$cedula."', '".$emaildocente."')";

$dbhandle -> query($query);

} else {

	$uid = $dbhandle -> real_escape_string($data -> uid);

	$nombredocente = $dbhandle -> real_escape_string($data -> nombredocente);

	$emaildocente = $dbhandle -> real_escape_string($data -> emaildocente);

	$query = "UPDATE docente SET nombredocente = '".$nombredocente."', emaildocente = '".$emaildocente."' WHERE uid = $uid";

	$dbhandle -> query($query);
}

?>