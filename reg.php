 <?php
 //session_start();
 include'handler/dbcon.php';
 //include'login.php';

 //$error_array= array();//hold error msg
 $_SESSION['error']=array();
 $day="";
 $month="";
 $year="";

 if (isset($_POST['submit'])) {

 	$prn=mysqli_real_escape_string($con,$_POST['prn']);
 	$prn=str_replace(' ','',$prn);
 		$_SESSION['prn']=$prn;//stores prn in session

 		//first name
 		$fname=mysqli_real_escape_string($con,$_POST['fname']);
 		$fname=str_replace(' ','',$fname);
 		$fname=ucfirst(strtolower($fname));
 		$_SESSION['fname']=$fname;

 		$mname=mysqli_real_escape_string($con,$_POST['mname']);
 		$mname=str_replace(' ','',$mname);
 		$mname=ucfirst(strtolower($mname));
 		$_SESSION['mname']=$mname;


 		//last name
 		$lname=mysqli_real_escape_string($con,$_POST['lname']);
 		$lname=str_replace(' ','',$lname);
 		$lname=ucfirst(strtolower($lname));
 		$_SESSION['lname']=$lname;

 		$em=mysqli_real_escape_string($con,$_POST['email']);
 		$em=str_replace(' ','',$em);
 		$em=ucfirst(strtolower($em));
 		$_SESSION['email']=$em;

 		$em2=mysqli_real_escape_string($con,$_POST['email2']);
 		$em2=str_replace(' ','',$em2);
 		$em2=ucfirst(strtolower($em2));
 		$_SESSION['email2']=$em2;

 		$dob=mysqli_real_escape_string($con,$_POST['dob']);
 		$dob = date("Y-m-d",strtotime($_POST['dob']));

 		$add=mysqli_real_escape_string($con,$_POST['add']);

 		$city=mysqli_real_escape_string($con,$_POST['city']);
 		$gender=mysqli_real_escape_string($con,$_POST['gender']);
 		$pwd=mysqli_real_escape_string($con,$_POST['password']);
 		$pwd2=mysqli_real_escape_string($con,$_POST['password2']);
 		$phone=mysqli_real_escape_string($con,$_POST['phone']);

// 		//parent details variabal

 		$pname=mysqli_real_escape_string($con,$_POST['pname']);//parent name
 		$pname=str_replace(' ','',$pname);
 		$pname=ucfirst(strtolower($pname));
 		$_SESSION['pname']=$pname;

 		$pemail=mysqli_real_escape_string($con,$_POST['pemail']);
 		$pemail=str_replace(' ','',$pemail);
 		$pemail=ucfirst(strtolower($pemail));
 		$_SESSION['pemail']=$pemail;

 		$pocc=mysqli_real_escape_string($con,$_POST['pocc']);
 		$pocc=str_replace(' ','',$pocc);
 		$pocc=ucfirst(strtolower($pocc));
 		$_SESSION['pocc']=$pocc;

 		$pno=mysqli_real_escape_string($con,$_POST['pno']);
 		$pno=str_replace(' ','',$pno);
 		$pno=ucfirst(strtolower($pno));
 		$_SESSION['pno']=$pno;

 		$padd=mysqli_real_escape_string($con,$_POST['padd']);
 		$_SESSION['padd']=$padd;

 		/*$fname=mysqli_real_escape_string($con,$_POST['fname']);
 		$fname=str_replace(' ','',$fname);
 		$fname=ucfirst(strtolower($fname));
 		$_SESSION['fname']=$fname;*/

 		$state=mysqli_real_escape_string($con,$_POST['state']);

 		$city=mysqli_real_escape_string($con,$_POST['city']);

 		//$city=mysqli_real_escape_string($con,$_POST['city']);
 		//$note=$_POST['note']; #for forget password variable

 		$date=Date("Y-m-d");

 		if ($em==$em2) {
		//match the email
 			if(filter_var($em, FILTER_VALIDATE_EMAIL) ) {

 				$em=filter_var($em,FILTER_VALIDATE_EMAIL);

				//check if email already exists
 				$e_check=mysqli_query($con,"SELECT email FROM student WHERE email='$em'");

				//count the number of rows returned
 				$num_rows=mysqli_num_rows($e_check);

 				if($num_rows>0){
					//array_push($error_array, "email already in use<br>");
 					$e_error= "email already in use<br>";

					//header("location: ../reg.php?reg=already");
 				}
 			}
 			else
 			{
			//array_push($error_array,"email already in use<br>");
 				$e_error= "invalid email format<br>";
				//header("location: ../reg.php?reg=invalid");
				//exit();
 			}
 		}

 		else
 		{
			//array_push($error_array,"email don't match<br>");
 			$e_error =  "email don't match<br>";
 			//echo "<script>alert('Email not found');</script>";
 			//echo $e_error;



 		}

 		if (strlen($fname)>25|| strlen($fname) <3)
 		{
 			$f_error=  "your first name must be between 3 and 25 characters<br>";
 		}


 		if (strlen($lname)>25|| strlen($lname) <3)
 		{
 			$l_error= "your last name must be between 3 and 25 characters<br>";
 		}


 		if ($pwd!=$pwd2) 
 		{

 			$p_error="your password do not match<br>";

 		}
 		else{
 			if (preg_match('/[^A-Za-z0-9]/', $pwd)) {
 				$p_error= "your password  only contain characters or numbers and symbol<br>";

 			}
 		}
 		if (strlen($pwd)>30|| strlen($pwd)<5) {

 			$p_error= "your password must be between 5 to 30 characters<br>";
 		}
		//prn validation
 		if ($prn==16) {
 			$pr_error="pleace enter valid prn number";


 		}

 		if (empty($error) && empty($pr_error) && empty($e_error) && empty($p_error) && empty($f_error) &&empty($l_error)) {
			 //$pwd => password_hash($pwd, PASSWORD_BCRYPT, [12]);
			 //'password'=> password_hash($pwd, PASSWORD_BCRYPT, [12]);
			//$password=md5($pwd);
 			$password=password_hash($pwd,PASSWORD_DEFAULT);
							 			//$hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);



			//genrate username

 			$username =strtolower($fname."_".$lname);
 			$check_username_query=mysqli_query($con,"SELECT username FROM student WHERE username='$username'" );
 			$i=0;
			//if username exists add number to username  
 			while(mysqli_num_rows($check_username_query)!=0) {
 				$i++;
 				$username=$username."_".$i;
 				$check_username_query=mysqli_query($con,"SELECT username FROM student WHERE username='$username'");
 			}

 			$query=mysqli_query($con,"INSERT INTO student VALUES('$prn','$fname','$mname','$lname','$em','$phone','$gender','$dob','$year','$state','$city','$add','$pname','$pno','$pocc','$padd','$pemail','$password','$username','$date')");


 			echo $cmsg="<span style='color:#08FA24;'>go ahead and login</span><br><br>";
 			//echo $unm="<span style='color:#08FA24;'>your username is   $username</span><br>";
 			echo"<script>alert('your username is $username')</script>";

 			$_SESSION['fname']=""; 
 			$_SESSION['mname']="";
 			$_SESSION['lname']="";
 			$_SESSION['email']="";
 			$_SESSION['email2']="";
 			$_SESSION['prn']="";	
			//$_SESSION['password']="";
 			$_SESSION['pname']="";
 			$_SESSION['pemail']="";

			//echo "";
 			
			//echo "$password";

 		}
 		else{
 			echo "no data inserted";
 		}
 	}


 	?>

 	<!DOCTYPE html>
 	<html>
 	<head>
 		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 		<!--<meta http-equiv="refresh" content="3"; url=reg.php>-->
 		<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
 		
 		<link rel="stylesheet" href="css/style1.css"/>
 		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 		<style>
 		.col{
 			width: auto;
 			
 		}
 	</style>
 	
 	<!-- <link rel="stylesheet" href="css/studenthome.css"/>  -->
 	<!-- <script src="js/Validation.js"></script> -->


 	<title>Registration</title>

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
 	<div class="container">  <!-- container of logo-->
 		<div class="row"><!--start of row-->
 			<div class="col-sm-3 " >
 				<a href="index.php" title=""><img src="images1/os4.png" width="150px" ></a>
 			</div>
 			<div class="col-sm-9 menu">
 				<nav class="navbar navbar-default">
 					<!--navbar start-->
 					<div class="collapse navbar-collapse" id="myNavbar" >
 						<ul class="nav navbar-nav  pull-right">
 							<!--start of menu-->
 							<li><a  href="index.php">HOME</a></li>  
 							<!-- <li><a  href="aboutus.php">ABOUT US</a></li> -->
 							<li class="active"><a  href="reg.php">REGISTRATION</a></li>
 							<li><a  href="teacher_login.php">TEACHERS LOGIN</a></li>
 							
 							<li><a  href="admin_login.php">ADMIN LOGIN</a></li>
 						</ul>
 					</div>  <!--end of menu-->
 				</nav>

 			</div>

 		</div> <!-- end of row-->
 	</div> <!--end of containter-->


 	<!-- end of header-->







 	<center><h1>Registration FORM</h1></center>
 	<br>
 	<div class="container">
 		<div class="row-main center-form">
 			<div class="main-login main-center"> 
 				<form action="" name="frm" method="POST" enctype="multipart/form-data" class="login-box" >
 					<div class="form-group">
 						<div class="row">
 							<div class="col-xs-12 col-md-4 col-sm-8">
 								<label>FirstName:</label>
 								<input type="text" name="fname" id="fname" placeholder="FirstName" class="form-control" pattern="[a-zA-Z0-9]{3,25}" title="firstname should only contain letters."  title="please enter valid name" 
 								required> 
 								<br>

 								<span style="color: red;">
 									<?php if (isset($f_error)) {echo $f_error;}?> 
 								</span>
 							</div>
 							
 							<div class="col-xs-12 col-md-4 col-sm-8">
 								<label>MiddleName:</label>
 								<input type="text" name="mname" id="mname" placeholder="MiddleName" pattern="[a-zA-Z]{1,25}" class="form-control" 
 								required>
 								<br>
 								<span style="color: red;">
 									<?php if (isset($error)) {	echo $error;}?> 
 								</span>
 							</div>
 							<!-- <br><br><br><br> -->


 							<div class="col-xs-12 col-md-4 col-sm-8	">
 								<label>LastName::</label>
 								<input type="text" name="lname" id="lname" placeholder="LastName" class="form-control" pattern="[a-zA-Z0-9]{3,25}" title="Username should only contain letters." required > 
 								<br>
 								<span style="color: red;">
 									<?php if (isset($l_error)) {echo $l_error;}?> 
 								</span>
 							</div>
 						</div>
 						<br><br>
 						<div class="row">
 							<div class="">
 								<div class="form-group">
 									<label>Gender:</label>
 									<!-- <span style=' padding-left:100px'> -->
 										<!-- <span style="padding-left:1px"/> -->

 										<input type="radio" name="gender" id="gender" value="male" class=""> Male</span>
 										<input type="radio" name="gender" id="gender" value="female"> Female
 									</div>
 								</div>

 								<div class="">
 									<div class="form-group">
 										<label>Enter date of birth:</label>
 										<input type="date" name="dob" id="dob" 
 										placeholder="DD-MM-YYYY" required>
 									</div>
 								</div>
 							</div>
 							<br><br>
 							<div class="row">
 								<div class="col-xs-12 col-md-4 col-sm-8">
 									<label>Contact No</label>
 									<input  type="tel" name="phone" id="phone" class="form-control" maxlength="10" placeholder="enter contact no" required pattern="[0-9]{10}">

 								</div>
 								
 								<div class=" col-xs-12 col-md-4 col-sm-8">
 									<!-- //<!pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z][2,4]&"-->
 									<!-- pattern="[^@\s]+@[^@\s]+\.[^@\s]+" -->
 									<!-- pattern="[a-zA-Z0-9]{3,}@[a-zA-Z0-9]{3,}[.]{1}[a-zA-Z0-9]{2,}" -->
 									<label>Email address</label>
 									<input type="email" name="email" id="email" class="form-control"  placeholder="Enter email" value="

 									<?php if (isset($_SESSION['email'])) {
 										echo $_SESSION['email'];
 									} ?> " required>
 								</div> 
 								<div class="col-xs-12 col-md-4 col-sm-8">
 									<label>Confirm E-mail:</label>
 									
 									<input type="email" name="email2" class="form-control" id="email2" placeholder="confirm E-mail"  

 									value="
 									<?php if (isset($_SESSION['email2'])) {
 										echo $_SESSION['email2'];
 									} ?> " required>

 									<br>
 									<span style="color: red;">
 										<?php if (isset($e_error)) {echo $e_error;}?>
 									</span> 
 								</div>
 								<!-- <?php// if(in_array("email dont match<br>", $error_array)) echo "email dont match<br>";?> -->
						 <!-- <?php
						   //echo $_SESSION['error'][]='please enter current password';?> -->
						</div>
						<br><br><br><br>

						<div class="row">
							<div class="col-xs-12 col-md-4 col-sm-8">
								<label>PRN</label>
								
								<input type="tel" name="prn" id="prn" class="form-control" placeholder="PRN"   pattern="[0-9]{16}" maxlength="16" required>
								<br><br>
								<span style="color: red;">
									<?php if (isset($pr_error)) {echo $pr_error;}?>

									<!-- <?php //if(in_array("pleace enter valid prn number<br>", $error_array)) echo "pleace enter valid prn number<br>";?> -->
								</span>
							</div>
							<!-- <div class="row"> -->
								<div class="col-md-4">
									<label>Indian State List</label>
									<!-- <div class=""> -->

										<select name="state" class="dropdown">
											<option value="">------------Select State------------</option>
											<option value="Andaman and Nicobar Islands" name="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
											<option value="Andhra Pradesh" name="Andhra Pradesh">Andhra Pradesh</option>
											<option value="Arunachal Pradesh" name="Arunachal Pradesh">Arunachal Pradesh</option>
											<option value="Assam" name="Assam">Assam</option>
											<option value="Bihar" name="Bihar">Bihar</option>
											<option value="Chandigarh" name="Chandigarh">Chandigarh</option>
											<option value="Chhattisgarh" name="Chhattisgarh">Chhattisgarh</option>
											<option value="Dadra and Nagar Haveli" name="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
											<option value="Daman and Diu" name="Daman and Diu">Daman and Diu</option>
											<option value="Delhi" name="Delhi">Delhi</option>
											<option value="Goa" name="Goa">Goa</option>
											<option value="Gujarat" name="Gujarat">Gujarat</option>
											<option value="Haryana" name="Haryana">Haryana</option>
											<option value="Himachal Pradesh" name="Himachal Pradesh">Himachal Pradesh</option>
											<option value="Jammu and Kashmir" name="Jammu and Kashmir">Jammu and Kashmir</option>
											<option value="Jharkhand" name="Jharkhand">Jharkhand</option>
											<option value="Karnataka" name="Karnataka">Karnataka</option>
											<option value="Kerala" name="Kerala">Kerala</option>
											<option value="Lakshadweep" name="Lakshadweep">Lakshadweep</option>
											<option value="Madhya Pradesh" name="Madhya Pradesh">Madhya Pradesh</option>
											<option value="Maharashtra" name="Maharashtra">Maharashtra</option>
											<option value="Manipur" name="Manipur">Manipur</option>
											<option value="Meghalaya" name="Meghalaya">Meghalaya</option>
											<option value="Mizoram" name="Mizoram">Mizoram</option>
											<option value="Nagaland" name="Nagaland">Nagaland</option>
											<option value="Orissa" name="Orissa">Orissa</option>
											<option value="Pondicherry" name="Pondicherry">Pondicherry</option>
											<option value="Punjab" name="Punjab">Punjab</option>
											<option value="Rajasthan" name="Rajasthan">Rajasthan</option>
											<option value="Sikkim" name="Sikkim">Sikkim</option>
											<option value="Tamil Nadu" name="Tamil">Tamil Nadu</option>
											<option value="Tripura" name="Tripura">Tripura</option>
											<option value="Uttaranchal" name="Uttaranchal">Uttaranchal</option>
											<option value="Uttar Pradesh" name="Uttar Pradesh">Uttar Pradesh</option>
											<option value="West Bengal" name="West Bengal">West Bengal</option>
										</select>
									</div>

									<div class="col-md-4">

										<font color="#FF0000" size="+0"><sup>*</sup></font><label>Your City</label>
										<span style="padding-left:1px"/>:</label><select name="city" value="" style="width:230" class="dropdown" >
											<option selected="selected">-Select-</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#000000"><i>-Top Metropolitan Cities-</i></font></option>
											<option name="Ahmedabad" value="Ahmedabad">Ahmedabad</option> 
											<option name="Bengaluru/Bangalore">Bengaluru/Bangalore</option>
											<option name="Chandigarh">Chandigarh</option>
											<option name="Chennai">Chennai</option>
											<option name="Delhi">Delhi</option>
											<option name="Gurgaon">Gurgaon</option>
											<option name="Hyderabad/Secunderabad">Hyderabad/Secunderabad</option>
											<option name="Kolkatta">Kolkatta</option>
											<option name="Mumbai">Mumbai</option>
											<option name="Noida">Noida</option>
											<option name="Pune">Pune</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Andhra Pradesh-</i></font></option>
											<option name="Anantapur">Anantapur</option>
											<option name="Guntakal">Guntakal</option>
											<option name="Guntur">Guntur</option>
											<option name="Hyderabad/Secunderabad">Hyderabad/Secunderabad</option>
											<option name="kakinada">kakinada</option>
											<option name="kurnool">kurnool</option>
											<option name="Nellore">Nellore</option>
											<option name="Nizamabad">Nizamabad</option>
											<option name="Rajahmundry">Rajahmundry</option>
											<option name="Tirupati">Tirupati</option>
											<option name="Vijayawada">Vijayawada</option>
											<option name="Visakhapatnam">Visakhapatnam</option>
											<option name="Warangal">Warangal</option>
											<option name="Andra Pradesh-Other">Andra Pradesh-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Arunachal Pradesh-</i></font></option>
											<option name="Itanagar">Itanagar</option>
											<option name="Arunachal Pradesh-Other">Arunachal Pradesh-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Assam-</i></font></option>
											<option name="Guwahati">Guwahati</option>
											<option name="Silchar">Silchar</option>
											<option name="Assam-Other">Assam-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Bihar-</i></font></option>
											<option name="Bhagalpur">Bhagalpur</option>
											<option name="Patna">Patna</option>
											<option name="Bihar-Other">Bihar-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Chhattisgarh-</i></font></option>
											<option name="Bhillai">Bhillai</option>
											<option name="Bilaspur">Bilaspur</option>
											<option name="Raipur">Raipur</option>
											<option name="Chhattisgarh-Other">Chhattisgarh-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Goa-</i></font></option>
											<option name="Panjim/Panaji">Panjim/Panaji</option>
											<option name="Vasco Da Gama">Vasco Da Gama</option>
											<option name="Goa-Other">Goa-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Gujarat-</i></font></option>
											<option name="Ahmedabad">Ahmedabad</option>
											<option name="">Anand</option>
											<option name="">Ankleshwar</option>
											<option name="">Bharuch</option>
											<option name="">Bhavnagar</option>
											<option>Bhuj</option>
											<option>Gandhinagar</option>
											<option>Gir</option>
											<option>Jamnagar</option>
											<option>Kandla</option>
											<option>Porbandar</option>
											<option>Rajkot</option>
											<option>Surat</option>
											<option name="Vadodara/Baroda">Vadodara/Baroda</option>
											<option>Valsad</option>
											<option>Vapi</option>
											<option>Gujarat-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Haryana-</i></font></option>
											<option>Ambala</option>
											<option>Chandigarh</option>
											<option>Faridabad</option>
											<option>Gurgaon</option>
											<option>Hisar</option>
											<option>Karnal</option>
											<option>Kurukshetra</option>
											<option>Panipat</option>
											<option>Rohtak</option>
											<option>Haryana-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Himachal Pradesh-</i></font></option>
											<option>Dalhousie</option>
											<option>Dharmasala</option>
											<option>Kulu/Manali</option>
											<option>Shimla</option>
											<option>Himachal Pradesh-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Jammu and Kashmir-</i></font></option>
											<option>Jammu</option>
											<option>Srinagar</option>
											<option>Jammu and Kashmir-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Jharkhand-</i></font></option>
											<option>Bokaro</option>
											<option>Dhanbad</option>
											<option>Jamshedpur</option>
											<option>Ranchi</option>
											<option>Jharkhand-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Karnataka-</i></font></option>
											<option>Bengaluru/Bangalore</option>
											<option>Belgaum</option>
											<option>Bellary</option>
											<option>Bidar</option>
											<option>Dharwad</option>
											<option>Gulbarga</option>
											<option>Hubli</option>
											<option>Kolar</option>
											<option>Mangalore</option>
											<option>Mysoru/Mysore</option>
											<option>Karnataka-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Kerala-</i></font></option>
											<option>Calicut</option>
											<option>Cochin</option>
											<option>Ernakulam</option>
											<option>Kannur</option>
											<option>Kochi</option>
											<option>Kollam</option>
											<option>Kottayam</option>
											<option>Kozhikode</option>
											<option>Palakkad</option>
											<option>Palghat</option>
											<option>Thrissur</option>
											<option>Trivandrum</option>
											<option>Kerela-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Madhya Pradesh-</i></font></option>
											<option>Bhopal</option>
											<option>Gwalior</option>
											<option>Indore</option>
											<option>Jabalpur</option>
											<option>Ujjain</option>
											<option>Madhya Pradesh-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Maharashtra-</i></font></option>
											<option>Ahmednagar</option>
											<option>Aurangabad</option>
											<option>Jalgaon</option>
											<option>Kolhapur</option>
											<option>Mumbai</option>
											<option>Mumbai Suburbs</option>
											<option>Nagpur</option>
											<option>Nasik</option>
											<option>Navi Mumbai</option>
											<option>Pune</option>
											<option>Solapur</option>
											<option>Maharashtra-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Manipur-</i></font></option>
											<option>Imphal</option>
											<option>Manipur-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Meghalaya-</i></font></option>
											<option>Shillong</option>
											<option>Meghalaya-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Mizoram-</i></font></option>
											<option>Aizawal</option>
											<option>Mizoram-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Nagaland-</i></font></option>
											<option>Dimapur</option>
											<option>Nagaland-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Orissa-</i></font></option>
											<option>Bhubaneshwar</option>
											<option>Cuttak</option>
											<option>Paradeep</option>
											<option>Puri</option>
											<option>Rourkela</option>
											<option>Orissa-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Punjab-</i></font></option>
											<option>Amritsar</option>
											<option>Bathinda</option>
											<option>Chandigarh</option>
											<option>Jalandhar</option>
											<option>Ludhiana</option>
											<option>Mohali</option>
											<option>Pathankot</option>
											<option>Patiala</option>
											<option>Punjab-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Rajasthan-</i></font></option>
											<option>Ajmer</option>
											<option>Jaipur</option>
											<option>Jaisalmer</option>
											<option>Jodhpur</option>
											<option>Kota</option>
											<option>Udaipur</option>
											<option>Rajasthan-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Sikkim-</i></font></option>
											<option>Gangtok</option>
											<option>Sikkim-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Tamil Nadu-</i></font></option>
											<option>Chennai</option>
											<option>Coimbatore</option>
											<option>Cuddalore</option>
											<option>Erode</option>
											<option>Hosur</option>
											<option>Madurai</option>
											<option>Nagerkoil</option>
											<option>Ooty</option>
											<option>Salem</option>
											<option>Thanjavur</option>
											<option>Tirunalveli</option>
											<option>Trichy</option>
											<option>Tuticorin</option>
											<option>Vellore</option>
											<option>Tamil Nadu-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Tripura-</i></font></option>
											<option>Agartala</option>
											<option>Tripura-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Union Territories-</i></font></option>
											<option>Chandigarh</option>
											<option>Dadra & Nagar Haveli-Silvassa</option>
											<option>Daman & Diu</option>
											<option>Delhi</option>
											<option>Pondichery</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Uttar Pradesh-</i></font></option>
											<option>Agra</option>
											<option>Aligarh</option>
											<option>Allahabad</option>
											<option>Bareilly</option>
											<option>Faizabad</option>
											<option>Ghaziabad</option>
											<option>Gorakhpur</option>
											<option>Kanpur</option>
											<option>Lucknow</option>
											<option>Mathura</option>
											<option>Meerut</option>
											<option>Moradabad</option>
											<option>Noida</option>
											<option>Varanasi/Banaras</option>
											<option>Uttar Pradesh-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Uttaranchal-</i></font></option>
											<option>Dehradun</option>
											<option>Roorkee</option>
											<option>Uttaranchal-Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-West Bengal-</i></font></option>
											<option>Asansol</option>
											<option>Durgapur</option>
											<option>Haldia</option>
											<option>Kharagpur</option>
											<option>Kolkatta</option>
											<option>Siliguri</option>
											<option>West Bengal - Other</option>
											<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Other-</i></font></option>
											<option>Other</option>
										</select>
									</div>
								</div>


								<br>
								<br>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Address:</label>
											<textarea name="add" class="form-control" id="add"></textarea>
										</div>
									</div>

									<div class="col-md-4">
										<label >Year:</label>
										<select name="year" required>
											<option value="sy" name="sy" selected="">SY</option>
											<option value="ty" name="ty">TY</option>
										</select>
									</div>
								</div>
								
								<br><br>


								<center><label>FAMAILY INFORMATION</label></center>
								<br>
								<div class="container">
									<div class="row">
										<div class="col-md-4 col-sm-8 col-xl-12 col-xs-12">
											<label >Parent Name:</label>
											<input type="text" name="pname" class="form-control" pattern="[A-Za-z]{1,15}" placeholder="Father Name" required>
											

										</div>
										<div class="col-md-4 col-sm-8 col-xl-12 col-xs-12">
											<label >Parent Occupation:</label>
											<input type="text" name="pocc" class="form-control" placeholder="Father occupation"><br>

										</div>

										<div class="col-md-4 col-sm-8 col-xl-12 col-xs-12">
											<label >Parent Number:</label>
											<input type="tel" name="pno" class="form-control" pattern="[0-9]{10}" maxlength="10"  placeholder="father Phone number"  required><br><br>

										</div>
									</div>

									<div class="row">
										<div class="col-md-4 col-sm-10">
											<label >Parent Email:</label>
											<input type="email" name="pemail" class="form-control"  pattern="[^ @]*@[^ @]*" placeholder="Father E-mail"><br><br>
										</div>

										<div class="col-md-8 col-sm-12 col-xs-12">
											<label >Parent address:</label>
											<input type="textarea" name="padd" class="form-control" placeholder="Father address"><br>
										</div>

										<br><br>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 col-sm-12 ">
									
									<label>Password:</label>

									<input type="password" class="form-control" name="password" id="pwd" placeholder="Password" required>
									<br><br>
								</div>
								<div class="col-md-6 col-sm-12">
									<label>Confirm Password:</label>
									<input type="password" class="form-control" name="password2" id="pwd2" placeholder="confirm Password" required>
									<br><br>
									<span style="color: red;">
										<?php if (isset($p_error)) { echo $p_error;}?>  </span>

										<!-- </span> -->
										<!-- <?php //echo $_SESSION['error'][]='please enter current password';?> -->



									</div>
								</div>
							</div>
							<br><br>
							<!-- <p class="btn btn-success"> -->
								<div class="row">
									<center>
										<input type="submit" class="btn btn-success" name="submit">&nbsp;&nbsp;
										<input name="reset" type="reset" class=" btn btn-primary" id="reset" value="Reset">&nbsp;&nbsp;
										<!-- <input name="close" type="button" class="btn" id="close" value="Close">&nbsp;&nbsp; -->
										<!-- <input name="login" type="button" id="login" value="Login">&nbsp;&nbsp; -->
										<button type="button" class="btn btn-success"><a href="index.php">login now</a></button>
									</center>
								</div>

								<br>
								<br>
								<?php $cmsg = "<span style='color:#08FA24;'>go ahead and login</span> <br>";
						   	//echo"<script>alert('your username is $username')</script>";
						   	// $unm="<span style='color:#08FA24;'>your username is   $username</span><br>";
							// if (isset($cmsg)) {echo $cmsg;}
						   	//$unm="<span style='color:#08FA24;'>your username is $username</span><br>";
								?>

							</form>

							<?php
						  // $unm="<span style='color:#08FA24;'>your username is $username </span><br>";
				// 	if (!isset($_GET['reg'])) {
				// 		exit();
				// 	}
				// 	else{
				// 		$regCheck=$_GET['reg'];
				// 		if ($regCheck=="empty") {
				// 			echo "<p>you did not fill in all fields</p>";
				// 			exit();

				// 		}

				// 		elseif ($regCheck=="dontmatch") {
				// 			echo "<p style='color:red;'>email dont match<br></p>";
				// 			exit();

				// 	}
				// 		elseif ($regCheck=="already") {
				// 			echo "<p style='color:red;'>email already in use<br></p>";
				// 			exit();

				// 	}
				// 		elseif ($regCheck=="invalid") {
				// 			echo "<p style='color:red;'>invalid email format<br></p>";
				// 			exit();

				// 	}
				// 		elseif ($regCheck=="firstname") {
				// 			echo "<p style='color:red;'>your first name must be between 2 and 25 characters<br></p>";
				// 			exit();

				// 	}
				// 		elseif ($regCheck=="lastname") {
				// 			echo "<p style='color:red;'>your last name must be between 2 and 25 characters<br></p>";
				// 			exit();

				// 	}
				// 		elseif ($regCheck=="passwordnotmatch") {
				// 			echo "<p style='color:red;'>your password do not match<br></p>";
				// 			exit();

				// 	}
				// 		elseif ($regCheck=="passwordchar") {
				// 			echo "<p style='color:red;'>your password  only contain characters or numbers and symbol<br></p>";
				// 			exit();

				// 	}
				// 		elseif ($regCheck=="passwordblength") {
				// 			echo "<p style='color:red;'>your password must be between 5 to 30 characters<br></p>";
				// 			exit();

				// 	}
				// 		elseif ($regCheck=="prn") {
				// 			echo "<p style='color:red;'>pleace enter valid prn number<br></p>";
				// 			exit();

				// 	}
				// 		elseif ($regCheck=="success") {
				// 			echo "<p style='color:red;'>success<br></p>";
				// 			exit();

				// 	}
				// }




							?>
						</div>
					</div>
				</div>
			</span>
		</div>





		<!-- Optional JavaScript -->


		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
	</body>
	</html>



