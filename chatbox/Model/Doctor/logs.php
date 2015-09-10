<?php
//create database connection
include_once('../../Control/ConnectionDB.php');

	$patientNIC = $_GET["patientNIC"];	//NIC value of patient.. from the chatbox part.(json encodeing part sends this.)
	$doctorNIC = $_GET["doctorNIC"];	//NIC value of doctor.. from the chatbox part.
	

 $result = mysql_query("SELECT * FROM `status` WHERE `doctorNIC`='$doctorNIC' and `patientNIC`='$patientNIC' ORDER BY `StatusID` DESC");//mysql query to retrieve data.
 
 $doctornameresult = mysql_query("SELECT FirstName from doctor where NIC = '$doctorNIC'");
 $patientnameresult = mysql_query("SELECT FirstName from patient where NIC = '$patientNIC'");
 
 
 
 if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
$str = "";

$doctorNameRow = mysql_fetch_array($doctornameresult);
$patientNameRow = mysql_fetch_array($patientnameresult);
while($row = mysql_fetch_array($result)){
	
	
	
	if($row['StatusBY'] == "doctor")//if doctor this the new message will assign to the front of the message stack.
	{
		//echo "<span class='NIC'>" .$doctorNameRow['FirstName']."</span>: <span class='msg'>" . $row['Status'] ."</span><br>";
		$str .= "<span class='NIC'>" .$doctorNameRow['FirstName']."</span>: <span class='msg'>" . $row['Status'] ."</span><br>";
	}
	if($row['StatusBY'] == "patient")//if patient this the new message will assign to the front of the his message stack.
	{
		//echo "<span class='NIC'>" .$patientNameRow['FirstName']."</span>: <span class='msg'>" . $row['Status'] ."</span><br>";				
		$str .= "<span class='NIC'>" .$patientNameRow['FirstName']."</span>: <span class='msg'>" . $row['Status'] ."</span><br>";				
	}
    
	
}
echo json_encode(array($str));//print the array. using json_encod.
 ?>
