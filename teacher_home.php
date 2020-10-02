<?php 
include'handler/dbcon.php';
if (!$_SESSION['username']) {
 	header('location: teacher_login.php?error=you not an teacher');
 }




 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="UTF-8">
  <meta http-equiv="X-UA-compatible" Content="IE-edge">
  <meta name="viewport" content="width-device-width">
   <title>MSU-Online OnlineSubmission Portal</title>
    

      <!--include maincss css file-->


  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
   
   <link rel="stylesheet" href="css/style1.css"/>
   <link rel="stylesheet" href="css/studenthome.css"/> 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
 <body>
 

<!-- logo and navigation-->
<div class="container">  <!-- container of logo-->
		<div class="row"><!--start of row-->
			 <div class="col-sm-3 " >
			 	<a href="teacher_home.php" title=""><img src="images1/os4.png" width="150px" ></a>
			 </div>
			 	 <div class="col-sm-9 menu " >
			 	 	<nav class="navbar navbar-default">
			 	 	 <!--navbar start-->
			 	 		<div class="collapse navbar-collapse" id="myNavbar" >
			 	 	 <ul class="nav navbar-nav   pull-right">
			 	 	 	<!--start of menu-->
            <li class="active"><a  href="teacher_home.php">Home</a></li>  
           <li><a  href="view1.php">STUDENT RECORD</a></li>
            <li><a  href="htmlcode.php">HTML CODE</a></li>
            <li><a  href="upload1.php">UPLOAD & DOWNLOAD</a></li>
             <!-- <li><a  href="download.php?id=$id">download</a></li> -->
            <li><a  href="viewcode.php">Cpp code</a></li>
            <li><a  href="logout.php">logout</a></li>
          </ul>
          </div>  <!--end of menu-->
          </nav>

			 	 </div>
        
</div> <!-- end of row-->
</div> <!--end of containter-->


 		<!-- Welcome:<font color="blue" size="3"><?php #echo $_SESSION['username'];?></font>
 		<br><br>
 		 --><!-- <a href="view.php" title="">view student record</a><br>
 		<a href="logout.php" title="">Logout</a> -->

<div class="container col-lg-offset-4 ">
	<div class="row">
		<div class="offset-lg-4 col-lg-4 col-sm-6 col-12 main-section text-center ">
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-12 profile-header ">
					<h4 class="text-center">Your Profile</h4>
				</div>
			</div>
			<div class="row user-detail">
				<div class="col-lg-12 col-sm-12 col-12">

					<img src="images1/teacher1.png" class="">
					<h5>Welcome:<font color="blue" size="3"><?php echo $_SESSION['username'];?></font>
 		</h5>
 		<br><br>
					<!-- <p><i class="fa fa-map-marker"></i> <p>Vadodara,Gujarat,India.</p> -->

					<hr>
					<!-- <a href="" class="btn btn-success btn-sm">Edit your profile</a> -->

 
					<hr>
					<!-- <span>ASDFGHJKL</span> -->
				</div>
			</div>
		</div>
	</div>
</div>
</div>


 	
 </body>
 </html>





