w<?php

//meka tyenne Doctor home.php eke search button eka click kalam methanata enawa.. ethakota doctorwa follow karala tyena okkama 
//patientlaga wisthara tika methana table ekaka pennanawa.
session_start();
$DoctorNIC = $_SESSION['NIC'];//Doctor NIC from the session variable

function get_products($DoctorNIC)
{
	
	//create database connection
	include_once('../../Control/ConnectionDB.php');
	
	//me query eka wenas karanna ona... meke wenna ona.. 'patient follow doctor' table keai 'patient' ekai patientNIC eken join karanawa. ethakota me session 
	//ekata adala doctorge doctorNIC eka aragena eken search karala gannawa me doctorwa follow karala tyena okkoma patient lage wisthara tika
	$query = "SELECT P.FirstName,P.NIC,P.PatientPhoto,P.Sex,P.Address,P.Job,P.Status,P.FamilyBackground,P.Email FROM Patient as P INNER JOIN patient_follow_doctor as PFD ON P.NIC = PFD.PatientNIC WHERE PFD.doctorNIC = '$DoctorNIC'";//corresponding query
	$data = mysql_query($query,$conn);//store the retrieved data
	$products=array();					//create array type variable
	while($object=mysql_fetch_object($data))//assigning result in to array
	{
		$products[]=$object;
	}
	
	return $products;				//returnt the result in to the get_table function
}
function get_table($doctorNIC)
{
	$table_str = '<table id="product_table">';				//creating dynmic table in php
	$products = get_products($doctorNIC);								//call for the details which are retrieved from the database using mysql
	$i=1;							
	$table_str.='<tr class= "head_table">';										//horizontal line above and below the titles of table
	$table_str.='<th>Number</th> <th>NIC</th><th>Name</th> <th>Sex</th> <th>Address</th> <th>Job</th><th>Status</th><th>Family Background</th><th>Email</th><th>Patient Photo</th>';			//topics of table
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
		$photo = $product->PatientPhoto;
		if($photo !=null)
		{
			$table_str.='<td width="30">'.($i++).'</td> <td id="'.($i-1).'">'.$NIC.'</td> <td width="60">'.$product->FirstName.'</td> <td>'.$product->Sex.'</td> <td>'.$product->Address.'</td> <td>'.$product->Job.'</td> <td>'.$product->Status.'</td> <td>'.$product->FamilyBackground.'</td><td>'.$product->Email.'</td><td><img src="data:image/jpeg;base64,'.base64_encode( $photo ).'" /></td> <td><button class="clsActionButton" id="idAddButton" onclick="FolloButton('.($i-1).',\''.$doctorNIC.'\');">Give Prescription</button></td>' ;
		}
		else
		{
			$table_str.='<td width="30">'.($i++).'</td> <td id="'.($i-1).'">'.$NIC.'</td> <td width="60">'.$product->FirstName.'</td> <td>'.$product->Sex.'</td> <td>'.$product->Address.'</td> <td>'.$product->Job.'</td> <td>'.$product->Status.'</td> <td>'.$product->FamilyBackground.'</td><td>'.$product->Email.'</td><td><img src= "../../View/Doctor/view/images/Profile Picture.jpg" alt = "Mountain View" style = "width:160px;height:160px"/> <br><br></td> <td><button class="clsActionButton" id="idAddButton" onclick="FolloButton('.($i-1).',\''.$doctorNIC.'\');">Give Prescription</button></td>' ;
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
	
	<!--java script fucntion for access database to submit follow request-->
	<link rel= "stylesheet" type="txt/css" href="../../View/Doctor/CSS/PatientSearchDB.css"/>
 		<script src="../../Control/jquery/jquery-1.11.3.min"></script>
		<script type="text/javascript">
		
			function FolloButton(i,doctorNIC)
			{
				
				var td = document.getElementById(i);	<!--get td value-->
				var patientNIC = td.innerText;
				alert(doctorNIC);
				<!-- NIC value of particular row-->
				xmlhttp.open("POST","DoctorGivePrescription.php?doctorNIC="+doctorNIC+"&patientNIC="+patientNIC,true);
				xmlhttp.send();
				
				 	
			}
		</script>
	
		
		<title>Deom table </title>
		<style type="text/css">
			
		</style>
		<div align="right" class="menu">
			<font class = "patientName"color= "black" size="4px"> <?php echo $_SESSION['FirstName'];?> <?php echo $_SESSION['SecondName'];?> </font>
			<a class = "link" href = "Doctor Account Setting.php" style="text-decoration:none;"><font size="4px">Setting</font></a>
			<a class = "link" href = "Doctor Home.php" style="text-decoration:none;"> <font size="4px">Home<font></a><tr>
			<a class = "link" href = "Doctor Logout.php" style="text-decoration:none;"> <font size="4px"> Logout <font></a>
		 </div>
	</head>
	<body background = "../../View/Doctor/view/images/Doctor.jpg">
	<br><br>
	<?php echo get_table($DoctorNIC); ?><!--table eka adina thena-->
	</body>
	

</html>