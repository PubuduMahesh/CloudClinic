<?php
//create database connection
include_once('../../Control/ConnectionDB.php');

	$patientNIC = $_GET["patientNIC"];
	$doctorNIC = $_GET["doctorNIC"];
	

 $result = mysql_query("SELECT * FROM `status` WHERE `doctorNIC`='$doctorNIC' and `patientNIC`='$patientNIC' ORDER BY `StatusID` DESC");
 
 $doctornameresult = mysql_query("SELECT FirstName from doctor where NIC = '$doctorNIC'");
 $patientnameresult = mysql_query("SELECT FirstName from patient where NIC = '$patientNIC'");
 
 
 
 if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
$str = "";

$doctorNameRow = mysql_fetch_array($doctornameresult);
$patientNameRow = mysql_fetch_array($patientnameresult);
while($row = mysql_fetch_array($result)){
	
	
	
	if($row['StatusBY'] == "doctor")
	{
		//echo "<span class='NIC'>" .$doctorNameRow['FirstName']."</span>: <span class='msg'>" . $row['Status'] ."</span><br>";
		$str .= "<span class='NIC'>" .$doctorNameRow['FirstName']."</span>: <span class='msg'>" . $row['Status'] ."</span><br>";
	}
	if($row['StatusBY'] == "patient")
	{
		//echo "<span class='NIC'>" .$patientNameRow['FirstName']."</span>: <span class='msg'>" . $row['Status'] ."</span><br>";				
		$str .= "<span class='NIC'>" .$patientNameRow['FirstName']."</span>: <span class='msg'>" . $row['Status'] ."</span><br>";				
	}
    
	
}
echo json_encode(array($str));
 ?>
