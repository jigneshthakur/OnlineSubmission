
<?php 

include'handler/dbcon.php';
$prn=$_SESSION['prn'];
if (!$_SESSION['username']) {
	header('location: login.php?error=enter username and password');
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-compatible" Content="IE-edge">
	<meta name="viewport" content="width-device-width">
	<link rel="stylesheet" type="text/css" >
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/style1.css"/>
	<link rel="stylesheet" href="css/studenthome.css"/> 
	<title>welcome to OnlineSubmission</title>
	


	
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
				<a href="home.php" title=""><img src="images1/os4.png" width="150px" ></a>
			</div>
			<div class="col-sm-9 menu " >
				<nav class="navbar navbar-default">
					<!--navbar start-->
					<div class="collapse navbar-collapse" id="myNavbar" >
						<ul class="nav navbar-nav   pull-right">
							<!--start of menu-->
							<li class="active"><a  href="home.php">Home</a></li>  
							<li><a  href="OnlineCompiler?prn=<?php echo $prn;?>">COMPILER</a></li>
							<li><a  href="upload.php">UPLOAD&DOWNLOAD</a></li>
							<li><a  href="changepassword.php">CHANGEPASSWORD</a></li>
							<li><a href="logout.php">LOGOUT</a></li>
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

						<img src="images1/boy.png" class="rounded-circle img-thumbnail"><br>
						Welcome:<font color="blue" size="3"><?php echo $_SESSION['username'];?></font>
						<!-- <p><i class="fa fa-map-marker"></i><?php #echo$_SESSION['city']; ?>.</p> -->

						<hr>
						<!-- <a href="#" class="btn btn-success btn-sm">Edit your profile</a> -->

						
						<hr>
						<!-- <span>ASDFGHJKL</span> -->
					</div> <!-- end Class -->
				</div>
			</div>
		</div>
	</div>





</body>
</html>