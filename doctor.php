<?php require_once("connection.php");
session_start(); 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="doctor.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="icon" type="x-icon" href="hosp_logo.jpg">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Hospital Registration System</title>

<style>
	name{
    font-size : 25px;
    font-weight : bold;
    display: block;
    background-color:  rgba(49, 216, 194, 0.522);
}
	</style>

</head>
<body>
<body class= "add-bg">
	<nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark">
		<a class="navbar-brand" href="home.php">
    	<img src="hosp_logo.jpg" width="50" height="50" class="d-inline-block align-top" alt=""> Hospital Registration System
  		</a>
  <!-- Links -->
  		<ul class="navbar-nav ml-auto">
    		<li class="nav-item">
      			<a class="nav-link" href="home.php">  Home  </a>
    		</li>
			<li class="nav-item active">
      			<a class="nav-link" href="doctor.php"> Available Doctors  </a>
    		</li>
    		<li class="nav-item">
      			<a class="nav-link" href="display.php">  Patient Details  </a>
    		</li>
			<li class="nav-item">
      			<a class="nav-link" href="login.php"> <?php
      			if(isset($_SESSION['username']))
      				{
      					echo $_SESSION['username'];
      				}
					  ?>:Logout/Login</a>
    		</li>
    		
  		</ul>
	</nav>
	
	</div>
    <!-- xml part -->
    <?xml  version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/css" href="doctor.css"?>
<available>
<h1>Doctors available for consultation</h1>
<hr style="height: 1px; background-color:black">
<doctors>
<name><img src="doc_icon.png" width="70" height="70" class="d-inline-block align-right" alt=""> Dr.James More
    <special>Specialization: Neurology</name></special>
    <description>Medical specialist concerned with the nervous system and its functional or organic disorders.<br> Neurologists diagnose and treat diseases and disorders of the brain, spinal cord, and nerves.      
    </description>
    <years>9 years of experience</years>
</doctors>
<hr style="height: 1px; background-color:black">
<br>
<doctors>
<name><img src="doc_icon.png" width="70" height="70" class="d-inline-block align-right" alt=""> Dr.Bruce Almighty
    <special>Specialization: Surgeon</name></special>
    <description>Doctor who specializes in evaluating and treating conditions that may require surgery, or physically changing the human body.      
    </description>
    <years>16 years of experience</years>
</doctors>
<hr style="height: 1px; background-color:black">
<br>
<doctors>
<name><img src="doc_icon.png" width="70" height="70" class="d-inline-block align-right" alt=""> Dr.Anne Frank
    <special>Specialization: Cardiology</name></special>
    <description>Doctor who specializes in the study or treatment of heart diseases and heart abnormalities.      
    </description>
    <years>20 years of experience</years>
</doctors>
<hr style="height: 1px; background-color:black">
<br>
<doctors>
    <name><img src="doc_icon.png" width="70" height="70" class="d-inline-block align-right" alt=""> Dr.Tony Stark
    <special>Specialization: Dermatology</name></special>
    <description>A medical doctor who specializes in treating the skin, hair, and nails.      
    </description>
    <years>4 years of experience</years>
</doctors>
<hr style="height: 1px; background-color:black">
</available>



