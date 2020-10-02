<?php 
include'handler/dbcon.php';

$edit_record=$_GET['edit'];
$query="SELECT * FROM student WHERE prn ='$edit_record'";
$run=mysqli_query($con,$query);
while ($row=mysqli_fetch_array($run)) {
	
	$edit_prn=$row['prn'];
	$edit_fname=$row['1'];
	$edit_mname=$row['2'];
	$edit_lname=$row['3'];
	$edit_email=$row['4'];
	$edit_phone=$row['5'];
	$edit_gender=$row['6'];
	$edit_dob=$row['7'];
	$edit_year=$row['8'];
	$edit_state=$row['9'];
	$edit_city=$row['10'];
	$edit_address=$row['11'];
	$edit_pname=$row['12'];
	$edit_pnumber=$row['13'];
	$edit_pocc=$row['14'];
	$edit_paddress=$row['15'];
	$edit_pemail=$row['16'];
	$edit_username=$row['18']; 
	//$edit_username=$row['9'];
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Update form</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<center><h1>Update student  FORM </h1></center>
	
	<form action="edit.php?edit_form=<?php echo $edit_prn; ?>" name="" method="POST" onsubmit="" enctype="multipart/form-data">
		
		FirstName:
		<input type="text" name="fname1" id="fname" placeholder="FirstName" class="" value="

		<?php echo $edit_fname; ?>">
		<br>
		<br>

		
		MiddleName:
		<input type="text" name="mname1" id="mname" placeholder="MiddleName" class="" 
		value="

		<?php echo $edit_mname; ?>">
		
		<br><br>
		
		<div class=" col-auto">
			LastName:
			<input type="text" name="lname1" id="lname" placeholder="LastName" class="" value="
			<?php echo $edit_lname ?>">
			
			

			Gender:<input type="radio" name="gender1" id="gender" value="male"> Male
			<input type="radio" name="gender1" id="gender" value="female"> Female
			<br><br>

			Enter date of birth:
			<input type="date" name="dob1" id="dob" size="10"
			maxlength="10" placeholder="DD-MM-YYYY" value="<?php echo $edit_dob; ?>">
			DD-MM-YYYY
			<?php  ?>

			<br>
			<br>
			Contact No
			<input  type="tel" name="phone1" id="phone" maxlength="10" value="<?php echo $edit_phone; ?>">
			<br><br>



			<label>Email address</label>
			<input type="email" name="email1" id="email"  placeholder="Enter email"
			value="<?php echo $edit_email; ?>">
			<span style="color: red;">
				<?php 
				if (isset($e_error)) {
					echo $e_error;

				}



				?>
			</span>

			
			<br><br>

			<br>
			<br>
			
			<br>



			PRN:<input type="text" name="prn1" id="prn" class="form-control-md" placeholder="PRN"  maxlength="14" value="<?php echo $edit_prn; ?>" ><br><br>
			<span style="color: red;">
				<?php 

				if (isset($pr_error)) {
					echo $pr_error;

				}?>
			</span>
			<br>





			<label>Indian State List</label>

			<select name="state1" value="<?php echo $edit_state; ?>">
				<option value="">------------Select State------------</option>
				<option value="Andaman and Nicobar Islands" name="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
				<option value="Andhra Pradesh">Andhra Pradesh</option>
				<option value="Arunachal Pradesh">Arunachal Pradesh</option>
				<option value="Assam">Assam</option>
				<option value="Bihar">Bihar</option>
				<option value="Chandigarh">Chandigarh</option>
				<option value="Chhattisgarh">Chhattisgarh</option>
				<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
				<option value="Daman and Diu">Daman and Diu</option>
				<option value="Delhi">Delhi</option>
				<option value="Goa">Goa</option>
				<option value="Gujarat">Gujarat</option>
				<option value="Haryana">Haryana</option>
				<option value="Himachal Pradesh">Himachal Pradesh</option>
				<option value="Jammu and Kashmir">Jammu and Kashmir</option>
				<option value="Jharkhand">Jharkhand</option>
				<option value="Karnataka">Karnataka</option>
				<option value="Kerala">Kerala</option>
				<option value="Lakshadweep">Lakshadweep</option>
				<option value="Madhya Pradesh">Madhya Pradesh</option>
				<option value="Maharashtra">Maharashtra</option>
				<option value="Manipur">Manipur</option>
				<option value="Meghalaya">Meghalaya</option>
				<option value="Mizoram">Mizoram</option>
				<option value="Nagaland">Nagaland</option>
				<option value="Orissa">Orissa</option>
				<option value="Pondicherry">Pondicherry</option>
				<option value="Punjab">Punjab</option>
				<option value="Rajasthan">Rajasthan</option>
				<option value="Sikkim">Sikkim</option>
				<option value="Tamil Nadu">Tamil Nadu</option>
				<option value="Tripura">Tripura</option>
				<option value="Uttaranchal">Uttaranchal</option>
				<option value="Uttar Pradesh">Uttar Pradesh</option>
				<option value="West Bengal">West Bengal</option>
			</select><br>



			<font color="#FF0000" size="+0"><sup>*</sup></font>Your City <span style="padding-left:105px"/>:</label><select name="city1" value="<?php echo $edit_city; ?>" style="width:230" >
				<option selected="selected">-Select-</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#000000"><i>-Top Metropolitan Cities-</i></font></option>
				<option name="Ahmedabad" value="Ahmedabad">Ahmedabad</option> 
				<option>Bengaluru/Bangalore</option>
				<option>Chandigarh</option>
				<option>Chennai</option>
				<option>Delhi</option>
				<option>Gurgaon</option>
				<option>Hyderabad/Secunderabad</option>
				<option>Kolkatta</option>
				<option>Mumbai</option>
				<option>Noida</option>
				<option>Pune</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Andhra Pradesh-</i></font></option>
				<option>Anantapur</option>
				<option>Guntakal</option>
				<option>Guntur</option>
				<option>Hyderabad/Secunderabad</option>
				<option>kakinada</option>
				<option>kurnool</option>
				<option>Nellore</option>
				<option>Nizamabad</option>
				<option>Rajahmundry</option>
				<option>Tirupati</option>
				<option>Vijayawada</option>
				<option>Visakhapatnam</option>
				<option>Warangal</option>
				<option>Andra Pradesh-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Arunachal Pradesh-</i></font></option>
				<option>Itanagar</option>
				<option>Arunachal Pradesh-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Assam-</i></font></option>
				<option>Guwahati</option>
				<option>Silchar</option>
				<option>Assam-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Bihar-</i></font></option>
				<option>Bhagalpur</option>
				<option>Patna</option>
				<option>Bihar-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Chhattisgarh-</i></font></option>
				<option>Bhillai</option>
				<option>Bilaspur</option>
				<option>Raipur</option>
				<option>Chhattisgarh-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Goa-</i></font></option>
				<option>Panjim/Panaji</option>
				<option>Vasco Da Gama</option>
				<option>Goa-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Gujarat-</i></font></option>
				<option>Ahmedabad</option>
				<option>Anand</option>
				<option>Ankleshwar</option>
				<option>Bharuch</option>
				<option>Bhavnagar</option>
				<option>Bhuj</option>
				<option>Gandhinagar</option>
				<option>Gir</option>
				<option>Jamnagar</option>
				<option>Kandla</option>
				<option>Porbandar</option>
				<option>Rajkot</option>
				<option>Surat</option>
				<option>Vadodara/Baroda</option>
				<option>Valsad</option>
				<option>Vapi</option>
				<option>Gujarat-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Haryana-</i></font></option>
				<option>Ambala</option>
				<option>Chandigarh</option>
				<option>Faridabad</option>
				<option>Gurgaon</option>
				<option>Hisar</option>
				<option>Karnal</option>
				<option>Kurukshetra</option>
				<option>Panipat</option>
				<option>Rohtak</option>
				<option>Haryana-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Himachal Pradesh-</i></font></option>
				<option>Dalhousie</option>
				<option>Dharmasala</option>
				<option>Kulu/Manali</option>
				<option>Shimla</option>
				<option>Himachal Pradesh-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Jammu and Kashmir-</i></font></option>
				<option>Jammu</option>
				<option>Srinagar</option>
				<option>Jammu and Kashmir-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Jharkhand-</i></font></option>
				<option>Bokaro</option>
				<option>Dhanbad</option>
				<option>Jamshedpur</option>
				<option>Ranchi</option>
				<option>Jharkhand-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Karnataka-</i></font></option>
				<option>Bengaluru/Bangalore</option>
				<option>Belgaum</option>
				<option>Bellary</option>
				<option>Bidar</option>
				<option>Dharwad</option>
				<option>Gulbarga</option>
				<option>Hubli</option>
				<option>Kolar</option>
				<option>Mangalore</option>
				<option>Mysoru/Mysore</option>
				<option>Karnataka-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Kerala-</i></font></option>
				<option>Calicut</option>
				<option>Cochin</option>
				<option>Ernakulam</option>
				<option>Kannur</option>
				<option>Kochi</option>
				<option>Kollam</option>
				<option>Kottayam</option>
				<option>Kozhikode</option>
				<option>Palakkad</option>
				<option>Palghat</option>
				<option>Thrissur</option>
				<option>Trivandrum</option>
				<option>Kerela-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Madhya Pradesh-</i></font></option>
				<option>Bhopal</option>
				<option>Gwalior</option>
				<option>Indore</option>
				<option>Jabalpur</option>
				<option>Ujjain</option>
				<option>Madhya Pradesh-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Maharashtra-</i></font></option>
				<option>Ahmednagar</option>
				<option>Aurangabad</option>
				<option>Jalgaon</option>
				<option>Kolhapur</option>
				<option>Mumbai</option>
				<option>Mumbai Suburbs</option>
				<option>Nagpur</option>
				<option>Nasik</option>
				<option>Navi Mumbai</option>
				<option>Pune</option>
				<option>Solapur</option>
				<option>Maharashtra-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Manipur-</i></font></option>
				<option>Imphal</option>
				<option>Manipur-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Meghalaya-</i></font></option>
				<option>Shillong</option>
				<option>Meghalaya-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Mizoram-</i></font></option>
				<option>Aizawal</option>
				<option>Mizoram-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Nagaland-</i></font></option>
				<option>Dimapur</option>
				<option>Nagaland-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Orissa-</i></font></option>
				<option>Bhubaneshwar</option>
				<option>Cuttak</option>
				<option>Paradeep</option>
				<option>Puri</option>
				<option>Rourkela</option>
				<option>Orissa-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Punjab-</i></font></option>
				<option>Amritsar</option>
				<option>Bathinda</option>
				<option>Chandigarh</option>
				<option>Jalandhar</option>
				<option>Ludhiana</option>
				<option>Mohali</option>
				<option>Pathankot</option>
				<option>Patiala</option>
				<option>Punjab-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Rajasthan-</i></font></option>
				<option>Ajmer</option>
				<option>Jaipur</option>
				<option>Jaisalmer</option>
				<option>Jodhpur</option>
				<option>Kota</option>
				<option>Udaipur</option>
				<option>Rajasthan-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Sikkim-</i></font></option>
				<option>Gangtok</option>
				<option>Sikkim-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Tamil Nadu-</i></font></option>
				<option>Chennai</option>
				<option>Coimbatore</option>
				<option>Cuddalore</option>
				<option>Erode</option>
				<option>Hosur</option>
				<option>Madurai</option>
				<option>Nagerkoil</option>
				<option>Ooty</option>
				<option>Salem</option>
				<option>Thanjavur</option>
				<option>Tirunalveli</option>
				<option>Trichy</option>
				<option>Tuticorin</option>
				<option>Vellore</option>
				<option>Tamil Nadu-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Tripura-</i></font></option>
				<option>Agartala</option>
				<option>Tripura-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Union Territories-</i></font></option>
				<option>Chandigarh</option>
				<option>Dadra & Nagar Haveli-Silvassa</option>
				<option>Daman & Diu</option>
				<option>Delhi</option>
				<option>Pondichery</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Uttar Pradesh-</i></font></option>
				<option>Agra</option>
				<option>Aligarh</option>
				<option>Allahabad</option>
				<option>Bareilly</option>
				<option>Faizabad</option>
				<option>Ghaziabad</option>
				<option>Gorakhpur</option>
				<option>Kanpur</option>
				<option>Lucknow</option>
				<option>Mathura</option>
				<option>Meerut</option>
				<option>Moradabad</option>
				<option>Noida</option>
				<option>Varanasi/Banaras</option>
				<option>Uttar Pradesh-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Uttaranchal-</i></font></option>
				<option>Dehradun</option>
				<option>Roorkee</option>
				<option>Uttaranchal-Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-West Bengal-</i></font></option>
				<option>Asansol</option>
				<option>Durgapur</option>
				<option>Haldia</option>
				<option>Kharagpur</option>
				<option>Kolkatta</option>
				<option>Siliguri</option>
				<option>West Bengal - Other</option>
				<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Other-</i></font></option>
				<option>Other</option>
			</select>


			<br>
			<br>

			<label >Address:</label>
			<textarea name="add1" id="add" value="<?php echo $edit_address; ?>"></textarea>
			<br>
			<br>

			Year:<select name="year1" value="<?php echo $edit_year; ?>" >
				<option value="sy" name="sy" selected="">SY</option>
				<option value="ty" name="ty">TY</option>

			</select>
			<br><br>


			<label>family information</label><br>

			Father Name:<input type="text" name="pname1" placeholder="Father Name" value="<?php echo $edit_pname; ?>" >
			<br>

			Father occupation:<input type="text" name="pocc1" placeholder="Father occupation" value="<?php echo $edit_pocc; ?>"><br>
			father Phone number:<input type="tel" name="pno1" placeholder="father Phone number" value="<?php echo $edit_pnumber; ?>" ><br>

			Father Email:<input type="email" name="pemail1" placeholder="Father E-mail" value="<?php echo $edit_pemail; ?>"><br>

			<br><br>




			Password:<input type="password" name="password1" id="pwd" placeholder="Password" >
			<br><br>

			confirm Password:<input type="password" name="password21" id="pwd2" placeholder="confirm Password" >
			<br><br>
			<span style="color: red;">
				<?php 
				if (isset($p_error)) {
					echo $p_error;
				}

				?>

			</span>

			<?php ?>

			<input type="submit" name="update" value="update">&nbsp;&nbsp;
			<input name="reset" type="reset" id="reset" value="Reset">&nbsp;&nbsp;
			<input name="close" type="button" id="close" value="Close">&nbsp;&nbsp;
			<!-- <input name="login" type="button" id="login" value="Login">&nbsp;&nbsp; -->
			

			<br>
			<br>


			<?php $cmsg = "<span style='color:#08FA24;'>go ahead and login</span> <br>";
			?>







		</form>
		
	</body>
	</html>
	<?php 
	
	if (isset($_POST['update'])) {
		$edit_record1=$_GET['edit_form'];
		$s_prn=$_POST['prn1'];
		$s_name=$_POST['fname1'];
		$s_mname=$_POST['mname1'];
		$s_lname=$_POST['lname1'];
		$s_email=$_POST['email1'];
		$s_phone=$_POST['phone1'];
		$s_gender=$_POST['gender1'];
		$s_year=$_POST['year1'];
		$s_state=$_POST['state1'];
		$s_city=$_POST['city1'];
		$s_add=$_POST['add1'];
		$s_pname=$_POST['pname1'];
		$s_pno=$_POST['pno1'];
		$s_pocc=$_POST['pocc1'];
		$s_padd=$_POST['padd1'];
		$s_pemail=$_POST['pemail1'];
		$s_password=$_POST['password1'];
		$s_dob=$_POST['dob1'];
		
		
		
		
		

		$query1="UPDATE student SET prn='$s_prn',fname='$s_name',mname='$s_mname',lname='$s_lname',email='$s_email',phone='$s_phone',gender='$s_gender',year='$s_year',state='$s_state',city='$s_city',address='$s_add',pname='$s_pname',pnumber='$s_pno',poccupation='$s_pocc',paddress='$s_padd',pemail='$s_pemail',password='$s_password',Date='$s_dob' WHERE prn='$edit_record' ";
		if (mysqli_query($con,$query1)) {
			echo"<script> window.open('view.php?updated=record has been updated','_self')</script>";
		}
		
	}





	?>