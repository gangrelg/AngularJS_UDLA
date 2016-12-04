<?php
include "connectdb.php";

$datax = json_decode(file_get_contents("php://input"));

$matriculastudent = $dbhandle -> real_escape_string($datax -> matriculastudent);

$query = "SELECT namestudent, nombrecurso, estadopago from student, curso, registrostud, pago where student.matriculastudent = '".$matriculastudent."' AND student.id = registrostud.student_id AND registrostud.curso_UIDCURSO = curso.UIDCURSO";

$rs = $dbhandle -> query($query);

while ($row = $rs -> fetch_assoc()) {
	$data[] = $row;

}

print json_encode($data);
?>