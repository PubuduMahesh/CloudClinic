<?php
	session_start();						//start the session to hold the NIC value which is passed from the patient account setting.php page. 
	$NIC  			 = $_SESSION['NIC'];
	//get the posted variable value in to the php variable. 
	$telephoneNumber = $_POST['TP'];
	$jobhistory 	 = $_POST['job'];
	$address		 = $_POST['address'];
	$familyBackground= $_POST['familyBackground'];
	$status 		 = $_POST['status'];
	$sex			 = $_POST['sex'];
	$birthday_year 	 = $_POST['birthday_year'];
	$birthday_month	 = $_POST['birthday_month'];
	$birthday_day 	 = $_POST['birthday_day'];
	$birthday 		 = $birthday_year + $birthday_month + $birthday_month;
	//$report 		 = $_FILES['fileToUpload'];
	//create the database connection.
	include_once('../../Control/ConnectionDB.php');
	if(isset($_POST['sumit']))
	{
		if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
				{
					echo "please selct an image.";
				}
				else
				{
					$image = addslashes($_FILES['image']['tmp_name']);
					$name = addslashes($_FILES['image']['name']);
					$image = file_get_contents($image);
					$image = base64_encode($image);
					saveimage($name,$image);
					
				}
	}
	
	function saveimage($name,$image)
	{
		mysql_query("insert into patient (PatientPhoto) values ('$image');");
	}
	//update appropriate database table
	
	$j=0;
	if($telephoneNumber != null){	//update telephone_number table if it is not empty
		$j = insertTelephoneNumber($j,$telephoneNumber,$NIC);
		
	}
	if($address != null){	//update patient table if address is not null in the textbox
		$j = insertAddress($j,$address,$NIC);
		
	}
	if($sex != null)
	{
		$j= insertSex($j,$sex,$NIC);
	}
	if($status != null)
	{
		$j = insertStatus($j,$status,$NIC);
	}
	if($jobhistory != null)
	{
		$j = insertJobHistory($j,$jobhistory,$NIC);
	}
	if($birthday)
	{
		$j = insertBirthday($j,$birthday,$NIC);
	}
	if($familyBackground != null)
	{
		$j = insertFamilyBackGround($j,$familyBackground,$NIC);
	}
	/* if($report != null)
	{
		$j = insertReport($j,$report,$NIC);
	} */
	function insertTelephoneNumber($j,$telephoneNumber,$NIC){	//update telephone_number table if it is not empty
		$j++;
		mysql_query("INSERT INTO `cc`.`patient_telephonenumber` (`PatientID`, `TelephoneNumber`) VALUES ('$NIC', '$telephoneNumber'); ");
		return $j;
	}
	
	function insertAddress($j, $address,$NIC){			//update patient table if address is not null in the textbox
		$j++;
		mysql_query("UPDATE patient SET address='$address' WHERE NIC='$NIC';");
		return $j;
	}
	function insertSex($j,$sex,$NIC){				//update sexuality of a patient 
		$j++;
		mysql_query("UPDATE Patient SET Sex='$sex' WHERE NIC='$NIC';");
		return $j;
	}
	function insertStatus($j,$status,$NIC){				//update status of a patient
		$j++;
		mysql_query("UPDATE Patient SET status='$status' WHERE NIC='$NIC';");
		return $j;
	}
	function insertJobHistory($j,$jobhistory,$NIC){
		$j++;
		mysql_query("UPDATE `cc`.`Patient` SET `job` = '$jobhistory' WHERE `NIC` = '$NIC';");
		return $j;
	}
	function insertBirthday($j,$birthday,$NIC){
		$j++;
		mysql_query("UPDATE `cc`.`Patient` SET `Birthday` = '$birthday' WHERE `NIC` = '$NIC';");
		return $j;
	}
	function insertFamilyBackGround($j,$familyBackground,$NIC){
		$j++;
		mysql_query("UPDATE `cc`.`Patient` SET `FamilyBackground` = '$familyBackground`' WHERE `NIC` = '$NIC';");
		return $j;
	}
	function insertReport($j,$report,$NIC)
	{
		$j++;
		mysql_query("INSERT INTO `cc`.`reports` (`ReportID`, `DiseaseID`,`Dates`,`Photo`,`patientNIC`) VALUES (null,null,null,'$report','$NIC');");
		return $j;
	}
	if(mysql_affected_rows() == $j){ 	//check whether update is successful or not,
		/* echo("Update Successfully");
		sleep(5); */
		header('Location: Patient home.php');//if successful, will direct in to the patient home page,
		
	}
	else{
		/* echo("Error Update");
		sleep(5); */
		header('Patient home.php');//if not successful, will direct to again in to the patient account setting.php page.
		
	}
?>