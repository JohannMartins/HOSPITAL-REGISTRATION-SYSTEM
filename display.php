<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="display.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="icon" type="x-icon" href="hosp_logo.jpg">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Hospital Registration System</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial scale=1.0">
    <!-- <title>airport management system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" type="text/css"> -->
    <style>
        .patientlist {

            border: 3px solid rgb(25, 191, 125);
            border-radius: 20px;
            padding: 20px;
            background-size: cover;
            margin: auto;
            background: rgba(255,255,255,0.85);
	        font-family: Quicksand;
            width: 50%;
        }

        #p1 {
            display: inline-block;
            padding-left: 30px;
            margin:5px;
            color:black;
        }

body {
    /* max-width:700px;
	padding: 20px; */
	position: relative;
	/* margin: 20px auto; */
	
	background-image: url("bg2.png");
    backdrop-filter: blur(5px);
	background-repeat: no-repeat;
	background-size: cover;
}

.btnstyle1 {

 position: relative;
  top: 50%;
  left: 60%;
	border:none;
	outline:none;
	background: #19bf7d;
	font-size: 20px;
	text-align:center;
	color:white;
	width: 100px;
	height: 50px;
	text-shadow: 2px 2px #000000;
	border-radius:20px;
   
} 

.btnstyle2 {
     position: relative; 
  top: 50%;
  left: 30%;
	border:none;
	outline:none;
	background: #19bf7d;
	font-size: 20px;
	text-align:center;
	color:white;
	width: 100px;
	height: 50px;
	text-shadow: 2px 2px #000000;
	border-radius:20px;
   
} 

    </style>
</head>
<body>
<nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark">
		<a class="navbar-brand" href="home.php">
    	<img src="hosp_logo.jpg" width="50" height="50" class="d-inline-block align-top" alt=""> Hospital Registration System
  		</a>
  <!-- Links -->
  <ul class="navbar-nav ml-auto">
    		<li class="nav-item ">
      			<a class="nav-link" href="home.php">  Home  </a>
    		</li>
			<li class="nav-item">
      			<a class="nav-link" href="doctor.php"> Available Doctors  </a>
    		</li>
    		<li class="nav-item active">
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
	
	<?php
  require_once("connection.php");
    // if (isset($_POST['submit'])) {
		
		$query="select * from details ;";
        $results=mysqli_query($link,$query);
        $count=mysqli_num_rows($results);
        if ($count == 0)
        {
            echo ' <script type="text/javascript">';
			echo 'alert("No Patient Registered")';
			echo '</script>';
            echo ' <script type="text/javascript">';
            echo 'location.href = "home.php"';
			echo '</script>';
        }
				$ans= mysqli_fetch_all($results, MYSQLI_ASSOC);
                echo nl2br("\n\n",false);
				foreach($ans as $result)
				{
                ?>
				
				<br>
				<div class="patientlist">
                <img src="usericon.png" width="60" height="60" class="d-inline-block align-top" alt="">
				<p id="p1" style="text-align: left">ID: <b>
                <?php echo $result['Id'] ?>
				</b></p>
        <p id="p1" style="text-align: left">Name: <b>
                <?php echo $result['fname'] ?>
            </b></p>
			<p id="p1" style="text-align: left">Address: <b>
                <?php echo $result['address'] ?>
            </b></p>
        <p id="p1" style="text-align: left">Blood Group: <b>
                <?php echo $result['bgroup'] ?>
            </b></p>
			<p id="p1" style="text-align: left">Gender: <b>
                <?php echo $result['gender'] ?>
            </b></p>
			<p id="p1" style="text-align: left">Age: <b>
                <?php echo $result['age'] ?>
            </b></p>
			<p id="p1" style="text-align: left">Contact: <b>
                <?php echo $result['contact'] ?>
            </b></p>
				</div>

				<?php }
				?>

<br><br>
<a href="http://localhost/user/delete.php">
            <input type="submit" class="btnstyle1" value="Delete"  style="text-align=center;;">
        </a>
		<a href="http://localhost/user/edit.php">
            <input type="submit" class="btnstyle2" value="Edit"  style="text-align=center;">
        </a><br><br>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
