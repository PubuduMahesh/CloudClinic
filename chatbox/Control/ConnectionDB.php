<?php
	$conn = mysql_connect('localhost','root','');
	$db = mysql_select_db('cc',$conn);
	
	if(!$conn)//if conneciton is failed
	{
		die("can not connect to server");
	}	
	
	if(!$db)//if database connection is failed
	{
		die("can not connect to database");
	}
?>