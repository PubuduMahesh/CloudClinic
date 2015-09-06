<?php
?>
<!DOCTYPE html>
<html>
<link type = "txt/css" rel = "stylesheet" href = "button.css"/><body bgcolor = "#ADD8E6">
<body background = "images/Doctor.jpg"/>
<head> 
<style>
div.relative {
    position: relative;
	top:20px;
}	
</style>

<font size = "8"> <B>Doctor Account<B></font>
<div class= "relative">
<img src= "images/Profile Picture.jpg" alt = "Mountain View" style = "width:200px;height:200px" align = "left"  />
</div>
</head>
<link rel="stylesheet" tye="text/css" href="Doctor Account setting.css"/>
<div align = "middle">
	<form name = "Doctor Account" action = "register.php" method = "post"><!--where 'register.php' must change according to the -->
	<span class= "label"><br></span> <input class= "input" type = "text" name = "email2" id = "Id_email2" placeholder = "Email"/><br><br><!--want to check weather a valid or invalid Email address-->
	<input class= "input" type = "text" name = "registrationNumber" id = "Id_registrationNumber" placeholder = "Registration Number"/><br><br>
	<input class= "input" type = "text" name = "speciality" id = "Id_speciality" placeholder = "Speciality"/><br><br>
	<textarea style = "height:70px;" class = "input" type = "text" name = "address" id = "Id_address" placeholder = "Address"></textarea> <br><br>
	<textarea style = "height:70px;" class = "input" type = "text" name = "workingExperience" id = "Id_workingExperience" placeholder = "Working Experience"></textarea> <br><br>
	<input class= "input" type = "text" name = "graduation" id = "Id_graduation" placeholder = "Graduation"/><br><br>
	<input class= "input" type = "text" name = "TP1" id = "Id_TP1" placeholder = "Telephone Number"/><br><br><!--want to check weather a valid or invalid Email address-->
	<input type="radio" name="status" value="single" checked ><font size= "6">Single</font> <input type="radio" name="status" value="married"><font size= "6">Married</font><br><br>
	<input type="radio" name="sex" value="male" checked ><font size= "6">Male</font> <input type="radio" name="sex" value="female"><font size= "6">Female</font><br><br>
	<label><font size = "5">Select Photo: </font></label><input type="file" name="image" size = "7"/><br><br>
	<button id="Id_submit" class="_6j mvm _6wk _6wl _58me _58mi _3ma _6o _6v" type="submit">Submit</button>
		
</div>
</body>
</html>

 