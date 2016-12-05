<?php
include "connectdb.php";

$query = "SELECT id, namestudent, estadopago, emailstudent FROM student, pago WHERE student.id = pago.student_id AND pago.estadopago = 'no pagado'";
$rs = $dbhandle -> query($query);

while ($row = $rs -> fetch_assoc()) {
	$data[] = $row;

}

print json_encode($data);
?>