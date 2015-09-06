<?php
	session_start();
	
	session_destroy();
	
	header('Location: Doctor Home.php');
	
?>