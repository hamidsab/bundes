<?php

$from = $_REQUEST["from"];
$to = $_REQUEST["to"];
$time = date("H:i:s");

$counter =0;

$con=mysqli_connect("localhost","root","","busdb");


if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
// $result = mysqli_query($con,'SELECT ROUTE, BUS_TIME, DIRECTION FROM Routes WHERE STOP_NAME="'.$from.'" AND BUS_TIME> "15:00" AND DIRECTION="down" ORDER BY BUS_TIME');
  // $result = mysqli_query($con,"SELECT BUS_TIME, Route, Direction FROM Routes WHERE STOP_NAME='Klinikum' AND BUS_TIME>'11:30' ORDER BY BUS_TIME ASC LIMIT 5");
  
$result = mysqli_query($con,"SELECT DISTINCT Route FROM routes WHERE STOP_NAME LIKE \"%".substr($from,0,7)."%\"
AND Route IN (
SELECT DISTINCT Route FROM routes WHERE STOP_NAME LIKE \"%".substr($to,0,7)."%\");");
// echo "SELECT DISTINCT Route FROM routes WHERE STOP_NAME LIKE \"%$from%\"
// AND Route IN (
// SELECT DISTINCT Route FROM routes WHERE STOP_NAME LIKE \"%$to%\");";


if (mysqli_num_rows($result)==0){
	$to = "Goetheplatz";
	$result = mysqli_query($con,"SELECT DISTINCT Route FROM routes WHERE STOP_NAME LIKE \"%".substr($from,0,7)."%\"
AND Route IN (
SELECT DISTINCT Route FROM routes WHERE STOP_NAME = \"".substr($to,0,7)."\");");
}
// while($row = mysqli_fetch_row($result))
 // {
 	// print_r($row);
 // echo "<div class=\"ui-block-a\">Bus ".$row[0]."</div>";
// // echo "<div class=\"ui-block-b\">".$row[1]."</div>";
// //   ui-arrow-".substr($row[2],0,1)."
  // }
  while($row = mysqli_fetch_row($result))
 {
 	$timeResult0 = mysqli_query($con,"SELECT MIN(BUS_TIME) FROM Routes WHERE STOP_NAME LIKE \"%".substr($from,0,7)."%\" AND Route =".$row[0]." LIMIT 1");
	$fromTime = mysqli_fetch_row($timeResult0);
 	$timeResult1 = mysqli_query($con,"SELECT MIN(BUS_TIME) FROM Routes WHERE STOP_NAME LIKE \"%".substr($to,0,7)."%\" AND Route =".$row[0]." LIMIT 1");
	$toTime = mysqli_fetch_row($timeResult1);
	$direction = ($fromTime<$toTime?"up":"down");
	$finalResult = mysqli_query($con,'SELECT ROUTE, BUS_TIME FROM Routes WHERE STOP_NAME LIKE "%'.substr($from,0,7).'%" AND BUS_TIME> "'.$time.'" AND DIRECTION="'.$direction.'" ORDER BY BUS_TIME LIMIT 5');
	
	 while($finalRow = mysqli_fetch_row($finalResult))
	  {
	  echo "<div class=\"ui-block-a\">Bus ".$finalRow[0]." to $to</div>";
	  echo "<div class=\"ui-block-b\">".$finalRow[1]."</div>";
	  $counter++;
	  if ($counter==5) {
	  	break;break;
	  }
	  }
 }
mysqli_close($con);
?>