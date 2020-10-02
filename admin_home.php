<?php 
include"handler/dbcon.php";//Database Connectivity file
if (!$_SESSION['username']) {//Authenticating Username
	header('location: admin_login.php?error=you not an administrator');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-compatible" Content="IE-edge">
	<meta name="viewport" content="width-device-width">
	<title>Admin Home page </title>
	

	<!--include maincss css file-->


	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
	
	<link rel="stylesheet" href="css/style1.css"/>
	<link rel="stylesheet" href="css/studenthome.css"/> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
	
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="container">  <!-- container of logo-->
		<div class="row"><!--start of row-->
			<div class="col-sm-3 " >
				<a href="admin_home.php" title=""><img src="images1/os4.png" width="150px" ></a>
			</div>
			<div class="col-sm-9 menu " >
				<nav class="navbar navbar-default">
					<!--navbar start-->
					<div class="collapse navbar-collapse" id="myNavbar" >
						<ul class="nav navbar-nav   pull-right">
							<!--start of menu-->
							<li class="active"><a  href="admin_home.php">Home</a></li>  
							<li><a  href="view.php">student record</a></li>
							<li><a  href="teacher_reg.php">Add Teachers</a></li>
							<!-- <li><a  href="event.php">Add Event</a></li> -->
							<li><a  href="logout.php">Logout</a></li>
						</ul>
					</div>  <!--end of menu-->
				</nav>

			</div>
			
		</div> <!-- end of row-->
	</div> <!--end of containter-->
	<div class="container col-lg-offset-4 "> <!-- start of Container-->
		<div class="row">  <!-- Start Of Row-->
			<div class="offset-lg-4 col-lg-4 col-sm-6 col-12 main-section text-center "> <!-- Start of main Section-->
				<div class="row"><!-- start of Row 2-->
					<div class="col-lg-12 col-sm-12 col-12 profile-header "> <!-- start of Profile Header-->
						<h4 class="text-center">Your Profile</h4>
					</div>  <!-- end Of Profile Header-->
				</div> <!-- End Of Row 2-->
				<div class="row user-detail"> <!-- Start of User Details-->
					<div class="col-lg-12 col-sm-12 col-12"> <!-- start of class-->

						<img src="images1/admin.jpg" class="rounded-circle img-thumbnail"><br>
						Welcome:<font color="blue" size="3"><?php echo $_SESSION['username'];?></font>
						<br>
						<!-- <p><i class="fa fa-map-marker"></i></p> -->

						<hr>
						<!-- <a href="edit.php" class="btn btn-success btn-sm">Edit your profile</a> -->

						
						<hr>
						<!-- <span>ASDFGHJKL</span> -->
					</div> <!-- end Class -->
				</div>
			</div>
		</div>
	</div>
	
	
</body>
</html>
