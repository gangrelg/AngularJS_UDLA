<?php
include "connectdb.php";

$data = json_decode(file_get_contents("php://input"));

$matriculastudent = $dbhandle -> real_escape_string($data -> matriculastudent);

$output = array();

$query = "SELECT uidstudcur, namestudent, nombrecurso, nombredocente FROM registrostud, student, curso, docente WHERE student.matriculastudent = '".$matriculastudent."' AND registrostud.student_id = student.id AND registrostud.curso_UIDCURSO = curso.UIDCURSO AND docente.UID = registrostud.docente_UID";

$result = mysqli_query($dbhandle, $query);  
 while($row = mysqli_fetch_array($result))  
 {  
      $output[] = $row;  
 }  
 echo json_encode($output);

?>