<?php
	session_start();//session start. 
	//data from the accountsetting from.	
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
	
	//create connection with database.
	include_once('../../Control/ConnectionDB.php');
	$j=0;
	
	//..................Article submit
	if(isset($_POST['submit']))//if only article submit button is clicked
	{
		$NIC = $_SESSION['NIC'];//Doctor NIC is assign to the '$NIC' variable
		if(getimagesize($_FILES['article']['tmp_name'])==FALSE)	//without selecting a Article
		{
			echo "please selct an image.";//message to the user.
		}
		else
		{
			//if article is submitted well, call to saveimage function.
			$Article = addslashes($_FILES['article']['tmp_name']);
			$name = addslashes($_FILES['article']['name']);
			$Article = file_get_contents($Article);
			$Article = base64_encode($Article);
			$type = "article";
			saveArticle($name,$Article,$NIC,$type);	
		}
	}
	//................. if user try to change the profile picture. 
	if(isset($_POST['sumit']))
	{
		$NIC = $_SESSION['NIC'];	//get the doctor NIC value using session variable. 
		//same thing with the above article submit. 
		if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
		{
			echo "please selct an image.";
		}
		else
		{
			$image = addslashes($_FILES['image']['tmp_name']);
			$name = addslashes($_FILES['image']['name']);
			echo $image;
			$image = file_get_contents($image);
			$image = base64_encode($image);
			saveimage($name,$image,$NIC,$type);
					
		}
	}		
		
		function saveimage($name,$image,$NIC,$type)	//image is saved in database using this function.
		{
			$result = mysql_query("UPDATE doctor SET DoctorPhoto = '$image' WHERE NIC = '$NIC';");//update query in the doctor photo
			
			if($result)
			{
				echo "<br/> Image Uploaded";
			}
			else
			{
				echo "<br/> Image not Uploaded";
			}
	
		}

		function saveArticle($name,$Article,$NIC,$type)
		{
			$result = mysql_query("INSERT INTO `cc`.`article` (`ArticleID`,`Photo`,`doctorID`) VALUES (NULL,'$Article','$NIC');");
			
			if($result)
			{
				echo "<br/> Image Uploaded";
			}
			else
			{
				echo "<br/> Image not Uploaded";
			}
	
		}		
	
	//call to database inserting and updating function under these parts. 
	if (!isset($_POST['TP1'])) 
	{
		$telephoneNumber = '';
	} 
	else 
	{
		$telephoneNumber = $_POST['TP1'];
	}
	
	if (!isset($_POST['speciality'])) 
	{
		$speciality = '';
	} 
	else 
	{
		$speciality 	 = $_POST['speciality'];
	}
	
	if (!isset($_POST['address'])) 
	{
		$address = '';
	} 
	else 
	{
		$address = $_POST['address'];
	}
	if (!isset($_POST['registrationNumber'])) 
	{
		$registrationNumber = '';
	} 
	else 
	{
		$registrationNumber= $_POST['registrationNumber'];
	}
	if (!isset($_POST['graduation'])) 
	{
		$graduation = '';
	} 
	else 
	{
		$graduation = $_POST['graduation'];
	}
	if (!isset($_POST['sex'])) 
	{
		$sex = '';
	} 
	else 
	{
		$sex = $_POST['sex'];
	}
	if (!isset($_POST['status'])) 
	{
		$status = '';
	} 
	else 
	{
		$status	 = $_POST['status'];;
	}
	if (!isset($_POST['workingExperience'])) 
	{
		$workingExperience = '';
	} 
	else 
	{
		$workingExperience	 = $_POST['workingExperience'];;
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