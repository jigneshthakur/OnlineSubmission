<?php 

//session_start(); 

include'handler/dbcon.php';//Importing Database Connectivity file




if (isset($_POST['login']))
{
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
			//$password=md5($_POST['password']);
	
	$query 	= mysqli_query($con, "SELECT * FROM admin WHERE  password='$password' and username='$username'");//Fetching data from admin table
	$row		= mysqli_fetch_array($query);
	$num_row 	= mysqli_num_rows($query);
	
	if ($num_row > 0) //Authenticating Username and Password
	{			
		$_SESSION['username']=$row['username'];
		header('location: admin_home.php');
		
	}
	else
	{
		echo 'Invalid Username and Password Combination';
	}
}

?>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-compatible" Content="IE-edge">
	<meta name="viewport" content="width-device-width">
	<title>Admin Login </title>
	

	<!--include maincss css file-->


	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
	
	<link rel="stylesheet" href="css/style1.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" >
</head>
<body>
	<div class="container-fluid  top_bar " > <!-- container fluid -->
		<div class="container">  <!--conainer of header-->
			<div class="row">  <!--class row-->
				<div class="col-sm-3" >
					<a href="#" class="social"><i class="fa fa-twitter" style="font-size: 15px; color: #FFFFFF"></i></a>
					<a href="#" class="social"><i class="fa fa-instagram" style="font-size: 15px; color: #FFFFFF"></i></a>
					<a href="#" class="social"><i class="fa fa-google-plus"  style="font-size: 15px; color: #FFFFFF"></i></a>
					<a href="#" class="social"><i class="fa fa-facebook-f" style="font-size: 15px; color: #FFFFFF"></i></a>
				</div> <!--end of coloum bar-->
				<div class="col-sm-9 text-right phone" >
					<i class="glyphicon glyphicon-envelope">onlinesubmission007@gmail.com</i>
					<!-- <i class="glyphicon glyphicon-earphone">9537821225</i> -->
				</div>

			</div> <!-- end of row-->
		</div> <!--end of containter-->
	</div> <!-- end of container fluid-->

	<div class="container">  <!-- container of logo-->
		<div class="row"><!--start of row-->
			<div class="col-sm-3 " >
				<a href="index.php" title=""><img src="images1/os4.png" width="150px" ></a>
			</div>
			<div class="col-sm-9 menu " >
				<nav class="navbar navbar-default">
					<!--navbar start-->
					<div class="collapse navbar-collapse" id="myNavbar" >
						<ul class="nav navbar-nav   pull-right">
							<!--start of menu-->
							<li ><a  href="index.php">HOME</a></li>  
							<!-- <li><a  href="aboutas.php">About Us</a></li> -->
							<li><a  href="reg.php">REGISTRATION</a></li>
							<li><a  href="teacher_login.php">TEACHERS LOGIN</a></li>
							<li class="active"><a  href="admin_login.php">ADMIN LOGIN</a></li>
						</ul>
					</div>  <!--end of menu-->
				</nav>

			</div>
			
		</div> <!-- end of row-->
	</div> <!--end of containter-->

	
	<div class="container col-lg-offset-4">  <!--conainer of header-->
		<div class="row">  <!--class row-->
			<div class="col-sm-12" style="" >
				<h2 class="text-lg-center">Admin Login</h2>
				<div class="form-wrapper">

					<form action="#" method="post">
						<!-- <h3>Admin Login</h3> -->

						<div class="form-item">
							<input type="text" name="username" required placeholder="Username/E-mail" autofocus required></input>
						</div>
						<br>

						<div class="form-item">
							<input type="password" name="password" required placeholder="Password" required></input>
						</div>
						<br>

						<div class="button-panel">
							<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
						</div>
						<!-- </form> -->

						<div>
							
						</div>
						<br/>
						<!-- </form> -->
					</div>
				</div>
			</div>
		</form>
        



	</div>
</div>
</div>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
</body>
</html>
