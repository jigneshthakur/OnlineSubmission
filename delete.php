<?php 
include'handler/dbcon.php';

$delete_record=$_GET['del'];

$query="DELETE FROM student WHERE prn='$delete_record'";

if (mysqli_query($con,$query)) {
	echo "<script>window.open('view.php?deleted=record has been deleted successfully!','_self')</script>";
}





 ?>