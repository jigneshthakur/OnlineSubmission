<?php 
include'handler/dbcon.php';
$prn1=$_GET['code'];

?>




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
							<li class="active"><a  href="teacher_home.php">HOME</a></li>  
							<li><a  href="view1.php">STUDENT RECORD</a></li>
							<li><a  href="htmlcode.php">HTML CODE</a></li>
							<li><a  href="upload1.php">UPLOAD$DOWNLOAD</a></li>
							<!-- <li><a  href="download.php?id=$id">download</a></li> -->
							<!-- <li><a  href="viewcode.php">Cpp code</a></li> -->
							<li><a  href="logout.php">LOGOUT</a></li>
						</ul>
					</div>  <!--end of menu-->
				</nav>

			</div>
			
		</div> <!-- end of row-->
	</div> <!--end of containter-->



	<table align="center" width="auto" border="4">  
		<tr>
			<td align="center" bgcolor="#FF3000" colspan="20" rowspan="" headers="" scope=""><h2>view all the code</h2></td>
		</tr>	
		<tr align="center">
			<td colspan="" rowspan="" headers="">id</td>

			<td colspan="" rowspan="" headers="">body</td>
			<td colspan="" rowspan="" headers="">input</td>
			<td colspan="" rowspan="" headers="">output</td>
			<td colspan="" rowspan="" headers="">prn</td>
			<!-- <td colspan="" rowspan="" headers="">output</td> -->

			<!-- <td colspan="" rowspan="" headers="">delete</td>
			<td colspan="" rowspan="" headers="">edit</td>
			<td colspan="" rowspan="" headers="">details</td> -->
			


		</tr>
		<?php 
		
		 //include'handler/dbcon.php';


		$q=mysqli_query($con,"SELECT * FROM cpp WHERE prn='$prn1'");
//$run=mysqli_query($con,$q);

		//$query="SELECT * FROM student";
		//$run=mysqli_query($con,$query);
		while ($row=mysqli_fetch_array($q)) {
			$id=$row[0];
			$body=$row[1];
			$input=$row[2];
			$output=$row[3];
			$prn=$row[4];

			?>


			<tr align="center">
				<td><?php echo $id;?></td>
				<td><?php echo $body;?></td>
				<td><?php echo $input;?></td>
				<td><?php echo $output;?></td>

				<td><?php echo $prn;?></td>


				

			</tr>
			<?php } ?>


		</table>
	</body>
	</html>


