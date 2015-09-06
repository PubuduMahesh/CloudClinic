
<!DOCTYPE html>
<html>
<head> 
<font size = "8">  <B>Patient SIGN UP<B></font>
<link rel="stylesheet" type="css/txt" href= "../../View/Patient/CSS/PatientRegister.css"/>
</head>
<div class = "mainMenu">
	<a class = "link" href = "Patient Home.php" style="text-decoration:none;"> <font size="4px">Patient Home<font></a><tr>
 </div>

<body background = "../../View/patient/view/images/patient.jpg"/>
<div class="relative">
</div>
<div align = "middle" class = "relative1">
	<form name = "PatientRegistrationForm" action = "patient register DB.php" method = "POST"><!--where 'register.php' must change according to the registration type-->
		<input class ="input" type = "text" name = "firstName" id="Id_firstName" placeholder = "Firstname" /><br><br>
		<input class= "input" type = "text" name = "secondName" id ="Id_secondName" placeholder = "Secnond Name"/><br><br>
		<input class= "input" type = "text" name = "surname" id = "Id_surName" placeholder = "Surname"/><br><br>
		<input class= "input" type = "text" name = "NIC" id = "Id_NIC" placeholder = "NIC" maxlength="10"/><br><br>
		<input class= "input" type = "password" name = "password" id = "Id_password" placeholder = "Password"/><br><br> 
		<input class= "input" type = "password" name = "rePassword" id = "Id_rePassword" placeholder = "Re Enter password" onkeyup="equal(); return false;"/><br><br>
		<input class= "input" type = "text" name = "email" id = "Id_email" placeholder = "Email"/><br><br><!--want to check weather a valid or invalid Email address-->
		<span id="confirmMessage" class="confirmMessage"></span>
		
		<button id="Id_signUp" class="_6j mvm _6wk _6wl _58me _58mi _3ma _6o _6v" type="submit">Sign Up</button>
		
</div>
 <script>
			function equal()
			{	
				//Store the password field objects into variables ...
				var ppw = document.getElementById("Id_password");
				var Reppw = document.getElementById("Id_rePassword");
				//Store the Confimation Message Object ...
				var message = document.getElementById('confirmMessage');
				//Set the colors we will be using ...
				var goodColor = "#66cc66";
				var badColor = "#ff6666";
				//Compare the values in the password field 
				//and the confirmation field
				if(ppw.value == Reppw.value){
					//The passwords match. 
					//Set the color to the good color and inform
					//the user that they have entered the correct password 
					Reppw.style.backgroundColor = goodColor;
					message.style.color = goodColor;
					message.innerHTML = "Passwords Match!"
				}else{
					//The passwords do not match.
					//Set the color to the bad color and
					//notify the user.
					Reppw.style.backgroundColor = badColor;
					message.style.color = badColor;
					message.innerHTML = "Passwords Do Not Match!"
				}
				
	}
		</script>


<?php
?>
</html>

 