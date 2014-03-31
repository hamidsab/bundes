<?php 
if isset($_REQUEST["selectHome"]){
$selectHome =$_REQUEST["selectHome"];
echo $selectHome;
}
?>
<!DOCTYPE html>

<html>
	<head>
		<!--meta charset="utf-8"-->
		<title>Weimar bus</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	 	<!-- jQuery & jQuery mobile -->
		<link rel="stylesheet" href="lib/jqm1.4.2/jquery.mobile-1.4.2.min.css" />
		<script src="lib/jq1.9.1/jquery-1.9.1.min.js"></script>
		<script src="lib/jqm1.4.2/jquery.mobile-1.4.2.min.js"></script>
	
	 	<!-- Geolocation stuff -->
		<!--script type="text/javascript" src="vid.js"></script--> 
		<!--input type="button" onclick="javascript: stopCall();"/--> 
	
	    <!-- PhoneGap -->
		<script src="js/cordova-2.6.0.js" type="text/javascript"></script>
		<script src="js/phonegap-helper.js" type="text/javascript"></script>
		
		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/app.css" />
	</head>
	<body>		
		
		<!-- App Start Page -->
  		<div data-role="page" id="startup" data-theme="b">
  			
  			
			<div data-theme="" data-role="header" data-position="fixed" data-tap-toggle="false">
	        	<h3>Weimar Bus</h3>
	        	<!-- Home icon-->
  				<a href="#startup" class="ui-btn ui-corner-all ui-icon-home ui-btn-left ui-btn-icon-notext ui-alt-icon ui-nodisc-icon"></a>
	        	<!-- Gear Icon for settings-->
  				<a href="#settings" class="ui-btn ui-corner-all ui-icon-gear ui-btn-right ui-btn-icon-notext ui-alt-icon ui-nodisc-icon"></a>
	        </div>
	        <div data-role="content">
	    		<a href="#go_to" class="ui-btn" data-transition="slide" data-direction="reverse">Go to</a>
	    		<a href="#next_bus" class="ui-btn" data-transition="slide">Next bus</a>
	    	</div>
		</div>
	
		<!-- Go to -->
		<div data-role="page" id="go_to" data-back-btn-text="Start" data-add-back-btn="true" data-theme="b">
		  	<div data-theme="b" data-role="header" data-position="fixed" data-tap-toggle="false">
	        	<h3>Go to</h3>
	        	<!-- Home icon-->
  				<a href="#startup" class="ui-btn ui-corner-all ui-icon-home ui-btn-left ui-btn-icon-notext ui-alt-icon ui-nodisc-icon"></a>
	        	<!-- Gear Icon for settings-->
  				<a href="#settings" class="ui-btn ui-corner-all ui-icon-gear ui-btn-right ui-btn-icon-notext ui-alt-icon ui-nodisc-icon"></a>
	    	</div>
	    
	    	<div data-role="content">
	    		<form action="./index_1.php" method="post" >	    	
	    			<label>From</label>
	    			
	    			<select id="selectHome" onclick="onSelectHome()">
	        		<option value></option>
	        		<option value="gps" onclick="getCoords()">Current position</option>
	        		<option value="apg">Am posecksen garten</option>
	        		<option value="buw">Bauhaus Uni</option>
	        		<option value="brk">Berkaerstr</option>
	        		<option value="caa">Carl August allee</option>
	        		<option value="ets">Ernst Thaelmann Strasse</option>
	        		<option value="ern">Ernst Thaelmann Strasse/Meyerstr</option>
	        		<option value="fkb">Falkenburg</option>
	        		<option value="atr">Friedenstr/Atrium</option>
	        		<option value="fri">Friedhof</option>
	        		<option value="fes">Friedrich Ebert str</option>
	        		<option value="gpl">Goetheplatz</option>
	        		<option value="gps">Gropiusstr</option>
	        		<option value="hbf">Hauptbahnhof</option>
	        		<option value="hel">Hellerweg/EJBW</option> 	
	        		<option value="hez">Helmholtzstr</option> 					
  					<option value="kar">Karl Hausknect str</option>
  					<option value="klk">Klinikum</option>
  					<option value="mkl">Merketal</option>
  					<option value="myr">Meyerstr</option>
  					<option value="rai">Rainer-Maria-Rilke-Str</option>
  					<option value="ros">Rosenweg</option>
  					<option value="rbs">Rudolf Breitscheid str</option>
  					<option value="sch">Schoppenhauerstr</option>
  					<option value="wpl">Wielandplatz</option>
  					<option value="wdg">Wilder Graben</option>
  					<option value="zhg">Zum Hospital Graben</option>  						
				</select>				
	    		</form>
	    		<a href="#" ></a>
				<span class="ui-btn ui-btn-inline ui-corner-all ui-icon-location ui-btn-icon-notext" onclick="getCoords()"></span>
	    		<div id="bottomButtons" data-role="controlgroup" data-type="horizontal" align="center">
	    			<a href="#startup" class="ui-btn ui-btn-inline ui-icon-arrow-l ui-btn-icon-notext ui-alt-icon ui-nodisc-icon" data-transition="slide" data-direction="reverse"></a>
	    			<a href="#destination" class="ui-btn ui-btn-inline ui-icon-arrow-r ui-btn-icon-notext ui-alt-icon ui-nodisc-icon" data-transition="slide" onclick="$(this).submit();"></a>	    	
	    		</div>
	    	</div>
		</div>
	
		<!-- destination -->
		<div data-role="page" id="destination" data-back-btn-text="Start" data-add-back-btn="true" data-theme="b">
		  	<div data-theme="b" data-role="header" data-position="fixed" data-tap-toggle="false">
	        	<h3>Destination</h3>
	        	<!-- Home icon-->
  				<a href="#startup" class="ui-btn ui-corner-all ui-icon-home ui-btn-left ui-btn-icon-notext ui-alt-icon ui-nodisc-icon"></a>
	        	<!-- Gear Icon for settings-->
  				<a href="#settings" class="ui-btn ui-corner-all ui-icon-gear ui-btn-right ui-btn-icon-notext ui-alt-icon ui-nodisc-icon"></a>
	    	</div>
	    
	    	<div data-role="content">
	    		<form id="dest_form">	    	
	    			<label>To</label>
	    			<select id="selectHome" onclick="onSelectHome()">
	        		<option value></option>
	        		<option value="apg">Am posecksen garten</option>
	        		<option value="buw">Bauhaus Uni</option>
	        		<option value="brk">Berkaerstr</option>
	        		<option value="caa">Carl August allee</option>
	        		<option value="ets">Ernst Thaelmann Strasse</option>
	        		<option value="ern">Ernst Thaelmann Strasse/Meyerstr</option>
	        		<option value="fkb">Falkenburg</option>
	        		<option value="atr">Friedenstr/Atrium</option>
	        		<option value="fri">Friedhof</option>
	        		<option value="fes">Friedrich Ebert str</option>
	        		<option value="gpl">Goetheplatz</option>
	        		<option value="gps">Gropiusstr</option>
	        		<option value="hbf">Hauptbahnhof</option>
	        		<option value="hel">Hellerweg/EJBW</option> 	
	        		<option value="hez">Helmholtzstr</option> 					
  					<option value="kar">Karl Hausknect str</option>
  					<option value="klk">Klinikum</option>
  					<option value="mkl">Merketal</option>
  					<option value="myr">Meyerstr</option>
  					<option value="rai">Rainer-Maria-Rilke-Str</option>
  					<option value="ros">Rosenweg</option>
  					<option value="rbs">Rudolf Breitscheid str</option>
  					<option value="sch">Schoppenhauerstr</option>
  					<option value="wpl">Wielandplatz</option>
  					<option value="wdg">Wilder Graben</option>
  					<option value="zhg">Zum Hospital Graben</option>
  						
				</select>
	    		</form>
	    		<div id="bottomButtons" data-role="controlgroup" data-type="horizontal" align="center">
		    		<a href="#go_to" id="dest_back" class="ui-btn ui-btn-inline ui-icon-arrow-l ui-btn-icon-notext ui-alt-icon ui-nodisc-icon" data-transition="slide" data-direction="reverse"></a>
		    		<a href="#go_to_results" id="dest_next" class="ui-btn ui-btn-inline ui-icon-arrow-r ui-btn-icon-notext ui-alt-icon ui-nodisc-icon" data-transition="slide"></a>	    	
	    		</div>
	    	</div>
		</div>
	
		<!-- go to results -->
		<div data-role="page" id="go_to_results" data-back-btn-text="Start" data-add-back-btn="true" data-theme="b">
		  	<div data-theme="b" data-role="header" data-position="fixed" data-tap-toggle="false">
	        	<h3>Results</h3>
	        	<!-- Home icon-->
  				<a href="#startup" class="ui-btn ui-corner-all ui-icon-home ui-btn-left ui-btn-icon-notext ui-alt-icon ui-nodisc-icon"></a>
	        	<!-- Gear Icon for settings-->
  				<a href="#settings" class="ui-btn ui-corner-all ui-icon-gear ui-btn-right ui-btn-icon-notext ui-alt-icon ui-nodisc-icon"></a>
	    	</div>
	    
		    <div data-role="content" align="center">
		    	
		    	<div class="ui-grid-a">
<?php
$con=mysqli_connect("localhost","root","","busdb");


if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $result = mysqli_query($con,"SELECT BUS_TIME, Route, Direction FROM Routes WHERE STOP_NAME='Klinikum' AND BUS_TIME>'11:30' ORDER BY BUS_TIME ASC LIMIT 5");
while($row = mysqli_fetch_array($result))
 {
  echo $row['BUS_TIME'];echo "  ";
  echo $row['Route'];echo "  ";
  echo $row['Direction'];echo "<br>";

  }

mysqli_close($con);
?>
				  
				  <!--div class="ui-block-a">Bus 1</div>
				  <div class="ui-block-b">9:30</div>
				  <div class="ui-block-a">Bus 6:</div>
				  <div class="ui-block-b">9:45</div>
				  <div class="ui-block-a">Bus 8:</div>
				  <div class="ui-block-b">10:00</div>
				  <div class="ui-block-a">Bus 5:</div>
				  <div class="ui-block-b">10:15</div-->
				</div>
		    	
			    	<!--table data-role="table" id="resultsTable" class="ui-responsive ui-shadow"  data-mode="">
		  				<tbody align="center">
						    <tr align="center"><td>Bus 1:</td><td> 9:30 </td></tr>
						   	<tr><td>Bus 6:</td><td> 9:45 </td></tr>
						    <tr><td>Bus 9:</td><td> 10:00 </td></tr>
						    <tr><td>Bus 2:</td><td> 10:15 </td></tr>
					  	</tbody>
					</table-->
			    	<a href="#go_to" data-transition="slide" data-direction="reverse" class="ui-btn ui-icon-edit ui-btn-icon-notext ui-alt-icon ui-nodisc-icon"></a>
			    	<!--a href="#result" class="ui-btn" data-transition="slide">Next</a-->	    	
		    	</div>
			</div>
			
			
			<!-- Next bus -->
  		<div data-role="page" id="next_bus" data-theme="b">
  			
  			
			<div data-theme="" data-role="header" data-position="fixed" data-tap-toggle="false">
	        	<h3>Next Bus</h3>
	        	<!-- Home icon-->
  				<a href="#startup" class="ui-btn ui-corner-all ui-icon-home ui-btn-left ui-btn-icon-notext ui-alt-icon ui-nodisc-icon"></a>
	        	<!-- Gear Icon for settings-->
  				<a href="#settings" class="ui-btn ui-corner-all ui-icon-gear ui-btn-right ui-btn-icon-notext ui-alt-icon ui-nodisc-icon"></a>
	        </div>
	        <div data-role="content">
	        	<form id="dest_form">	    	
	    			<label>
	    				Bus stop	    		
	    			</label>
	    			<select id="selectHome" onclick="onSelectHome()">
	        		<option value></option>
	        		<option value="apg">Am posecksen garten</option>
	        		<option value="buw">Bauhaus Uni</option>
	        		<option value="brk">Berkaerstr</option>
	        		<option value="caa">Carl August allee</option>
	        		<option value="ets">Ernst Thaelmann Strasse</option>
	        		<option value="ern">Ernst Thaelmann Strasse/Meyerstr</option>
	        		<option value="fkb">Falkenburg</option>
	        		<option value="atr">Friedenstr/Atrium</option>
	        		<option value="fri">Friedhof</option>
	        		<option value="fes">Friedrich Ebert str</option>
	        		<option value="gpl">Goetheplatz</option>
	        		<option value="gps">Gropiusstr</option>
	        		<option value="hbf">Hauptbahnhof</option>
	        		<option value="hel">Hellerweg/EJBW</option> 	
	        		<option value="hel">Helmholtzstr</option> 					
  					<option value="kar">Karl Hausknect str</option>
  					<option value="klk">Klinikum</option>
  					<option value="mkl">Merketal</option>
  					<option value="myr">Meyerstr</option>
  					<option value="rai">Rainer-Maria-Rilke-Str</option>
  					<option value="ros">Rosenweg</option>
  					<option value="rbs">Rudolf Breitscheid str</option>
  					<option value="sch">Schoppenhauerstr</option>
  					<option value="wpl">Wielandplatz</option>
  					<option value="wdg">Wilder Graben</option>
  					<option value="zum">Zum Hospital Graben</option>
  						
				</select>
	    		</form>
	    		<div id="bottomButtons" data-role="controlgroup" data-type="horizontal" align="center">
		    		<a href="#startup" class="ui-btn ui-btn-inline ui-icon-arrow-l ui-btn-icon-notext ui-alt-icon ui-nodisc-icon" data-transition="slide" data-direction="reverse"></a>
		    		<a href="#next_bus_results" data-transition="slide" class="ui-btn ui-btn-inline ui-icon-arrow-r ui-btn-icon-notext ui-alt-icon ui-nodisc-icon" data-transition="slide"></a>
	    		</div>
	    	</div>
		</div>
	
		<!--next bus results -->
		<div data-role="page" id="next_bus_results" data-back-btn-text="Start" data-add-back-btn="true" data-theme="b">
		  	<div data-theme="b" data-role="header" data-position="fixed" data-tap-toggle="false">
	        	<h3>Results</h3>
	        	<!-- Home icon-->
  				<a href="#startup" class="ui-btn ui-corner-all ui-icon-home ui-btn-left ui-btn-icon-notext ui-alt-icon ui-nodisc-icon"></a>
	        	<!-- Gear Icon for settings-->
  				<a href="#settings" class="ui-btn ui-corner-all ui-icon-gear ui-btn-right ui-btn-icon-notext ui-alt-icon ui-nodisc-icon"></a>
	    	</div>
	    
		    <div data-role="content" align="center">
		    	
		    	<div class="ui-grid-b">
				  <div class="ui-block-a">Bus 1</div>
				  <div class="ui-block-b">10:26</div>
				  <div class="ui-block-c ui-btn ui-responsive ui-icon-arrow-u ui-nodisc-icon ui-btn-icon-notext"></div>
				  <div class="ui-block-a">Bus 3:</div>
				  <div class="ui-block-b">10:45</div>
				  <div class="ui-block-c ui-btn ui-responsive ui-icon-arrow-d ui-nodisc-icon ui-btn-icon-notext"></div>
				  <div class="ui-block-a">Bus 8:</div>
				  <div class="ui-block-b">11:41</div>
				  <div class="ui-block-c ui-btn ui-responsive ui-icon-arrow-d ui-nodisc-icon ui-btn-icon-notext"></div>
				  <div class="ui-block-a">Bus 7:</div>
				  <div class="ui-block-b">11:57</div>
				  <div class="ui-block-c ui-btn ui-responsive ui-icon-arrow-u ui-nodisc-icon ui-btn-icon-notext"></div>
				</div>
		    	
			    	<!--table data-role="table" id="next_bus_results_table" class="ui-responsive ui-shadow"  data-mode="">
		  				<tbody>
						    <tr align="center"><td>Bus 1:</td><td> 10:26 </td><td><div class "ui-btn ui-responsive ui-icon-arrow-u ui-nodisc-icon ui-btn-icon-notext"></div></td></tr>
						   	<tr><td>Bus 6:</td><td> 9:45 </td></tr>
						    <tr><td>Bus 9:</td><td> 10:00 </td></tr>
						    <tr><td>Bus 2:</td><td> 10:15 </td></tr>
					  	</tbody>
					</table-->
			    	<a href="#next_bus" data-transition="slide" data-direction="reverse" class="ui-btn ui-icon-edit ui-btn-icon-notext ui-alt-icon ui-nodisc-icon"></a>
			    	<!--a href="#result" class="ui-btn" data-transition="slide">Next</a-->	    	
		    	</div>
			</div>
			
			<!-- settings -->
  			<div data-role="page" id="settings" data-theme="b">
  			
  			
			<div data-theme="" data-role="header" data-position="fixed" data-tap-toggle="false">
	        	<h3>Settings</h3>
	        	<!-- Home icon-->
  				<a href="#startup" class="ui-btn ui-icon-home ui-corner-all ui-btn-left ui-btn-icon-notext ui-alt-icon ui-nodisc-icon"></a>
	        	<!-- Gear Icon for settings-->
  				<a href="#settings" class="ui-btn ui-corner-all ui-icon-gear ui-btn-right ui-btn-icon-notext ui-alt-icon ui-nodisc-icon"></a>
	        </div>
	        <div data-role="content">
	        	<label>Home bus stop</label>
	        	<select id="selectHome" onclick="onSelectHome()">
	        		<option value></option>
	        		<option value="apg">Am posecksen garten</option>
	        		<option value="buw">Bauhaus Uni</option>
	        		<option value="brk">Berkaerstr</option>
	        		<option value="caa">Carl August allee</option>
	        		<option value="ets">Ernst Thaelmann Strasse</option>
	        		<option value="ern">Ernst Thaelmann Strasse/Meyerstr</option>
	        		<option value="fkb">Falkenburg</option>
	        		<option value="atr">Friedenstr/Atrium</option>
	        		<option value="fri">Friedhof</option>
	        		<option value="fes">Friedrich Ebert str</option>
	        		<option value="gpl">Goetheplatz</option>
	        		<option value="gps">Gropiusstr</option>
	        		<option value="hbf">Hauptbahnhof</option>
	        		<option value="hel">Hellerweg/EJBW</option> 	
	        		<option value="hel">Helmholtzstr</option> 					
  					<option value="kar">Karl Hausknect str</option>
  					<option value="klk">Klinikum</option>
  					<option value="mkl">Merketal</option>
  					<option value="myr">Meyerstr</option>
  					<option value="rai">Rainer-Maria-Rilke-Str</option>
  					<option value="ros">Rosenweg</option>
  					<option value="rbs">Rudolf Breitscheid str</option>
  					<option value="sch">Schoppenhauerstr</option>
  					<option value="wpl">Wielandplatz</option>
  					<option value="wdg">Wilder Graben</option>
  					<option value="zum">Zum Hospital Graben</option>
  						
				</select>
	        	<table data-role="table" id="settings_table" class="ui-responsive ui-shadow"  data-mode="" style="visibility: hidden">
	  				<thead>
	  						  					
	  					
	  				</thead>
	  				<tbody>
					    <tr align="center"><td>Bus 1:</td><td> 9:30 </td><td><span class "ui-btn ui-responsive ui-icon-arrow-u ui-nodisc-icon ui-btn-icon-notext"></span></td></td></tr>
					   	<tr><td>Bus 6:</td><td> 9:45 </td></tr>
					    <tr><td>Bus 9:</td><td> 10:00 </td></tr>
					    <tr><td>Bus 2:</td><td> 10:15 </td></tr>
				  	</tbody>
				</table>
	    		<div id="bottomButtons" data-role="controlgroup" data-type="horizontal" align="center">
		    		<a href="#startup" class="ui-btn ui-btn-inline ui-icon-arrow-l ui-btn-icon-notext ui-alt-icon ui-nodisc-icon" data-transition="slide" data-direction="reverse"></a>
		    		<a href="#setup2" class="ui-btn ui-btn-inline ui-icon-arrow-r ui-btn-icon-notext ui-alt-icon ui-nodisc-icon" data-transition="slide"></a>	    	
	    		</div>
	    		<!--a href="#go_to" class="ui-btn" data-transition="slide" data-direction="reverse"></a>
	    		<a href="#next_bus" class="ui-btn" data-transition="slide"></a-->
	    	</div>
		</div>
	
	<!-- Application Javascript file -->
	<script src="js/app.js"></script>
	</body>
</html>