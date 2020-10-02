<?php 

///if (isset($_POST['login'])) {
	session_start();
	session_unset('username');
	session_destroy();
	header("location: index.php");
	//exit();
//}

 ?>