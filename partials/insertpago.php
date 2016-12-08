<?php
include "connectdb.php";

$data = json_decode(file_get_contents("php://input"));

//Conexion a base de datos utilizando real_escape_string
//Dato importante

$estadopago = $dbhandle -> real_escape_string($data -> estadopago);

$matriculastudent = $dbhandle -> real_escape_string($data -> matriculastudent);

$result = mysqli_query($dbhandle, "SELECT namestudent, matriculastudent, estadopago FROM student, pago WHERE student.matriculastudent = '".$matriculastudent."' AND student.id = pago.student_id AND pago.estadopago = 'pagado'");

$num_rows = mysqli_num_rows($result);

if($num_rows == 1){
	echo "El estudiante ya ha realizado el pago del periodo!";
}else{

$query = "UPDATE pago
  SET pago.estadopago='pagado'
WHERE pago.student_id =
  (
    SELECT student_id
    FROM student WHERE student.matriculastudent = '".$matriculastudent."'
  )";

$dbhandle -> query($query);
}