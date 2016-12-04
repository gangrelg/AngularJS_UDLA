<?php
include "connectdb.php";

$data = json_decode(file_get_contents("php://input"));

//Conexion a base de datos utilizando real_escape_string
//Dato importante

$estadopago = $dbhandle -> real_escape_string($data -> estadopago);

$matriculastudent = $dbhandle -> real_escape_string($data -> matriculastudent);

$query = "INSERT INTO pago (estadopago, student_id) VALUES ('".$estadopago."', (SELECT student.id from student where matriculastudent = '".$matriculastudent."'))";

$dbhandle -> query($query);