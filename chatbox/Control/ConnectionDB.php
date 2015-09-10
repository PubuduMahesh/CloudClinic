<?php
	$conn = mysql_connect('localhost','root','');//initialize the database connection
	$db = mysql_select_db('cc',$conn);//select database and create the connection between particular database.
	
	if(!$conn)//if conneciton is failed
	{
		die("can not connect to server");
	}	
	
	if(!$db)//if database connection is failed
	{
		die("can not connect to database");
	}
?>