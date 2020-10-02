<?php 
include'handler/dbcon.php';
if (isset($_POST['change'])) {
	# code...
	$opass=$_POST['opass'];
	$npass=$_POST['npass'];
	$cpass=$_POST['cpass'];
	$username=$_SESSION['username'];
	//$hashedPwdCheck=password_verify($password,$row['password']);

	
	$oqr=mysqli_query($con,"SELECT password FROM student where username='$username' AND password='$opass' ") or die(mysqli_errno('not select password'));
	$odata=mysqli_fetch_array($oqr);
	$opw=password_verify($opass,$odata['password']);
	//$pwd=$odata['password'];  $password=password_hash($pwd,PASSWORD_DEFAULT);
	if ($opw==$odata) 
	{
		if ($npass==$cpass) 
		{
			$newpwd=password_hash($npass,PASSWORD_DEFAULT);
			$update=mysqli_query($con,"UPDATE student SET password ='$newpwd' WHERE username='$username' ")or die(mysqli_error('not update password'));
			if ($update) {
				echo"<script>alert('password change')</script>";
			}
		}
		else
		{
			echo"<script>alert('old password and new password not match')</script>";
		}
	}
	else{
		echo"<script>alert('old password not match')</script>";
	}
}




?>

<!DOCTYPE html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-compatible" Content="IE-edge">
	<meta name="viewport" content="width-device-width">
	<title>MSU-Online OnlineSubmission Portal</title>


	<!--include maincss css file-->


	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>

	<link rel="stylesheet" href="css/style1.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" >
</head>
<body>
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
							<li ><a  href="home.php">HOME</a></li>  
							<li><a  href="OnlineCompiler">COMPILER</a></li>
							<li><a  href="upload.php">UPLOAD&DOWNLOAD</a></li>
							<li class="active"><a  href="changepassword.php">CHANGEPASSWORD</a></li>
							<li><a  href="logout.php">LOGOUT</a></li>
						</ul>
					</div>  <!--end of menu-->
				</nav>

			</div>

		</div> <!-- end of row-->
	</div> <!--end of containter-->
	<center>Welcome:<font color="blue" size="3"><?php echo $_SESSION['username'];?></font></center>
	<div class="form-wrapper container">
		
		<form action="" method="post">
			<h3>CHANGE PASSWORD</h3>
			
			<div class="form-item">
				current password:<span style='color:red';>*</span><br>
				<input type="password" name="opass" required placeholder=" current PASSWORD" autofocus required></input>
			</div>
			<br>
			<div class="form-item">
				NEW password:<span style='color:red';>*</span><br>
				<input type="password" name="npass" required placeholder=" NEW PASSWORD" autofocus required></input>
			</div>
			<br>
			<div class="form-item">
				NEW RETYPE-password:<span style='color:red';>*</span><br>
				<input type="password" name="cpass" required placeholder=" NEW RETYPE-PASSWORD" autofocus required></input>
			</div>
			<br>

			
			<div class="button-panel">
				<input type="submit" class="button" title="Log In" name="change" value="changepassword"></input>
			</div>
		</form>
	</div>
</body>
</html>