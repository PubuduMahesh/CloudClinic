<?php
	session_start();
	$NIC 					= $_SESSION['NIC'];
	$telephoneNumber 		= $_POST['TP1'];
	$speciality 	 		= $_POST['speciality'];
	$address		 		= $_POST['address'];
	$registrationNumber		= $_POST['registrationNumber'];
	$graduation 		 	= $_POST['graduation'];
	$sex			 		= $_POST['sex'];
	$status 		 		= $_POST['status'];
	$workingExperience  	= $_POST['workingExperience'];
	$DoctorPhoto 			= $_POST['image'];
	$Article 				= $_POST['article'];
	include_once('../../Control/ConnectionDB.php');
	$j=0;
	
	if($Article != null){	//update telephone_number table if it is not empty
		$j = insertArticle($j,$Article,$NIC);
		
	}
	if($telephoneNumber != null){	//update telephone_number table if it is not empty
		$j = insertTelephoneNumber($j,$telephoneNumber,$NIC);
		
	}
	if($speciality != null){	//update telephone_number table if it is not empty
		$j = insertSpeciality($j,$speciality,$NIC);
		
	}
	if($address != null){	//update telephone_number table if it is not empty
		$j = insertAddress($j,$address,$NIC);
		
	}
	if($workingExperience != null){	//update telephone_number table if it is not empty
		$j = insertWorkingSpeciality($j,$workingExperience,$NIC);
		
	}
	if($graduation != null){	//update telephone_number table if it is not empty
		$j = insertGraduation($j,$graduation,$NIC);
		
	}
	if($sex != null){	//update telephone_number table if it is not empty
		$j = insertSex($j,$sex,$NIC);
		
	}
	if($status != null){	//update telephone_number table if it is not empty
		$j = insertStatus($j,$status,$NIC);
		
	}
	if($DoctorPhoto != null){	//update telephone_number table if it is not empty
		$j = insertDoctorPhoto($j,$DoctorPhoto,$NIC);
		
	}
	if($registrationNumber != null){	//update telephone_number table if it is not empty
		$j = insertRegistrationNumber($j,$registrationNumber,$NIC);
		
	}
	
	function insertArticle($j,$Article,$NIC)
	{
		$j++;
		mysql_query("INSERT INTO `cc`.`article` (`ArticleID`,`Photo`,`doctorID`) VALUES (NULL,'$Article','$NIC');");
		return $j;
	}
	function insertTelephoneNumber($j,$telephoneNumber,$NIC)
	{
		$j++;
		mysql_query("INSERT INTO `cc`.`doc_telephonenumber` (`NIC`, `TelephoneNumber`) VALUES ('$NIC', '$telephoneNumber'); ");
		return $j;
	}
	function insertSpeciality($j,$speciality,$NIC)
	{
		$j++;
		mysql_query("UPDATE Doctor SET speciality='$speciality' WHERE NIC='$NIC';");
		return $j;
	}
	function insertAddress($j,$address,$NIC)
	{
		$j++;
		mysql_query("UPDATE Doctor SET address='$address' WHERE NIC='$NIC';");
		return $j;
	}
	function insertWorkingSpeciality($j,$workingExperience,$NIC)
	{
		$j++;
		mysql_query("UPDATE Doctor SET workingExperience='$workingExperience' WHERE NIC='$NIC';");
		return $j;
	}
	function insertGraduation($j,$graduation,$NIC)
	{
		$j++;
		mysql_query("UPDATE Doctor SET Graduation='$graduation' WHERE NIC='$NIC';");
		return $j;
	}
	function insertSex($j,$sex,$NIC)
	{
		$j++;
		mysql_query("UPDATE Doctor SET sex='$sex' WHERE NIC='$NIC';");
		return $j;
	}
	function insertStatus($j,$status,$NIC)
	{
		$j++;
		mysql_query("UPDATE Doctor SET status='$status' WHERE NIC='$NIC';");
		return $j;
	}
	function insertDoctorPhoto($j,$DoctorPhoto,$NIC)
	{
		$j++;
		mysql_query ("UPDATE `cc`.`doctor` SET `DoctorPhoto` = '$DoctorPhoto' WHERE `NIC` ='$NIC';");
		return $j;
	}
	function insertRegistrationNumber($j,$registrationNumber,$NIC)
	{
		$j++;
		mysql_query("UPDATE Doctor SET registrationNumber='$registrationNumber' WHERE NIC='$NIC';");
		return $j;
	}
	
	if(mysql_affected_rows() == $j){ 
		echo("Update Successfully");
		sleep(5);
		header('Location: Doctor home.php');
	}
	else{
		echo("Error Update");
		sleep(5);
		header('Location:Doctor Account Setting.php');
	}
	
?>