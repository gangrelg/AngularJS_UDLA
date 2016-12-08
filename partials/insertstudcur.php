<?php
include "connectdb.php";

$data = json_decode(file_get_contents("php://input"));
//Conexion a base de datos utilizando real_escape_string
//Dato importante
$btnNameStudCur = $dbhandle -> real_escape_string($data -> btnNameStudcur);

if ($btnNameStudCur == 'Insertar') {

$student_id = $dbhandle -> real_escape_string($data -> student_id);

$curso_uid = $dbhandle -> real_escape_string($data -> curso_uid);

$docente_uid = $dbhandle -> real_escape_string($data -> docente_uid);

$result = mysqli_query($dbhandle,"SELECT namestudent, nombrecurso FROM student, curso, registrostud, docente WHERE registrostud.curso_UIDCURSO = curso.UIDCURSO AND curso.nombrecurso = '".$curso_uid."' AND registrostud.student_id = student.id AND student.id = ".$student_id." AND docente.UID = registrostud.docente_UID");

$num_rows = mysqli_num_rows($result);

$resultx = mysqli_query($dbhandle,"SELECT namestudent, nombrecurso from student, curso, registrostud, docente WHERE registrostud.student_id = student.id AND registrostud.curso_UIDCURSO = curso.UIDCURSO AND registrostud.docente_UID = docente.UID AND docente.UID = ".$docente_uid."");

$num_rowsx = mysqli_num_rows($resultx);

if($num_rows > 0 || $num_rowsx > 3){

	echo "El estudiante ya ha tomado la materia o no existe cupo!";

}else{

	$query = mysqli_query($dbhandle,"INSERT INTO registrostud (curso_UIDCURSO, student_id, docente_UID) VALUES ((SELECT UIDCURSO FROM curso WHERE curso.nombrecurso = '".$curso_uid."'), ".$student_id.", ".$docente_uid.")");

	$dbhandle -> query($query);
}

}else {

	$uidstudcur = $dbhandle -> real_escape_string($data -> uidstudcur);

	$student_id = $dbhandle -> real_escape_string($data -> student_id);

	$curso_uid = $dbhandle -> real_escape_string($data -> curso_uid);

	$query = "UPDATE registrostud SET student_id = ".$student_id.", curso_UIDCURSO = ".$curso_uid." WHERE uidstudcur = $uidstudcur";

	$dbhandle -> query($query);
}

?>