

<?php
include'../handler/dbcon.php';


 //if ($_POST['run']) {
// 	 	# code...
//$q=mysqli_query($con,"SELECT prn FROM student WHERE prn='$prn'");
	 $prn=$_SESSION['prn'];

	$input=$_POST['input'];
	$output=$_POST['output'];
	$body=$_POST['code'];
	
	//$query=mysqli_query($con,"INSERT INTO cpp VALUES ('','$body','$input',$output)");
// }


	$languageID=$_POST["language"];
        error_reporting(0);


	if($_FILES["file"]["name"]!="")
	{
		include "compilers/make.php";
	}
	else
	{
		switch($languageID)
			{
				case "c":
				{
					include("compilers/c.php");
					break;
				}
				case "cpp":
				{
					include("compilers/cpp.php");
					break;
				}

				case "cpp11":
				{
					include("compilers/cpp11.php");
					break;
				}
				case "java":
				{	
					include("compilers/java.php");
					break;
				}
				case "python2.7":
				{
					include("compilers/python27.php");
					break;
				}
				case "python3.2":
				{
					include("compilers/python32.php");
					break;
				}
				case "html/css":
				{
					include("compilers/tryit.php");
					break;
				}
			}
			//$query=mysqli_query($con,"INSERT INTO cpp VALUES ('','$body','$input','$output')");

	}
	
		if (!empty($output)) {
			# code...s
		
	$query=mysqli_query($con,"INSERT INTO cpp VALUES ('','$body','$input','$output','$prn')");
}

	
	 

?>
