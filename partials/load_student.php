 <?php  
 //load_country.php  
 $connect = mysqli_connect("localhost", "root", "", "ingweb");  
 $output = array();  
 $query = "SELECT * FROM student ORDER BY namestudent ASC";  
 $result = mysqli_query($connect, $query);  
 while($row = mysqli_fetch_array($result))  
 {  
      $output[] = $row;  
 }  
 echo json_encode($output);  
 ?>  