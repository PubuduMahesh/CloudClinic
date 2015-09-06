<?php
 session_start(); 
 
 $Message = $_REQUEST['msg'];			//get status update from the patient
 
 $type = $_REQUEST['type'];				//check whether Doctor or Patient
 if($type == "patient")
 {
	 $patientNIC = $_SESSION['NIC'];		//get patient NIC
	 $doctorNIC = $_REQUEST['doctorNIC'];	//check the NIC of Doctor
 }
 if($type == "doctor")
 {
	 $doctorNIC = $_SESSION['NIC'];   //get doctor NIC
	 $patientNIC = $_REQUEST['patientNIC']; //get patient NIC
 }
 include_once('../../Control/ConnectionDB.php');
 
 mysql_query("INSERT INTO `cc`.`status` (`doctorNIC`, `patientNIC`, `status`,`StatusBY`) VALUES ('$doctorNIC', '$patientNIC', '$Message','$type');");//insert query of the status from perticular actor, whether patient or doctor
 
 
 $result = mysql_query("SELECT * FROM `status` WHERE `doctorNIC`='$doctorNIC' and `patientNIC`='$patientNIC'");//again data retrieve from the status table for previously updated status
 //$resultPatientName = mysql_query("SELECT * FROM logs ORDER BY id DEC") or die("SELECT * FROM logs ORDER BY id DEC"."<br/><br/>".mysql_error());
 $resultPatientName = mysql_query("SELECT `FirstName` FROM `patient` WHERE `NIC` = '$patientNIC'");
 $resultDoctorName = mysql_query("SELECT `FirstName` FROM `doctor` WHERE `NIC` = '$doctorNIC'");
 if($result == FALSE) { //check whether data retrieving happen done correctly or not. if false, stop executing
	
    die(mysql_error()); // TODO: better error handling
}
if($resultPatientName == FALSE)
{
	die(mysql_error()); // better error handling
}
$namerow = mysql_fetch_array($resultPatientName);
$doctorNameRow = mysql_fetch_array($resultDoctorName);

while($row = mysql_fetch_array($result))
{
	$statusBY = $row['StatusBY'];
	if($statusBY == "patient")	//if the message from the patient, this statement will print 
	{
		echo "<span class='NIC'>" .$namerow['FirstName']."</span>: <span class='msg'>" . $row['Status'] ."</span><br>";				
	}
	if($statusBY == "doctor")
	{
		echo "<span class='NIC'>" .$doctorNameRow['FirstName']."</span>: <span class='msg'>" . $row['Status'] ."</span><br>";
	}
}
 ?>
