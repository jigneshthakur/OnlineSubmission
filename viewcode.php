
<?php 
include'handler/dbcon.php';
if (!$_SESSION['username']) {
	header('location: teacher_login.php?error=you not an teacher');
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title></title>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
	
	<link rel="stylesheet" href="css/style1.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="">
</head>
<body>
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
							<li ><a  href="teacher_home.php">Home</a></li>  
							<li class="active"><a  href="view1.php">view student record</a></li>
							<li><a  href="upload1.php">document</a></li>
							<li><a  href="htmlcode.php">view html code</a></li>
							<li><a  href="logout.php">Logout</a></li>
						</ul>
					</div>  <!--end of menu-->
				</nav>

			</div>
			
		</div> <!-- end of row-->
	</div> <!--end of containter-->
	<center><label>Welcome:</label>
		<font color="blue" size="3"><?php echo $_SESSION['username'];?></font></center>
		
		<br><br>
		<center><font color="red" size="6"><?php echo @$_GET['deleted'];?>
			<?php echo @$_GET['updated'];?>
		</font></center>

		<table align="center" width="1000" border="4">  
			<tr>
				<td align="center" bgcolor="#FF3000" colspan="20" rowspan="" headers="" scope=""><h2>view all the code</h2></td>
			</tr>	
			<tr align="center">
				<td colspan="" rowspan="" headers="">id</td>

				<td colspan="" rowspan="" headers="">body</td>
				<td colspan="" rowspan="" headers="">input</td>
				<td colspan="" rowspan="" headers="">output</td>
				<td colspan="" rowspan="" headers="">prn</td>

				<td colspan="" rowspan="" headers="">delete</td>
				<!-- <td colspan="" rowspan="" headers="">edit</td> -->
				<!-- <td colspan="" rowspan="" headers="">details</td> -->


			</tr>


























			<?php 
		// include'handler/dbcon.php';

			$query="SELECT * FROM cpp";
			$run=mysqli_query($con,$query);
			while ($row=mysqli_fetch_array($run)) {
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

					<td> <a href="delete.php?del=<?php echo $prn;?>"> delete</a></td>
					<!-- <td> <a href="edit.php?edit=<?php #echo $prn;?>"> edit</a></td> -->
					<!-- <td> <a href="details.php?detail=<?php #echo $prn;?>"> details</a></td> -->

				</tr>
				<?php } ?>





