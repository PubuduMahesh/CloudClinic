<?php
session_start();
 $_SESSION['NIC'] = $_POST['NIC'];
 $NIC = $_SESSION['NIC'];
 $password = $_POST['password'];
 $FirstName;
 $SecondName;
 $DoctorPhoto;
 //create database connection
 include_once('../../Control/ConnectionDB.php');
 
 
 
 $result = mysql_query("SELECT * FROM doctor WHERE `NIC` ='$NIC';");

 if(mysql_num_rows($result)) { 
	$res= mysql_fetch_array($result);
	
	$hashedPass = $res['Password'];
	?>
	<html>
	<br> 
	</html>
	<?php
	
	//substring the password
	$decryptedPassword = crypt($password,$hashedPass);
	$passwordLength = strlen($decryptedPassword);
	$substrPassword = substr($decryptedPassword,0,($passwordLength-20));
	//echo ($substrPassword);
	if(	$substrPassword == $hashedPass){		//check the entered password is suitable for the stored encrypted one
		$_SESSION['NIC'] = $res['NIC'];			//get the 'NIC' value in to a session variable
		$_SESSION['FirstName'] = $res['FirstName'];//get 'firstname' in to another session variable
		$_SESSION['SecondName'] = $res['SecondName'];
		$_SESSION['DoctorPhoto'] = $res['DoctorPhoto'];//get DoctorPhoto in to another session variable
		echo"<center>";
		header('Location: doctor home.php');
		echo"</center>";
	}
	else{
		session_destroy();				//if not equal the entered password, destroy the started session.
		echo"<center>";
		echo"Incorrect information";
		header('Location: doctor home.php');
		echo"</center>";
	}
}
else{					//if not equal the enterd usename(NIC)
		session_destroy();
		echo"<center>";
		echo"Incorrect information";
		echo "<a href='Doctor home.php'>here</a> re enter";?><br> <?php
		echo "you may register a new account by clicking <a href='Doctor register.php'>here</a>";
		echo"</center>";
	}
function cryptPass($input, $rounds = 9){
	
	$salt ="";
	$saltChars = array_merge(range('A','Z'),range(0,9));
	for($i =0;$i<22;$i++){
		$salt .=$saltChars[array_rand($saltChars)];
	}
	return crypt($input,sprintf('$2y$%02d$',$rounds). $salt);
} 
?>