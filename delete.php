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
    		<li class="nav-item">
      			<a class="nav-link" href="home.php">  Home  </a>
    		</li>
			<li class="nav-item">
      			<a class="nav-link" href="doctor.php"> Available Doctors  </a>
    		</li>
			<li class="nav-item  active">
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
		<h2>Patient Details</h2><br>
		<form method="post" action="delete.php">
			<div id="center">
            <input class="ip" type="text" name="Id" placeholder="ID to be Deleted" required><br><br>
				
				<input class="button" type="submit" name="delete" value="DELETE">
			</div>
		</form>
	</div>
	<?php 
	 $a=0;
	if(isset($_POST['delete']))
	{	     

				$username=$password="";
                    $Id= test_id($_POST['Id']);
					
					if($a==0)
					{
						require("connection.php");
						$Id=$_REQUEST['Id'];
						$query="delete from details where details.Id='$Id'";
						$result = mysqli_query($link,$query) or die( mysqli_errror());
                        // echo $result;
						if(!$result) {
							echo "error: ".mysqli_error();
							return;
						}
						else{
							echo '<script type="text/javascript">';
							echo 'alert("Data Deleted Successfully")';
							echo '</script>';
							}
					}	
	}

    function test_id($data)
    {
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        
		// echo $data;
		// echo"<br>";

        for ($i = 0; $i < strlen($data); $i++) 
        {
        if ( !ctype_digit($data[$i]) ) 
		{
            
            global $a;
            $a=1;
            echo ' <script type="text/javascript">';
                        
            echo 'alert("ID must consist of digits only")';
                
            echo '</script>';
            return;
        }
    	}
            require_once("connection.php");
						$query="select Id from details;";
						$results=mysqli_query($link,$query);
		     
				$ans= mysqli_fetch_all($results, MYSQLI_ASSOC);
				foreach($ans as $result)
				{   
					
                    if($result['Id']==$data)
                    {    
                        return $data;
                    }
            	 }

                         
            global $a;
            $a=1;
            echo ' <script type="text/javascript">';
                        
            echo 'alert("ID not in DataBase")';
                
            echo '</script>';


          
    }

	?>
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</body>
</html>