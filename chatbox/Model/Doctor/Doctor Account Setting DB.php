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
	if($Article != null){//add article to the article table with corresponding to the Doctor
		$j++;
		mysql_query("INSERT INTO `cc`.`article` (`ArticleID`,`Photo`,`doctorID`) VALUES (NULL,'$Article','$NIC');");
	}
	if($telephoneNumber != null){
		$j++;
		mysql_query("INSERT INTO `cc`.`doc_telephonenumber` (`NIC`, `TelephoneNumber`) VALUES ('$NIC', '$telephoneNumber'); ");
	}
	if($speciality !=null){
		$j++;
		mysql_query("UPDATE Doctor SET speciality='$speciality' WHERE NIC='$NIC';");
		
	}
	if($address != null){
		$j++;
		mysql_query("UPDATE Doctor SET address='$address' WHERE NIC='$NIC';");
	}
	if($workingExperience !=null){
		$j++;
		mysql_query("UPDATE Doctor SET workingExperience='$workingExperience' WHERE NIC='$NIC';");
	}
	if($graduation !=null){
		$j++;
		mysql_query("UPDATE Doctor SET Graduation='$graduation' WHERE NIC='$NIC';");
	}
	if($sex !=null){
		$j++;
		mysql_query("UPDATE Doctor SET sex='$sex' WHERE NIC='$NIC';");
	}
	if($status !=null){
		$j++;
		mysql_query("UPDATE Doctor SET status='$status' WHERE NIC='$NIC';");
	}
	if($DoctorPhoto != null){
		$j++;
		mysql_query ("UPDATE `cc`.`doctor` SET `DoctorPhoto` = '$DoctorPhoto' WHERE `NIC` ='$NIC';");
		//mysql_query("UPDATE Doctor SET DoctorPhoto='$DoctorPhoto' WHERE NIC='$NIC';");
	}
	if($registrationNumber != null){
		$j++;
		mysql_query("UPDATE Doctor SET registrationNumber='$registrationNumber' WHERE NIC='$NIC';");
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