<?php
	//session is started. 		
    session_start();
	
	if(!isset($_SESSION['NIC'])){								//only if not there is a registered NIC for particular session variable
?>	
<head>
<link rel="stylesheet" type="text/css" href="../../View/Doctor/CSS/DoctorHome.css">
</head>
<div class = "mainMenu">
	<a class = "link" href = "../Patient/patient Home.php" style="text-decoration:none;"> <font size="4px">Patient Home<font></a><tr>
 </div>
	<html>
	<body background = "../../View/Doctor/view/images/Doctor.jpg"/>
<div class = "loginTable" align= "center">
	<form name = "form2" action = "Doctor Login.php" method = "post">	<!--this form for signin to the chat box session-->
	<table border="0">
	<tr>
	<td>NIC:</td>
	<td><input type ="text" name ="NIC" id= "NIC"></td>
	</tr>
	<tr>
	<td>Password:</td>
	<td><input type= "password" name = "password" id = "password"></td>
	</tr>
	<tr>
	<td colspan="2"><input type="submit" name = "submit" value= "Login"</td>
	</tr>
	<tr>
	<td colspan = "2"><a href = "Doctor register.php">Register here to get an account </a></td>
	</tr>
	</table>
	</form>
</div>
<?php	
	exit;
	}
		include_once('../../Control/ConnectionDB.php'); 
		$doctorNIC = $_SESSION['NIC'];
		$query ="SELECT `patientNIC` from `patient_follow_doctor` where `doctorNIC` = '$doctorNIC'";
		$data = mysql_query($query,$conn);
		$row = mysql_fetch_assoc($data);
		$patientName = "you have not been followed by any more patient";
		if(mysql_num_rows($data)>0)
		{
			$patientNIC = $row['patientNIC'];
			$query ="SELECT `FirstName` FROM `patient` WHERE `NIC` = '$patientNIC'";
			$data = mysql_query($query,$conn);
			$row = mysql_fetch_assoc($data);
			
			if(mysql_num_rows($data)>0)
			{
				$patientName = $row['FirstName'];
			}
		}
		
	

?>

<head>
<link rel="stylesheet" type="text/css" href="../../View/Doctor/CSS/DoctorHome.css">

<font size =7>Doctor Home</font> <font size=6 color = "red"></font>

<div class = "relative">
  <?php
  
	$photo = $_SESSION['DoctorPhoto'];
	if($photo != null)
	{
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $photo ).'"/>'; 
	}		
	else
	{
		?>
			<img src= "../../View/Doctor/view/images/Profile Picture.jpg" alt = "Mountain View" style = "width:160px;height:160px"/> <br><br>
		<?php
	}		
  ?>
</div>

<div class="article"title="you can add your article here.This will help you to improve your Profile status in this system by adding more and more important relevant article ">
	<font size="5"><font color="yellow">....</font><B>Article</font>
	<hr>
<form action="Doctor Account setting DB.php" method="post" enctype="multipart/form-data">
    Article:<input class="articleChoose"type="file" name="fileToUpload" id="fileToUpload"><br><br>
	<label><font color="yellow"></font><input type="submit" value="Upload article" name="submit"></label>
</form>
</div>
<div class = "patientSearch" title="You can search the patients who are following you"> 
	<font size="3"><font color="yellow">....</font><B>Search Patient</font>
	<hr>
	<form action="PatientSearchDB.php" method="post" enctype="multipart/form-data">
		<button id="btn_click">Search</button>
	</form>
</div>

<div align="right" class="menu">
	<font color= "black" size="4px"> <?php echo $_SESSION['FirstName'];?> <?php echo $_SESSION['SecondName'];?> <font color = "lightblue"> ... </font></font>
	<a class = "link" href = "Doctor Account Setting.php" style="text-decoration:none;"><font size="4px">Setting<font color = "lightblue"> ... </font> </font></a>
	<a class = "link" href = "Doctor Home.php" style="text-decoration:none;"> <font size="4px">Home <font color = "lightblue"> ... </font> <font></a><tr>
	<a class = "link" href = "Doctor Logout.php" style="text-decoration:none;"> <font size="4px"> Logout <font color = "lightblue"> ... </font> <font></a>
 </div>
 
<link rel="stylesheet" type="text/css" href="chat.css"/>
<script src="../../Control/jquery/jquery-1.11.3.min.js"></script>
<script>
var NIC = '<?php echo $_SESSION["NIC"]; ?>';
var patientNIC = '<?php echo $patientNIC;?>';

function submitChat(patientNIC)
{	
	var msg = form1.msg.value;
	var type = "doctor";
	
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
	
	xmlhttp.open("GET","insert.php?NIC="+NIC+"&msg="+msg+"&patientNIC="+patientNIC+"&type="+type,true);
	xmlhttp.send();
} 
$(document).ready(function() {
	
	setInterval(function() {
    $.getJSON('logs.php',{doctorNIC:NIC,patientNIC:patientNIC,type:"doctor"},callBack);
    }, 1000);
    $.ajaxSetup({cache: false });
});
function callBack(json)
{
	$('#chatlogs').html(json[0]);
	
}
$('#btn_click').on('click', function() { window.location = 'PatientSearchDB.php'; });
</script>
</head>
<body background = "../../View/Doctor/view/images/Doctor.jpg"/>	
<div class="chatbox" title="YOu can communicate with Patient here">
	<font color="lightgreen">...............</font><font color = "cerise">Stauts</font>
	<form name = "form1" align = "middle">

	<table border= "1" align = "center">
	<tr>
	<td>User Name:</td><td><b><?php echo $_SESSION['FirstName'];?></b></td>
	
	<tr>
	<td name = "PatientName">Patient</td><td><b><?php echo $patientName;?></b>
	</tr>
	<tr>
	<td>Message:</td>
	<td><textarea name = "msg" id= "msg"></textarea></br></td align= "center"><b>
	</tr>
	<tr>		
	<td><a href = "#" onclick="submitChat('<?php echo $patientNIC;?>')" class = "button"> send </a></td></td>	
	</tr>
	</table>
	</form>
	<!--iframe src="logs.php?doctorNIC=<?php echo $_SESSION["NIC"]; ?>&patientNIC=<?php echo $patientNIC;?>" width=200 height=100></iframe-->
	<div id="chatlogs">Loading ChatLogs.. Please Wait....</div>
</div>




	
</body>
</html>