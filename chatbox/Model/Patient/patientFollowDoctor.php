<?php
	$doctorNIC = $_GET["key"];
	$patientNIC = $_GET["nextkey"];
	
	//create database connection
	include_once('../../Control/ConnectionDB.php');
	$str="INSERT INTO `patient_follow_doctor` (`doctorNIC`, `patientNIC`) VALUES ('$doctorNIC','$patientNIC');";
	mysql_query($str);

	echo json_encode('You have followed a Doctor');
?>