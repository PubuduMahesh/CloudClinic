
<!DOCTYPE html>
<html>
<head> 
	<font size="8"><B>Doctor SIGN UP<B></font>
	
</head>

<link type = "txt/css" rel = "stylesheet" href = "button.css"/><body bgcolor = "#ADD8E6">
<link type = "txt/css" rel = "stylesheet" href = "Doctor Account setting.css"/>
<head>
<style>
div.relative {
    position: relative;
    left: 300px;
	top:0px;
    width: 300px;
    
}
	
</style>
</head>
<body background = "images/Doctor.jpg"/>
<div class="relative">
</div>

<div class = "relative1" align = "middle">
	<form name = "DoctorRegistrationForm" action = "register.php" method = "post">
		<input class ="input" type = "text" name = "firstName" id="Id_firstName" placeholder = "Firstname" /><br><br> 
		<input class= "input" type = "text" name = "secondName" id ="Id_secondName" placeholder = "Secnond Name"/><br><br>
		<input class= "input" type = "text" name = "surname" id = "Id_surName" placeholder = "Surname"/><br><br>
		<input class= "input" type = "text" name = "NIC" id = "Id_NIC" placeholder = "NIC"/><br><br>
		<input class= "input" type = "password" name = "password" id = "Id_password" placeholder = "Password"/><br><br> 
		<input class= "input" type = "password" name = "rePassword" id = "Id_rePassword" placeholder = "Confirm Password" onkeyup="equal(); return false;"/><br><br>
		<span id="confirmMessage" class="confirmMessage"></span>
		<input class= "input" type = "text" name = "email" id = "Id_email" placeholder = "Email"/><br><br><!--want to check weather a valid or invalid Email address-->
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

 