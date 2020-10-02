<?php 
include 'handler/dbcon.php';
include 'functions.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {

	$email=mysqli_real_escape_string($con,$_POST['email']); //mysqli_real_escape_string 
   // $password=$_POST['password']; 
	$query=mysqli_query($con,"SELECT fname,email FROM student WHERE email='{$email}'")or die(mysqli_error($con));
	$count=mysqli_num_rows($query);
	$row = mysqli_fetch_array($query);
	//echo $count;

	if ($count>0) {

      //   $token = generateNewString();



         // $query= mysqli_query($con,"UPDATE student SET token='$token', 
         //              tokenExpire=DATE_ADD(NOW(), INTERVAL 5 MINUTE)
         //              WHERE email='$email'
         //    ");

		//echo $row['password'];



// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


//Load composer's autoloader
    require 'PHPMailer/vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'onlinesubmission007@gmail.com';                 // SMTP username
    $mail->Password = 'qwertyuiopmnbvcxz';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; 
    //$mail->Port = 465;                                   // TCP port to connect to

    //Recipients
    $mail->setFrom('onlinesubmission007@gmail.com', 'onlinesubmission');
    $mail->addAddress($email, $email);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'forgot password';
    $mail->Body    = "Hi,<br><br>
    
    In order to reset your password, please click on the link below:<br>
    <a href='
    http://localhost:8081/OnlineSubmission/resetPassword.php?email=$email
    '>
    http://localhost:8081/OnlineSubmission/resetPassword.php?email=$email&</a><br><br>
    
    ";
    //{$row['password']}   &token=$token
                //token=$token

    $mail->AltBody = "Hi,<br><br>
    
    In order to reset your password, please click on the link below:<br>
    <a href='
    http://localhost:8081/OnlineSubmission/resetPassword.php?email=$email
    '>
    http://localhost:8081/OnlineSubmission/resetPassword.php?email=$email</a><br><br>
    
    Kind Regards,<br>
    My Name <h3>jignesh</h3>
    ";

    $mail->send();
    echo "<script>alert('your password has been sent on your Email ID');</script>";
  } catch (Exception $e) {
    echo "<script>alert('Message could not be sent. Mailer Error: ');</script>"; $mail->ErrorInfo;
  }




}
else{
  echo "<script>alert('Email not found');</script>";

}


}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  
  <link rel="stylesheet" href="css/style1.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
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


<center><h3>request for new password</h3>
<hr>
<form action="" method="post">
  <input type="email" name="email" placeholder="enter your email" required=""><br><br>
  <input type="submit" name="submit" value="request new password">
  
</form>
</center>
</body>
</html>







