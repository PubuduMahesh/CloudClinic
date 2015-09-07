<?php
	session_start(); 
	$firstName  = $_POST["firstName"];
	$secondName = $_POST["secondName"];
	$surName 	= $_POST["surname"];
	$NIC 		= $_POST["NIC"];
	$password	= $_POST["rePassword"];
	$email 		= $_POST["email"]; 
	//create database connection
	include_once('../../Control/ConnectionDB.php');
	
	if($firstName != null && $secondName != null && $surName != null && $NIC != null && $password != null && $email !=null)
	{
		$result = insertPatientRegister($firstName,$secondName,$surName,$NIC,$password,$email);
	}
	function insertPatientRegister($firstName,$secondName,$surName,$NIC,$password,$email)
	{
		mysql_query("INSERT INTO `cc`.`patient` (`FirstName`, `SecondName`, `SurName`, `NIC`, `Sex`, `Address`, `Job`, `Password`, `Status`, `FamilyBackground`, `PatientPhoto`, `Email`,`birthday`) VALUES ('$firstName', '$secondName', '$surName', '$NIC', NULL, NULL, NULL, '$password', NULL, NULL, NULL, '$email','NULL');");
		
		if(mysql_affected_rows()>0)
		{
		sleep(1);
		echo("record update successfully");
			$_SESSION['NIC'] = $NIC;
			$_SESSION['FirstName'] = $firstName;
			$_SESSION['SecondName'] = $secondName;
			$_SESSION['PatientPhoto']=$DoctorPhoto;
			header('Location: Patient home.php');
			return "success";
		}
		else
		{		
			echo("Error in Update");
			sleep(1);
			header('Location: Patient Register.php');
			return "fail";
		}
	}	
	
	header('Location: patient home.php');
?>