<?php 
// include'handler/dbcon.php';
// $id=$_GET['id'];

// $q=mysqli_query($con,"SELECT * FROM documents");
// while ($row=mysqli_fetch_array($q)) {
// 	$name=$row['name'];
// 	$type=$row['type'];
// 	echo '<img height="300" width="300" src="/images/,'.$row['name'].'">';
// }

 ?>



 <?php
mysql_connect("localhost","root","");
mysql_select_db("onlinesubmission");
if(isset($_GET['id'])) {
// if id is set then get the file with the id from database
$id = $_GET['id'];
$query = "SELECT name, type, size, content " . "FROM documents WHERE id = '$id'";
$result = mysql_query($query) or die('Error, query failed');
list($name, $type, $size, $content) = mysql_fetch_array($result);
header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
echo $content;
exit;
}
?>
