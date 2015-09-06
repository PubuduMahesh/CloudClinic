<?php
	session_start();
	
	session_destroy();
	
	header('Location: patient home.php');
	
?>