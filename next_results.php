<?php

$from = $_REQUEST["from"];
$time = date("H:i:s");



$con=mysqli_connect("localhost","root","","busdb");


if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$result = mysqli_query($con,"SELECT ROUTE, BUS_TIME, DIRECTION FROM Routes WHERE STOP_NAME LIKE \"%".substr($from,0,7)."%\" AND BUS_TIME> \"".$time."\" ORDER BY BUS_TIME ASC LIMIT 5");


 while($row = mysqli_fetch_row($result))
  {
	echo "<div class=\"ui-block-a\">Bus ".$row[0]."</div>";
	echo "<div class=\"ui-block-b\">".$row[1]."</div>";
	echo "<div class=\"ui-block-c ui-btn ui-responsive ui-icon-arrow-".substr($row[2],0,1)." ui-nodisc-icon ui-btn-icon-notext\"></div>";
   }
 
mysqli_close($con);
?>