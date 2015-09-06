<?php
session_start();
$_SESSION['DoctorPhoto'];
$_SESSION['FirstName'];
?>
<!DOCTYPE html>
<html>

<body background = "../../View/Doctor/view/images/Doctor.jpg"/>
<head> 
<link rel="stylesheet" type="text/css" href="../../View/Doctor/CSS/DoctorAccountSetting.css"> </link>


<tr><tr><tr><font size = "8" color= "purple" align = "middle" class="header" > <tr><tr><B> Doctor Account<B> </font><br><font size=6 color = "purple">
<div class= "relative" id="thumbwrap">
<?php
	$photo = $_SESSION['DoctorPhoto'];
	if($photo == null){
		?>
			<img class = "thumb" src= "../../View/Doctor/view/images/Profile Picture.jpg" alt = "Mountain View" style = "width:200px;height:200px" align = "left"  />
		<?php
	}
	else{
			$photo = $_SESSION['DoctorPhoto'];
			
			echo '<img align="left" src="data:image/jpeg;base64,'.base64_encode( $photo ).'"/>'; 
		}
		
		
		
?>
 </div>
 <!-- direct button to home, account setting pages-->

<div align="right" class="menu">
	<font color= "black" size="4px"> <?php echo $_SESSION['FirstName'];?> <?php echo $_SESSION['SecondName'];?> <font color = "lightblue"> ... </font></font>
	<a class = "link" href = "Doctor Account Setting.php" style="text-decoration:none;"><font size="4px">Setting<font color = "lightblue"> ... </font> </font></a>
	<a class = "link" href = "Doctor Home.php" style="text-decoration:none;"> <font size="4px">Home <font color = "lightblue"> ... </font> <font></a><tr>
	<a class = "link" href = "Doctor Logout.php" style="text-decoration:none;"> <font size="4px"> Logout <font color = "lightblue"> ... </font> <font></a>
 </div>
</head>
<link rel="stylesheet" tye="text/css" href="Doctor Account setting.css"/>
<div class = "relative3">
	<label><font size = "5">Select Photo: </font></label><input class= "choose" type="file" name="image" size = "7"/><br>
</div>
<div class = "relative2">
	<form name = "Doctor Account" action = "Doctor Account Setting DB.php" method = "post"><!--where 'register.php' must change according to the -->
	<input class= "input" style="border:6px inset #07F7CD;" type = "text" name = "registrationNumber" id = "Id_registrationNumber" placeholder = "Registration Number"/><br><br>
	<input class= "input" style="border:6px inset #07F7CD;" type = "text" name = "speciality" id = "Id_speciality" placeholder = "Speciality"/><br><br>
	<textarea style = "height:70px;border:6px inset #07F7CD; width:450px;" class = "input" type = "text" name = "address" id = "Id_address" placeholder = "Address" ></textarea> <br><br>
	<textarea style = "height:70px;border:6px inset#07F7CD; width:450px;" class = "input" type = "text" name = "workingExperience" id = "Id_workingExperience" placeholder = "Working Experience"></textarea> <br>
	<input class= "input" style="border:6px inset #07F7CD;" type = "text" name = "graduation" id = "Id_graduation" placeholder = "Graduation"/><br><br>
	<input class= "input" style="border:6px inset #07F7CD;" type = "number" name = "TP1" id = "Id_TP" placeholder = "Telephone Number" onkeypress="return lengthValidate(event)"/><br><br><!--want to check weather a valid or invalid Email address-->
	<input type="radio" name="status" value="single" checked ><font size= "3">Single</font> <input type="radio" name="status" value="married"><font size= "3">Married</font><br>
	<input type="radio" name="sex" value="male" checked ><font size= "3">Male</font> <input type="radio" name="sex" value="female"><font size= "3">Female</font>
</div>

<div class = "relative4">
		<button id="Id_submit" class="btn" type="submit" >Submit </button>
</div>
</body>
<!--java scripting-->
<script>
function directhome() {
    header('Location:Doctor home.php');
}

function directsetting(){
	header('Location:Doctor Account Setting.php');	
}
//validate telephone number maximum length is to 10
	function lengthValidate(event)
	{
		if(10>document.getElementById("Id_TP").value.length)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>

</html>


 