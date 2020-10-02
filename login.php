 
<?php 


include'handler/dbcon.php';


if (isset($_POST['login']))
{
	//echo "hello";
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	if (empty($username) || empty($password)) {
		echo"<script>alert('Please enter username and password')</script>";
		header("Refresh:1; url=index.php");
		
			// header('location: index.php');
			// 		exit();
	} else {
		$sql="SELECT * FROM student WHERE username='$username' OR email='$username'";
		$result=mysqli_query($con,$sql);
		$resultCheck=mysqli_num_rows($result);
		if ($resultCheck<1) {
			//echo "user not error";
			echo"<script>alert('user not found')</script>";
			header("Refresh:1; url=index.php");
			
				// header('location: index.php');
				// 	exit();

		}else{
			if ($row=mysqli_fetch_assoc($result)) {
	//		echo $row['user_uid'];
			//de-hashing the password
				$hashedPwdCheck=password_verify($password,$row['password']);
				if ($hashedPwdCheck==false) {
					echo"<script>alert('password not match')</script>";
					header("Refresh:1; url=index.php");
					// header('location: index.php');
					// exit();
				} elseif ($hashedPwdCheck==true) {
			//log in the user here
					$_SESSION['username']=$row['username'];
					$_SESSION['prn']=$row['prn'];
					echo"<script>alert('success')</script>";

					header('location: home.php');

					
				}
			}
		}

	}

}
// else{
// echo "error";
// }




?>
