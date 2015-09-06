<?php

	session_start();
	$patientNIC = $_SESSION['NIC'];
function get_products($patientNIC)
{
	
	//create database connection 
	include_once('../../Control/ConnectionDB.php');
	
	$query = "SELECT `photo` FROM `reports` WHERE `patientNIC` = '$patientNIC'";//corresponding query
	$data = mysql_query($query,$conn);//store the retrieved data
	$products=array();					//create array type variable
	while($object=mysql_fetch_object($data))//assigning result in to array
	{
		$products[]=$object;
	}
	
	return $products;				//returnt the result in to the get_table function
}
function get_table($patientNIC)
{
	$table_str = '<table id="product_table">';				//creating dynmic table in php
	$products = get_products($patientNIC);								//call for the details which are retrieved from the database using mysql
	$i=1;							
	$table_str.='<tr class= "head_table">';										//horizontal line above and below the titles of table
	$table_str.='<th>Number</th> <th>Photo</th>';			//topics of table
	$table_str.='</tr>';
	$class='';
	foreach($products as $product)							//add data in to the created table as row by row
	{
		if($i%2==0)		//check to color the datable rows
		{
			$class="row_even";		//if even rows
		}
		else
		{
			$class="row_odd";		//if odd rows
		}
		$table_str.='<tr class="'.$class.'">';	
		$photo = $product->photo;
		
		$table_str.='<td width="30">'.($i++).'</td> <td><img src="data:image/jpeg;base64,'.base64_encode( $photo ).'" /></td>' ;
		//$table_str.='<td width="30">'.($i++).'</td> <td id="'.($i-1).'">'.$patientNIC.'</td> <td width="60">'.$product->FirstName.'</td> <td>'.$product->Speciality.'</td> <td>'.$product->workingexperience.'</td> <td>'.$product->address.'</td> <td>'.$product->graduation.'</td> <td>'.$product->registrationnumber.'</td> <td><button class="clsActionButton" id="idAddButton" 
		//onclick="FolloButton('.$i.');">Follow Me</button></td>' ;
		$table_str.='</tr>';								//horizontal line
	}
	$table_str.= '</table>';
	return $table_str;
}

?>

<html>
	<head>
	<link rel="stylesheet" type="text/css" href="CSS/ViewReportDB.css">
	<!--java script fucntion for access database to submit follow request-->
		<script src="../../Control/jquery/jquery-1.11.3.min"></script>
		
	
		
		<title>Deom table </title>
		<style type="text/css">
			
		</style>
	</head>
	<body>
	<?php echo get_table($patientNIC); ?>
	</body>
	

</html>