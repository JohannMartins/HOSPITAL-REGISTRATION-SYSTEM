 <?php
	session_start();
	if(isset($_SESSION['username']))
		unset($_SESSION['username']);
	session_destroy();
?>                                                                                                                                                                                                                         
<!DOCTYPE html>
<html>
<head>
	<title>Hospital Registration System</title>
	<link rel="stylesheet" type="text/css" href="Login.css">
	<link rel="icon" type="x-icon" href="hosp_logo.jpg">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body><!--http://mrwallpapers.com/wp-content/uploads/2018/10/wall-leaves-wooden-background-images-hd.jpg-->
<div>
<div class="form" id="login">
	<div class="box">
	<h3>ADMISSION DESK LOGIN</h3>
	<!-- <div class="social-container">
		<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
		<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
		<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
	</div> -->
	<div>
		<?php
			function test_input($data)
			{
				$data=trim($data);
				$data=stripcslashes($data);
				$data=htmlspecialchars($data);
				return $data;
			}
			if(isset($_POST['login']))
			{
				session_start();
				$username=$password="";
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					$username = test_input($_POST['Username']);
					$password = test_input($_POST['Password']);
					//echo $username,"<br>";
					//echo $password;

					require_once("connection.php");
					$results=mysqli_query($link,"select * from usertable ") or die("failed to connect".mysqli_connect_error());
					$count=mysqli_num_rows($results);
				
					while($count>0)
					{
						$row=mysqli_fetch_array($results);
					if ($row['Username'] == $username && $row['Password'] == $password)
					 {
						header("location: home.php");
						$_SESSION['username'] = $username;
						$_SESSION['mes'] = "true";
					} 
					$count--;
					}
	
					if($count==0)
					 {
					echo "Login failed";
					}
					mysqli_close($link);
				}
			} 
		?>	
	</div>
	<form action="login.php" method="POST">
		<input class="input" type="text" name="Username" placeholder="Username" required><br>
		<input class="input" type="password" name="Password" placeholder="Password" required><br>
		<button class="button" name="login">LOGIN</button>
		<!-- <input class="button" type="submit" name="login" value="LOGIN"><br> -->
		<!-- <a id="oksignup">Sign Up here</a> | <a href="#">Forgot Password?</a> -->
	</form>
    </div>
</div>

