
<?php
include'../handler/dbcon.php';

if (isset($_POST['submit'])) {
	$body=$_POST['editor'];
	//$input=$_POST['input'];
	$output=$_POST['browser'];
	$prn=$_SESSION['prn'];

	if (!empty($output)) {
		$query=mysqli_query($con,"INSERT INTO html VALUES ('','$body','$output','$prn')");
	}
	// else{
	// 	echo 'not inserted';
	// }

}




?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>HTML & CSS COMPILER</title>
	
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>

	<link rel="stylesheet" href="../css/style1.css"/>
	<!-- <link rel="stylesheet" href="../css/studenthome.css"/>  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style type="text/css" media="screen">
	body{margin:0;background: #ffff}
	.header{height: 80px;}
	.menu1{height: 50px; background:#FF3000;}
	.content{height: 450px;background: white;}
	#browser{width: 55%; height:450px;   float: right ; border: 1px solid black;}
	#editor{width:40%;height:450px; float: left ;  border: 1px solid black; resize: none;}
	.menu1 input[type="button"] {margin-left:200px;width: 120px;height: 50px; }


</style>
<script>
	function myTRY()
	{
		var code= document.getElementById("editor").value;
		document.getElementById("browser").innerHTML=code;
	}
	function post()
	{
		var editor=$('#editor').val();
		var browser=$('#browser').val();
		$.post('tryit.php',{bodyname:editor,outputname:browser},
			function()
			{
				$('#browser').html(data);


			});
	}




</script>
</head>
<body>
	<!-- logo and navigation-->
	<div class="container">  <!-- container of logo-->
		<div class="row"><!--start of row-->
			<div class="col-sm-3 " >
				<a href="../home.php" title=""><img src="../images1/os4.png" width="150px" ></a>
			</div>
			<div class="col-sm-9 menu">
				<nav class="navbar navbar-default">
					<!--navbar start-->
					<div class="collapse navbar-collapse" id="myNavbar" >
						<ul class="nav navbar-nav   pull-right">
							<!--start of menu-->
							<li ><a  href="../home.php">Home</a></li>  
							<li class="active"><a  href="OnlineCompiler?prn=<?php echo $prn;?>">COMPILER</a></li>
							<li><a  href="../upload.php">UPLOAD&DOWNLOAD</a></li>
							<li><a  href="../changepassword.php">CHANGEPASSWORD</a></li>
							<li><a href="../logout.php">LOGOUT</a></li>
						</ul>
					</div>  <!--end of menu-->
				</nav>

			</div>

		</div> <!-- end of row-->
	</div> <!--end of containter-->

	<form action="" method="post" accept-charset="utf-8">
		
		

		<div class="main">
			<div class="header"></div>
			<div class="menu1">
				<input type="button" name="run" value="RUN" onclick="myTRY()">
				<input type="submit" name="submit" value="submit" onclick="post()">
			</div>

			<div class="content">
				<div id="browser"></div>
				<textarea name="editor" id="editor"></textarea>



			</div>
		</div>
	</form>
</body>
</html>