<?php 

include'handler/dbcon.php';
if (isset($_POST['submit'])) {
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$mobileno=mysqli_real_escape_string($con,$_POST['mobileno']);
	$message=mysqli_real_escape_string($con,$_POST['message']);
	$query=mysqli_query($con,"INSERT INTO contactus VALUES('','$name','$email','$mobileno','$message')");

}
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> CONTACT US FORM</title>
	
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!--- Include the above in your HEAD tag -->

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	
</style>
<style>
label,h1{
	color: #FF3000;
}

</style>
<!-- <link rel="stylesheet" type="text/css" href="css/contactus.css"> -->
</head>
<body>
	<!-- header-->
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
					<a href="onlinesubmission007@gmail.com" class="social" title=""><i class="glyphicon glyphicon-envelope" style="font-size: 15px; color: #ffffff">onlinesubmission007@gmail.com</i></a>
					<!-- <i class="glyphicon glyphicon-earphone">9537821225</i> -->
				</div>

			</div> <!-- end of row-->
		</div> <!--end of containter-->
	</div> <!-- end of container fluid-->

	<!-- logo and navigation-->
	<div class="container-fluid sec">
		

		<div class="container sec">  <!-- container of logo-->
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
								<li class="active"><a  href="index.php">HOME</a></li>  
								<!-- <li><a  href="aboutus.php">ABOUT US</a></li> -->
								<li><a  href="reg.php">REGISTRATION</a></li>
								<li><a  href="teacher_login.php">TEACHERS LOGIN</a></li>
								
								<li><a  href="admin_login.php">ADMIN LOGIN</a></li>
							</ul>
						</div>  <!--end of menu-->
					</nav>

				</div>

			</div> <!-- end of row-->
		</div> <!--end of containter-->

	</div>
	<!-- end of header-->

	
	
	
	
	<section id="contact">
		<div class="section-content">
			<center><h1 class="section-header">Get in <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Touch with us</span></h1></center>
			<h3></h3>
		</div>
		<div class="contact-section">
			<div class="container">
				<form action="" method="post">
					<div class="col-md-6 form-line">
						<div class="form-group">
							<label for="exampleInputUsername">Your name</label>
							<input type="text" class="form-control" name="name" id="" placeholder=" Enter Name">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail">Email Address</label>
							<input type="email" class="form-control" name="email" id="exampleInputEmail" placeholder=" Enter Email id">
						</div>	
						<div class="form-group">
							<label for="telephone">Mobile No.</label>
							<input type="tel" class="form-control" name="mobileno" id="telephone" placeholder=" Enter 10-digit mobile no.">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for ="description"> Message</label>
							<textarea  class="form-control" name="message" id="description" placeholder="Enter Your Message"></textarea>
						</div>
						<div>

							<!-- <button type="button" name="submit" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Message</button> -->
							<input type="submit" class="btn btn-success" name="submit">
						</div>

					</div>
				</form>
			</div>
		</section>
		

	</body>
	</html>