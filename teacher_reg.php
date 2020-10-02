<?php
//session_start();

include('handler/dbcon.php');
if (isset($_POST['submit'])) {
  # code...

 
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
//$mname=$_POST['mname'];
  $email=$_POST['email'];
  $dob=$_POST['dob'];
  $gender=$_POST['gender'];
  $contact=$_POST['contact'];
  $education=$_POST['education'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $date=Date("Y-m-d");

 //$password=md5($_POST['password']);
  $passwordhased=password_hash($password,PASSWORD_BCRYPT);


  $query=mysqli_query($con, "INSERT INTO teachers VALUES('','$fname', '$lname', '$email', '$contact','$dob', '$gender','education','$passwordhased', '$username','$date')");
  
//header("location: index.php?remarks=success");
  
  mysqli_close($con);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Teacher Registration Form</title>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  
  <link rel="stylesheet" href="css/style1.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css" media="screen">
  tr{

  }
</style>
</head>
<body>
  <!-- logo and navigation-->
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
           <li><a  href="admin_home.php">HOME</a></li>  
           <li><a  href="view.php">STUDENT RECORD</a></li>
           <li class="active"><a  href="teacher_reg.php">ADD TEACHER</a></li>
           <!-- <li><a  href="event.php">Add Event</a></li> -->
           <li><a  href="logout.php">Logout</a></li>
         </ul>
       </div>  <!--end of menu-->
     </nav>

   </div>

 </div> <!-- end of row-->
</div> <!--end of containter-->

<center><h1> ADD TECHERS</h1></center>

<form name="" action="" onsubmit="return validateForm()" method="post">
  <table width="274" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="2">
        <div align="center">
          <?php 
          // $remarks=$_GET['remarks'];
          if (!isset($_GET['remarks']))
          {
            echo '';
          }
          if (isset($_GET['remarks']) && $_GET['remarks']=='success')
          {
            echo 'Registration Success';
          }
          ?>  
        </div></td>
      </tr>
      
      <tr>
        <td width="95"><div align="right">First Name:</div><br></td>
        <td width="171"><input type="text" name="fname" required="" pattern="[a-zA-Z]{3,15}" /></td>

      </tr>
      
      <tr>
        
        <td><div align="right">Last Name:</div><br></td>
        <td><input type="text" name="lname" required="" pattern="[a-zA-Z]{3,15}" /></td>
      </tr>
      
      <tr>
        <td><div align="right">Email:</div><br></td>
        <td><input type="email" name="email" required="" /></td>
      </tr>
      
      <tr>
        <td><div align="right">Gender:</div><br></td>
        <!-- <td><input type="text" name="gender" /></td> -->
        <td><input type="radio" name="gender" id="gender" value="male" class=""> Male</span>
                    <input type="radio" name="gender" id="gender" value="female"> Female
      </td>
      </tr>
      
      <tr>
        <td><div align="right">Date Of Birth:</div><br></td>
        <td><input type="date" name="dob" placeholder="DD-MM-YYYY"/></td>
      </tr>
      
      <tr>
        <td><div align="right">Address:</div><br></td>
        <td><input type="text" name="address" /></td>
      </tr>
      
      <tr>
        <td><div align="right">Education:</div><br></td>
        <td><input type="text" name="education" required="" /></td>
      </tr>
      
      <tr>
        <td><div align="right">Contact No.:</div><br></td>
        <td><input type="tel" name="contact" pattern="[0-9]{10}" /></td>
      </tr>
      
      <tr>
        <td><div align="right">Username:</div><br></td>
        <td><input type="text" name="username" /></td>
      </tr>
      
      <tr>
        <td><div align="right">Password:</div><br></td>
        <td><input type="password" name="password" pattern="{5}" /></td>
      </tr>
      
      <tr>
        <td><div align="right"></div><br></td>
        <td><input name="submit" type="submit" value="Submit" /></td>
      </tr>
    </table>
  </form>
</body>
</html>