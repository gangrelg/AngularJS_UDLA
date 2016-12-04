<?php
include "connectdb.php";

$query = "SELECT uiddocur, nombredocente, nombrecurso FROM registrodoc, docente, curso WHERE docente.UID = registrodoc.docente_UID and curso.UIDCURSO = registrodoc.curso_UIDCURSO";
$rs = $dbhandle -> query($query);

while ($row = $rs -> fetch_assoc()) {
	$data[] = $row;

}

print json_encode($data);
?>