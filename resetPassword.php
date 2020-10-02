 <?php
 include 'handler/dbcon.php';
 require_once "functions.php";


 ?> 


 <?php
 require_once 'handler/dbcon.php';
 if(isset($_POST["reset-password"])){
  $email = $_GET["email"];
  $password = trim($_POST["password"]);
  $confirmPassword = trim($_POST["confirmPassword"]);
  if($password == $confirmPassword) {
   $password = password_hash($password, PASSWORD_DEFAULT); 

   $query=mysqli_query($con,"UPDATE student SET password= '$password' WHERE email = '$email'")or die(mysqli_error($con));
   
   
   if($query>0) {
     $success_message = "Password is rest successfully.<br>Now you are redirecting";
     header("Refresh:3; url=index.php");
   } else {
     $error_message = "Failed : <br> Password not updated";
   }
 } else {
  $error_message = "Password not matched";
}
}
?> 
<!DOCTYPE html>
<html>
<head>
  <title>Reset Password</title>
  <link href="style.css" rel="stylesheet">
</head>
<body>
  <div id="loginContainer">
    <form id="reserPassword" name="reserPassword" method="post">
      <h3>Reset Password</h3>
      <?php if(!empty($success_message)) { ?>
      <div class="success_message"><?php echo $success_message ?></div>
      <?php } ?>
      <?php if(!empty($error_message)) { ?>
      <div class="error_message"><?php echo $error_message ?></div>
      <?php } ?>
      <input type="password" id="password" name="password" placeholder="Enter a New Password" required>
      <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
      <input type="submit" value="Reset Password" name="reset-password" id="reset-password">
    </form>
  </div>
</body>
</html>
