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
	
	mysql_query("INSERT INTO `cc`.`patient` (`FirstName`, `SecondName`, `SurName`, `NIC`, `Sex`, `Address`, `Job`, `Password`, `Status`, `FamilyBackground`, `PatientPhoto`, `Email`,`birthday`) VALUES ('$firstName', '$secondName', '$surName', '$NIC', NULL, NULL, NULL, '$password', NULL, NULL, NULL, '$email','NULL');");
	//HERE  we want to check weather the insert part is happen correctly or not,
	
	echo("record update successfully");
	
	$_SESSION['NIC'] = $NIC;
	$_SESSION['FirstName'] = $FirstName;
	$_SESSION['SecondName'] = $SecondName;
	$_SESSION['PatientPhoto']=null;
	
	
	header('Location: patient home.php');
	

	
?>