<?php
include "connectdb.php";

$query = "SELECT * FROM curso";
$rs = $dbhandle -> query($query);

while ($row = $rs -> fetch_assoc()) {
	$data[] = $row;

}

print json_encode($data);
?>