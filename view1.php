<?php 
include'handler/dbcon.php';
if (!$_SESSION['username']) {
	header('location: admin_login.php?error=you not an administrator');
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
							<li ><a  href="teacher_home.php">HOME</a></li>  
							<li class="active"><a  href="view1.php">STUDENT RECORD</a></li>
							<li><a  href="htmlcode.php">HTML CODE</a></li>
							<li><a  href="upload1.php">UPLOAD&DOWNLOAD</a></li>
							<!-- <li><a  href="download.php?id=$id">download</a></li> -->
							<!-- <li><a  href="viewcode.php">Cpp code</a></li> -->
							<li><a  href="logout.php">LOGOUT</a></li>
						</ul>
					</div>  <!--end of menu-->
				</nav>

			</div>
			
		</div> <!-- end of row-->
	</div> <!--end of containter-->
	<center><label>Welcome:</label>
		<font color="blue" size="3"><?php echo $_SESSION['username'];?></font></center>

		<center><font color="red" size="6"><?php echo @$_GET['deleted'];?>
			<?php echo @$_GET['updated'];?>
		</font></center>

		<table align="center" width="1000" border="4">  
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
				<td colspan="" rowspan="" headers="">viewcode</td>


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
					<td> <a href="viewstd.php?code=<?php echo $prn;?>"> viewcode</a></td>

				</tr>
				<?php } ?>







			</table>
			<br><br><br>
			<form action="" method="get" accept-charset="utf-8">
				
				Search a Record<input type="text" name="search">
				<input type="submit" name="submit">
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
					<table width="800" >
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