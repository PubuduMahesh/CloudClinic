<?php
session_start();
 $_SESSION['NIC'] = $_POST['NIC'];
 $NIC = $_SESSION['NIC'];
 $password = $_POST['password'];
// $PatientPhoto;
 $FirstName;
 $SecondName;
 include_once('../../Control/ConnectionDB.php');
 
 $result = mysql_query("SELECT * FROM patient WHERE NIC ='$NIC' AND password = '$password'");
 
 if(mysql_num_rows($result)) { 
	
	$res= mysql_fetch_array($result);
	$_SESSION['NIC'] = $res['NIC'];
	$_SESSION['FirstName'] = $res['FirstName'];
	$_SESSION['SecondName'] = $res['SecondName'];
	$_SESSION['PatientPhoto'] = $res['PatientPhoto'];
	echo"<center>";
	header('Location: patient home.php');
	echo"</center>";

}
else{
	session_destroy();
	echo"<center>";
	echo"Incorrect information";
	header('Location: patient home.php');
	echo"</center>";
	}
 
?>