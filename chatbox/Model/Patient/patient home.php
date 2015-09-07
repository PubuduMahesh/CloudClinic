<?php
	session_start();	
																			//session is started. 
	if(!isset($_SESSION['NIC'])){								//only if not there is a registered NIC for particular session variable
?>
<head>
	<link rel="stylesheet" type="text/css" href="../../View/Patient/CSS/PatientHome.css">
</head>
	<body background = "../../View/Patient/view/images/patient.jpg"/>
	
<div class = "mainMenu">
	<a class = "link" href = "../../Home.html" style="text-decoration:none;"><font size="4px"><font color="lightblue">..... </font>Home</font></a>
	<a class = "link" href = "../Doctor/Doctor Home.php" style="text-decoration:none;"> <font size="4px">Doctor Home<font></a><tr>
 </div>
 
<div class = "logingTable" align= "center"><!-- login table-->
	<form name = "form2" action = "loging.php" method = "post">	<!--this form for signin to the chat box session-->
	<table border="0" >
	<tr>
	<td>NIC:</td>
	<td><input type ="text" name ="NIC" id= "NIC"></td>
	</tr>
	<tr>
	<td>Password:</td>
	<td><input type= "password" name = "password" id = "password"></td>
	</tr>
	<tr>
	<td colspan="2"><input type="submit" name = "submit" value= "Login" class = "loginButton" align = "middle" ></td>
	</tr>
	<tr>
	<td colspan = "2"><a href = "patient register.php">Register here to get an account </a></td>
	</tr>
	</table>
	</form>
</div>
<?php	
	exit;
}
	 
		include_once('../../Control/ConnectionDB.php'); 
		$patientNIC = $_SESSION['NIC'];
		$query ="SELECT `doctorNIC` from `patient_follow_doctor` where `patientNIC` = '$patientNIC'";
		$data = mysql_query($query,$conn);
		$row = mysql_fetch_assoc($data);
		$doctorName = "No followed Doctor";
		if(mysql_num_rows($data)>0)
		{
			$doctorNIC = $row['doctorNIC'];
			$query ="SELECT `FirstName` FROM `doctor` WHERE `NIC` = '$doctorNIC'";
			$data = mysql_query($query,$conn);
			$row = mysql_fetch_assoc($data);
			if(mysql_num_rows($data)>0)
			{
				$doctorName = $row['FirstName'];
			}
		}
		
	
?>
<html>

<head>
<link rel="stylesheet" type="text/css" href="../../View/Patient/CSS/PatientHome.css">
<font size =7>Patient Home</font>
<div align="right" class="menu">
	<font class = "patientName"color= "black" size="4px"> <?php echo $_SESSION['FirstName'];?> <?php echo $_SESSION['SecondName'];?> </font>
	<form  action="DoctorSearchDB.php" method="POST"> <input class = "searchBar" id="search" title="Enter speciality of the Doctor. here you will be selected appropriate Doctor list" type="text" placeholder="Enter Doctor speciality here" name="searchSpeciality"><input class="searchButton" id="submit" type="submit" value="Search"></form>
	<a class = "link" href = "patient Account Setting.php" style="text-decoration:none;"><font size="4px"><font color="lightblue">..... </font>Setting</font></a>
	<a class = "link" href = "patient Home.php" style="text-decoration:none;"> <font size="4px"><font color="lightblue">..... </font>Home<font></a><tr>
	<a class = "link" href = "patient Logout.php" style="text-decoration:none;"> <font size="4px"> <font color="lightblue">..... </font>Logout <font></a>
 </div>
 
<div class="relative">
  <?php
	$photo = $_SESSION['PatientPhoto'];
	if($photo != null)
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $photo ).'"/>'; 
	else{
		?>
		<img src= "../../View/Patient/view/images/Profile Picture.jpg" alt = "Mountain View" style = "width:160px;height:160px"/> <br><br>
		<?php
	}	 
  ?>
</div>

<!-- add report -->
<div class="Report"title="you can add your Report here.">
	<font size="3"><font color="yellow">....</font><B>Report</font><hr>
<form action="Patient Account setting DB.php" method="post" enctype="multipart/form-data">
    <input class="reportChoose"type="file" name="fileToUpload" id="fileToUploadID"><br class = "reportBR"><br>
	<label><font color="yellow"></font><input type="submit" id = "reportSubmit" value="submit"width ="9px"></label><br><br>	
</form>
<a class = "viewReport"href = "view Report DB.php" style="text-decoration:none;"> <font color = "black" size="3px"> View Report <font></a>
</div>

<div class = "Prescription"title="you can view doctor prescription here" >
	<a href = "view Prescription DB.php" style="text-decoration:none;"> <font color = "black" size="3px"> Prescription <font></a>
</div>
<!-- emergency doctor contact-->
<div class = "emergency">
	<html>
		<head>
			<body>
				<form action = "patient home.php" method = "post" title ="You can emergency contact Doctor here">	
					Number:<br>
					<input type = "text" size = "2"name = "TPext" id = "Id_TPext" placeholder= "+94"/> - 
					<input type = "text" size = "10" name = "TP" id = "Id_TP" placeholder = "Telephone Number"/><br><br>
				
					Sender:<br>
					<input type = "text" name = "from" placeholder= "yourName"/> <br> <br>				
					Message:<br>
					<textarea name = "message" Placeholder= "message"></textarea>
					<br><br>
					<input type= "hidden" name= "submitted" value = "true"/>
					<input type = "submit" name = "submit" value = "send"/>
				</form>
			</body>
		</head>
	</html>
</div>




<!-- -->
<link rel="stylesheet" type="text/css" href="chat.css"/>

<script src="../../Control/jquery/jquery-1.11.3.min.js"></script>
<script>
var doctorNIC='<?php echo $doctorNIC;?>';
var NIC = '<?php echo $_SESSION["NIC"]; ?>';
function submitChat(doctorNIC)
{	
	
	var msg = form1.msg.value;
	doctorNIC = doctorNIC;
	var type = "patient";
	var xmlhttp = new XMLHttpRequest();
	if(NIC == "" || msg == "")
	{
		alert ("Enter your Message");
		return;
	}
	
	xmlhttp.onreadystatechange= function()
	{   
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("chatlogs").innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("GET","insert.php?NIC="+NIC+"&msg="+msg+"&doctorNIC="+doctorNIC+"&type="+type,true);
	xmlhttp.send();
	
} 
$(document).ready(function() {
	
	setInterval(function() {
    $.getJSON('logs.php',{doctorNIC:doctorNIC,patientNIC:NIC,type:"patient"},callBack);
    }, 1000);
    $.ajaxSetup({cache: false });
});
function callBack(json)
{	
	$('#chatlogs').html(json[0]);
	
}
</script>
</head>
<body background = "../../View/patient/view/images/patient.jpg"/>	
	<!--implement the posting tag-->
<div class="chatbox">
	<form name = "form1" align = "middle">
	<table border= "1" align = "center">
	<tr>
	<td>User Name:</td><td><b><?php echo $_SESSION['FirstName'];?></b></td>
	</tr>

	<tr>
	<td name = "doctorName">Doctor</td><td><b><?php echo $doctorName;?></b>
	</tr>
	<tr>
	<td>Message:</td>
	<td><textarea name = "msg" id= "msg"></textarea></br></td align= "center"><b>
	
	<tr>
	<td><a href = "#" onclick="submitChat('<?php echo $doctorNIC;?>')" class = "button"> send </a></td></td>
	</tr>
	</table>
	</form>
<!--iframe src="logs.php?patientNIC=<?php echo $_SESSION["NIC"]; ?>&doctorNIC=<?php echo $doctorNIC;?>" width=200 height=100></iframe-->
<div id="chatlogs">Loading ChatLogs.. Please Wait....</div>
</div>
</body>
</html>