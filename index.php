<?php
// Create connection
$con=mysqli_connect("localhost","root","","busdb");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $result = mysqli_query($con,"SELECT BUS_TIME, Route, Direction FROM Routes WHERE STOP_NAME='Klinikum' AND BUS_TIME> '11:30' ORDER BY BUS_TIME ASC LIMIT 5");
//$result = mysqli_query($con,"SELECT * FROM Routes");
while($row = mysqli_fetch_array($result))
 {
  echo $row['BUS_TIME'];echo "  ";//, Route, Direction'];
  echo $row['Route'];echo "  ";//, Route, Direction'];
  echo $row['Direction'];echo "<br>";//, Route, Direction'];
 // echo "<br>";
  }
/*
$a = "SELECT MIN(BUS_TIME) FROM Routes WHERE STOP_NAME= '";

$locat = "Goetheplatz";

$b = "' AND Route IN (SELECT DISTINCT Route FROM routes WHERE STOP_NAME = 'Goetheplatz' AND Route IN (SELECT DISTINCT Route FROM routes WHERE STOP_NAME = 'Am Posechsen Garten')));";

$q = $a + $locat + $b;

$result = mysqli_query($con,$q);
$row = mysqli_fetch_array($result);

$a=$row['MIN(BUS_TIME)']; //= mysql_fetch_assoc($result,'MIN(BUS_TIME)');//($result);
echo $a;*/
//return $a;
mysqli_close($con);
?>