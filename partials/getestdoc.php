<?php
include "connectdb.php";

$data = json_decode(file_get_contents("php://input"));

$curso_uid = $dbhandle -> real_escape_string($data -> curso_uid); 

$output = array(); 

$query = "SELECT docente.nombredocente, docente.UID FROM docente, curso, registrodoc WHERE curso.nombrecurso = '".$curso_uid."' AND docente.UID = registrodoc.docente_UID and curso.UIDCURSO = registrodoc.curso_UIDCURSO";

 $result = mysqli_query($dbhandle, $query); 

 while($row = mysqli_fetch_array($result))  
 {  
      $output[] = $row;  
 }  
 echo json_encode($output);
?>