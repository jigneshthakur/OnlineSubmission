<?php 
include'handler/dbcon.php';

if (!$_SESSION['username']) {
	header('location: admin_login.php?error=you not an administrator');
}
else
{
	
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
				<a href="admin_home.php" title=""><img src="images1/os4.png" width="150px" ></a>
			</div>
			<div class="col-sm-9 menu " >
				<nav class="navbar navbar-default">
					<!--navbar start-->
					<div class="collapse navbar-collapse" id="myNavbar" >
						<ul class="nav navbar-nav   pull-right">
							<!--start of menu-->
							<li><a  href="admin_home.php">Home</a></li>  
							<li class="active"><a  href="view.php">view student record</a></li>
							<li><a  href="teacher_reg.php">Add Teachers</a></li>
							<!-- <li><a  href="event.php">Add Event</a></li> -->
							<li><a  href="logout.php">Logout</a></li>
						</ul>
					</div>  <!--end of menu-->
				</nav>

			</div>
			
		</div> <!-- end of row-->
	</div> <!--end of containter-->
	<center><label for="">Welcome</label>
		<font color="blue" size="3"><?php echo $_SESSION['username'];?></font></center>

		<center><font color="red" size="6"><?php echo @$_GET['deleted'];?>
			<?php echo @$_GET['updated'];?>
		</font></center>

		

		<table align="center" width="auto" border="2">  
			<tr>
				<td align="center" bgcolor="#FF3000" colspan="20" rowspan="" headers="" scope=""><h2>viewing all the records</h2></td>
			</tr>	
			<tr align="center">
				<td colspan="" rowspan="" headers="">prn</td>

				<td colspan="" rowspan="" headers="">fname</td>
				<td colspan="" rowspan="" headers="">mname</td>
				<td colspan="" rowspan="" headers="">lastname</td>

				<td colspan="" rowspan="" headers="">delete</td>
				<td colspan="" rowspan="" headers="">edit</td>
				<!-- <td colspan="" rowspan="" headers="">details</td> -->
				


			</tr>
			<?php 
		// include'handler/dbcon.php';

			$query="SELECT * FROM student";
			$run=mysqli_query($con,$query);
			while ($row=mysqli_fetch_array($run)) {
				$prn=$row[0];
				$fname=$row[1];
				$mname=$row[2];
				$lname=$row[3];
				?>


				<tr align="center">
					<td><?php echo $prn;?></td>
					<td><?php echo $fname;?></td>
					<td><?php echo $mname;?></td>
					<td><?php echo $lname;?></td>

					<td> <a href="delete.php?del=<?php echo $prn;?>"> delete</a></td>
					<td> <a href="edit.php?edit=<?php echo $prn;?>"> edit</a></td>
					<!-- <td> <a href="details.php?detail=<?php #echo $prn;?>"> details</a></td> -->
					

				</tr>
				<?php } ?>

			</table>










			<br><br><br>
			<form action="" method="get" accept-charset="utf-8">
				
				<center>Search a Record<input type="text" name="search">
					<input type="submit" name="submit"></center>
				</form>




				<?php
				if (isset($_GET['search'])) {
					$search_record=$_GET['search'];
					$query="SELECT * FROM student WHERE fname='$search_record' OR prn='$search_record'"; 
					$run=mysqli_query($con,$query);
					while ($row2=mysqli_fetch_assoc($run)) {
						$prn123=$row2['prn'];
						$fname123=$row2['fname'];
						$mname123=$row2['mname'];
						$lname123=$row2['lname'];
						




						?>
						<table width="800px" >
							<tr>
								<td colspan="" rowspan="" headers=""><?php echo $prn123; ?></td>
								<td colspan="" rowspan="" headers=""><?php echo $fname123; ?></td>
								<td colspan="" rowspan="" headers=""><?php echo $mname123; ?></td>
								<td colspan="" rowspan="" headers=""><?php echo $lname123; ?></td>
								<td colspan="" rowspan="" headers=""></td>
								<td colspan="" rowspan="" headers=""></td>




							</tr>
							
						</table>
						<?php 	}
					}  ?>

				</body>
				</html>