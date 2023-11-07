<?php 
	session_start(); 

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Home.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="icon" type="x-icon" href="hosp_logo.jpg">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Hospital Registration System</title>
</head>

<body class= "add-bg">
	<nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark">
		<a class="navbar-brand" href="home.php">
    	<img src="hosp_logo.jpg" width="50" height="50" class="d-inline-block align-top" alt=""> Hospital Registration System
  		</a>
  <!-- Links -->
  		<ul class="navbar-nav ml-auto">
    		<li class="nav-item active">
      			<a class="nav-link" href="home.php">  Home  </a>
    		</li>
			<li class="nav-item">
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
	<div class="background">
		<h2>Please Enter Patient Details :</h2><br>
		<form method="post" action="home.php"> 
			<div id="center">
				<input class="ip" type="text" name="fname" placeholder="Patient Full Name" required><br><br>
				<input class="ip" type="text" name="address" placeholder="Patient Address" required><br><br>
				<input class="ip" id='bg' type="text" name="bgroup" placeholder="Blood Group" required><br><br>
				<input class="ip" type="text" name="gender" placeholder="Gender(M/F/Others)" required><br><br>
				<input class="ip" type="text" name="age" placeholder="Age" required><br><br>
				<input class="ip" type="text" name="contact" placeholder="contact"  required><br><br>
				<input class="button" type="submit" name="submit" value="SUBMIT" required>
			</div>
		</form>
	</div>
	<?php 
	 $a=0;
	if(isset($_POST['submit']))
	{		
        echo $a;       

				$username=$password="";
					$fname = test_name($_POST['fname']);
					$address = test_input($_POST['address']);
					$bgroup = test_bg($_POST['bgroup']);
					$gender = test_gen($_POST['gender']);
					$age = test_age($_POST['age']);
					$contact = test_con($_POST['contact']);

                    echo $a;

			
					if($a==0){
						require_once("connection.php");
						$query="insert into details(fname,address,bgroup,gender,age,contact) values('$fname','$address','$bgroup','$gender','$age','$contact')";
						$result = mysqli_query($link,$query);
						if(!$result) {
							echo "error: ".mysqli_error();
							return;
						}
						else{
							echo '<script type="text/javascript">';
					
							echo 'alert("Data Added Successfully")';
	
							echo '</script>';

							}
					}	
	}
	
	function test_input($data)
	{
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}

	function test_bg($data)
	{
		$data=trim($data);
			$data=stripcslashes($data);
			$data=htmlspecialchars($data);

		$c=strtolower($data);

		if($c=='a+' || $c=='a-' || $c=='b+' || $c=='b-' || $c=='o+' || $c=='o-' || $c=='ab+' || $c=='ab-'  )
		{
			return $data;
		}
		else 
		{
			global $a;
			$a=1;
		
			echo ' <script type="text/javascript">';
					
			echo 'alert("Invalid Blood Group")';
	
			echo '</script>';

		}
	}

	function test_con($data)
		{
			$data=trim($data);
			$data=stripcslashes($data);
			$data=htmlspecialchars($data);
			
			for ($i = 0; $i < strlen($data); $i++) {
			if ( !ctype_digit($data[$i]) ) {
				
				global $a;
				$a=1;
				echo ' <script type="text/javascript">';
							
				echo 'alert("Contact must consist of digits only")';
					
				echo '</script>';
			}}
			if(strlen($data)<10)
				{
					global $a;
					$a=1;
					echo ' <script type="text/javascript">';
					
					echo 'alert("Invalid contact number")';
			
					echo '</script>';
				}
			else{
				return $data;
			}
			
				
		}

	function test_name($data)
	{
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		$k=0;
		for ($i = 0; $i < strlen($data); $i++) {
			if ( in_array($data[$i],range(0,9)) ) {

				global $a;
			    $a=1;
				echo ' <script type="text/javascript">';
					
					echo 'alert("Name must consist of Alphabets only")';
			
					echo '</script>';
					$k=1;
					break;
			}}
		if($k==0)
		{
			return $data;
		}
		
	}

	function test_age($data)
	{
		$data=trim($data);
			$data=stripcslashes($data);
			$data=htmlspecialchars($data);
			for ($i = 0; $i < strlen($data); $i++) {
				if ( !ctype_digit($data[$i]) ) {
		
					global $a;
					$a=1;
					echo ' <script type="text/javascript">';
								
					echo 'alert("Age must consist of digits only")';
						
					echo '</script>';
				}}
				if($data<0 || $data>120)
				{
					global $a;
					$a=1;
					echo ' <script type="text/javascript">';
								
					echo 'alert("Invalid Age")';
						
					echo '</script>';
				}
				else{
					return $data;
				}
					
	}

	function test_gen($data)
	{
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		$check=strtolower($data);
		if($check =='m' || $check =='f' || $check =='other' )
		{
			return $data;
		}
		else{
			global $a;
			$a=1;
			echo ' <script type="text/javascript">';
					
			echo 'alert("Invalid Gender Input")';
	
			echo '</script>';
		}

	}



	
	?>
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</body>
</html>