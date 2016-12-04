<?php
include "connectdb.php";

$query = "SELECT uidstudcur, namestudent, nombrecurso FROM registrostud, student, curso WHERE student.id = registrostud.student_ID and curso.UIDCURSO = registrostud.curso_UIDCURSO";
$rs = $dbhandle -> query($query);

while ($row = $rs -> fetch_assoc()) {
	$data[] = $row;

}

print json_encode($data);
?>