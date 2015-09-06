<?php 
	$doctorNIC = $_POST['NIC'];
	$patientNIC = $_POST['patientNIC'];
	$Message = $_POST['msg'];
	
	
		//connect database
		include_once('../../Control/ConnectionDB.php');
 
 mysql_query("INSERT INTO `cc`.`prescription` (`PrescriptionID`,`doctorNIC``PrescriptionDetails`, `Dates`, `PatientNIC`) VALUES (null, '$doctorNIC', '$Message',null,'$PatientNIC');");//insert query of the status from perticular actor, whether patient or doctor
	
	
 $result = mysql_query("SELECT * FROM `prescription` WHERE `doctorNIC`='$doctorNIC' and `patientNIC`='$patientNIC'");//again data retrieve from the status table for previously updated status
 //$resultPatientName = mysql_query("SELECT * FROM logs ORDER BY id DEC") or die("SELECT * FROM logs ORDER BY id DEC"."<br/><br/>".mysql_error());
 
 if($result == FALSE) { //check whether data retrieving happen done correctly or not. if false, stop executing
	
    die(mysql_error()); // TODO: better error handling
}

while($row = mysql_fetch_array($result))
{
		echo "<span class='msg'>" . $row['PrescriptionDetails'] ."</span><br>";
}
?>