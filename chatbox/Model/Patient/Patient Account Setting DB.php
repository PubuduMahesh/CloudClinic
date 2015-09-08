<?php
	session_start();						//start the session to hold the NIC value which is passed from the patient account setting.php page. 
	$NIC  			 = $_SESSION['NIC'];
	//get the posted variable value in to the php variable. 	
	if (!isset($_POST['TP'])) 
	{
		$telephoneNumber = '';
	} 
	else 
	{
		$telephoneNumber = $_POST['TP'];
	}
	
	if (!isset($_POST['job'])) 
	{
		$jobhistory = '';
	} 
	else 
	{
		$jobhistory 	 = $_POST['job'];
	}
	
	if (!isset($_POST['address'])) 
	{
		$address = '';
	} 
	else 
	{
		$address = $_POST['address'];
	}
	if (!isset($_POST['familyBackground'])) 
	{
		$familyBackground = '';
	} 
	else 
	{
		$familyBackground= $_POST['familyBackground'];
	}
	if (!isset($_POST['status'])) 
	{
		$status = '';
	} 
	else 
	{
		$status = $_POST['status'];
	}
	if (!isset($_POST['sex'])) 
	{
		$sex = '';
	} 
	else 
	{
		$sex = $_POST['sex'];
	}
	if (!isset($_POST['birthday_month'])) 
	{
		$birthday_month = '';
	} 
	else 
	{
		$birthday_month	 = $_POST['birthday_month'];;
	}
	if (!isset($_POST['birthday_day'])) 
	{
		$birthday_day = '';
	} 
	else 
	{
		$birthday_day 	 = $_POST['birthday_day'];
	}
	if($birthday_day != null && $birthday_month != null)
	{
		$birthday = $birthday_day + $birthday_month ;
	}
	else
	{
		$birthday = '';
	}
	
	
	
	//$report 		 = $_FILES['fileToUpload'];
	//create the database connection.
	include_once('../../Control/ConnectionDB.php');
	
	//...............................
			if(isset($_POST['submits']))
			{
				$NIC = $_SESSION['NIC'];
				if(getimagesize($_FILES['report']['tmp_name'])==FALSE)
				{
					echo "please selct an image.";
				}
				else
				{
					$Report = addslashes($_FILES['report']['tmp_name']);
					$name = addslashes($_FILES['report']['name']);
					$Report = file_get_contents($Report);
					$Report = base64_encode($Report);
					saveReport($name,$Report,$NIC);
					
				}
			}
			function saveReport($name,$Report,$NIC)
			{
				
				$result = mysql_query("INSERT INTO `cc`.`reports` (`ReportID`,`Dates`,`Photo`,`PatientNIC`) VALUES (null,null,'$Report','$NIC'); ");
			
				if($result)
				{
					echo "<br/> Image Uploaded";
				}
				else
				{
					echo "<br/> Image not Uploaded";
				}	
			}
			if(isset($_POST['sumit']))
			{
				$NIC = $_SESSION['NIC'];
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
					saveimage($name,$image,$NIC);
					
				}
			}
			function saveimage($name,$image,$NIC)
			{
				$result = mysql_query("UPDATE patient SET PatientPhoto = '$image' WHERE NIC = '$NIC';");
				if($result)
				{
					echo "<br/> Image Uploaded";
				}
				else
				{
					echo "<br/> Image not Uploaded";
				}
	
			}
	//.............................
	
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
	
	if(mysql_affected_rows() == $j){ 	//check whether update is successful or not,
		
		header('Location: Patient home.php');//if successful, will direct in to the patient home page,
	}
	else
	{
		header('Location: Patient home.php');//if not successful, will direct to again in to the patient account setting.php page.
	}
?>