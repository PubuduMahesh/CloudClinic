<?php
	session_start(); 
	$firstName  = $_POST["firstName"];
	$secondName = $_POST["secondName"];
	$surName 	= $_POST["surname"];
	$NIC 		= $_POST["NIC"];
	$password	= $_POST["rePassword"];
	$email 		= $_POST["email"]; 
	
	
	//password hashing 
	$hashedPass = cryptPass($password);	
	
	//create database connection
	include_once('../../Control/ConnectionDB.php');
	
	mysql_query("INSERT INTO `Doctor` (`FirstName`, `SecondName`, `SurName`, `NIC`, `Sex`, `Speciality`, `RegistrationNumber`, `Address`, `WorkingExperience`, `Graduation`, `Age`, `Password`, `Email`, `DoctorPhoto`) VALUES ('$firstName', '$secondName', '$surName', '$NIC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$hashedPass', '$email', NULL);");
	//HERE  we want to check weather the insert part is happen correctly or not,
	
	
	if(mysql_affected_rows()>0){
		sleep(1);
		echo("record update successfully");
		$_SESSION['NIC'] = $NIC;
		$_SESSION['FirstName'] = $firstName;
		$_SESSION['SecondName'] = $secondName;
		$_SESSION['DoctorPhoto']=$DoctorPhoto;
		header('Location: Doctor home.php');
	}
	else{		
		echo("Error in Update");
		sleep(1);
		header('Location: Doctor Register.php');
	}
	
//password hashing function_exists
  function cryptPass($input, $rounds = 9){
	
	$salt ="";
	$saltChars = array_merge(range('A','Z'),range('a','z'), range(0,9));
	for($i =0;$i<22;$i++){
		$salt .=$saltChars[array_rand($saltChars)];
	}
	return crypt($input,sprintf('$2y$%02d$',$rounds). $salt);
} 
?>