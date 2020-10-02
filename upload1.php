<?php
include'handler/dbcon.php';

if (!$_SESSION['username']) {
	header('location: index.php?error=you not an teacher');


}
else{





	if (isset($_POST['upload'])) {



		$file=$_FILES['file'];
	//$prn=$_GET['prn'];

		$filename=$_FILES['file']['name'];
		$filetmp_name=$_FILES['file']['tmp_name'];
		$filerror=$_FILES['file']['error'];
		$filetype=$_FILES['file']['type'];
		$filesize=$_FILES['file']['size'];
		if (move_uploaded_file($filetmp_name,"uploads/".$filename)) {
		//echo "file uploaded";
			echo"<script>alert('file uploaded')</script>";
			$f=mysqli_query($con,"INSERT INTO documents(id,name,size,type) values ('','$filename','$filesize','$filetype')");

		}
		else
		{
		//echo "not upload file";
			echo"<script>alert('file not uploaded')</script>";
		}


	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>upload file</title>
	<meta name="viewport" content="width-device-width">
	<title>MSU-Online OnlineSubmission Portal</title>


	<!--include maincss css file-->


	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>

	<link rel="stylesheet" href="css/style1.css"/>
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
							<li ><a  href="teacher_home.php">HOME</a></li>  
							<li><a  href="view1.php">STUDENT RECORD</a></li>
							<li><a  href="htmlcode.php">HTML CODE</a></li>
							<li class="active"><a  href="upload1.php">UPLOAD&DOWNLOAD</a></li>
							<!-- <li><a  href="download.php?id=$id">download</a></li> -->
							<!-- <li><a  href="viewcode.php">Cpp code</a></li> -->
							<li><a  href="logout.php">LOGOUT</a></li>
						</ul>
					</div>  <!--end of menu-->
				</nav>

			</div>

		</div> <!-- end of row-->
	</div> <!--end of containter-->
	<div class="container">

		<form action="" method="POST"
		enctype="multipart/form-data" accept-charset="utf-8">
		<CENTER><label for="">Welcome:</label>
			<font color="blue" size="3"><?php echo $_SESSION['username'];?></font></CENTER><br><br>

			<label for="">select an file</label>
			<input type="file" name="file" id="file"><br>

			<input type="submit" name="upload" id="uploading" value="upload file">
		</form>
		<br><br>

		<p>
			<center>uploaded files</center>
		</p>
		<?php 

		$file=scandir('uploads');
		for ($i=0; $i <count($file) ; $i++) { 
	# code... displaying links to download

			?>
			<p> 
				<a download="<?php echo $file[$i]?>" href="uploads/<?php echo $file[$i]?>"><?php echo $file[$i]?></a>
			</p>

			<?php 
		}
		?>

	</div>
</body>
</html>




