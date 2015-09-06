<?php
function get_products()
{
	
	//create connection 
	include_once('../../Control/ConnectionDB.php');
	
	$query = "SELECT `FirstName`,`NIC`,`Speciality`,`address`,`registrationnumber`,`graduation`,`workingexperience`,`DoctorPhoto` FROM doctor ";//corresponding query
	$data = mysql_query($query,$conn);//store the retrieved data
	$products=array();					//create array type variable
	while($object=mysql_fetch_object($data))//assigning result in to array
	{
		$products[]=$object;
	}
	
	return $products;				//returnt the result in to the get_table function
}
function get_table()
{
	$table_str = '<table id="product_table">';				//creating dynmic table in php
	$products = get_products();								//call for the details which are retrieved from the database using mysql
	$i=1;							
	$table_str.='<tr class= "head_table">';										//horizontal line above and below the titles of table
	$table_str.='<th>Number</th> <th>NIC</th><th>Name</th> <th>speciality</th> <th>Working Experience</th> <th>address</th><th>Graduation</th><th>Registration Number</th>';			//topics of table
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
		$table_str.='<tr class="'.$class.'">';									//horizontal line
		$NIC = $product->NIC;
		$photo = $product->DoctorPhoto;
		if($photo !=null)
		{
			$table_str.='<td width="30">'.($i++).'</td> <td id="'.($i-1).'">'.$NIC.'</td> <td width="60">'.$product->FirstName.'</td> <td>'.$product->Speciality.'</td> <td>'.$product->workingexperience.'</td> <td>'.$product->address.'</td> <td>'.$product->graduation.'</td> <td>'.$product->registrationnumber.'</td><td><img src="data:image/jpeg;base64,'.base64_encode( $photo ).'" /></td> ' ;
		}
		else
		{
			$table_str.='<td width="30">'.($i++).'</td> <td id="'.($i-1).'">'.$NIC.'</td> <td width="60">'.$product->FirstName.'</td> <td>'.$product->Speciality.'</td> <td>'.$product->workingexperience.'</td> <td>'.$product->address.'</td> <td>'.$product->graduation.'</td> <td>'.$product->registrationnumber.'</td><td><img src= "../../View/Doctor/view/images/Profile Picture.jpg" alt = "Mountain View" style = "width:160px;height:160px"/> <br><br></td>' ;
		}	
		
		
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
	<link rel="stylesheet" type="text/css" href="../../View/patient/CSS/DoctorSearchDB.css"/>
	<!--java script fucntion for access database to submit follow request-->
		<script src="../../Control/jquery/jquery-1.11.3.min.js"></script>
		<script type="text/javascript">
			function FolloButton(i)
			{
				
				
				var td = document.getElementById(i);	<!--get td value-->
				 	
			}
		</script>
		<title>Deom table </title>
		<div align="right" class="menu">
			<font class = "patientName"color= "black" size="4px"></font>
			<form  action="../Patient/DoctorSearchDB.php" method="POST"> <input class = "searchBar" id="search" title="Enter speciality of the Doctor. here you will be selected appropriate Doctor list" type="text" placeholder="Enter Doctor speciality here" name="searchSpeciality"><input class="searchButton" id="submit" type="submit" value="Search"></form>
			<a class = "link" href = "../../Home.html" style="text-decoration:none;"> <font size="4px">Home<font></a><tr>
			
		 </div>
	</head>
	<body>
	<?php echo get_table(); ?>
	</body>
	

</html>