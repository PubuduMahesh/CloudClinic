<?php
	//session is started. 		
    session_start();
	
	if(!isset($_SESSION['NIC'])){								//only if not there is a registered NIC for particular session variable
?>	
<head>
<link rel="stylesheet" type="text/css" href="../../View/Doctor/CSS/DoctorHome.css">
</head>
<div class = "mainMenu">
	<a class = "link" href = "../../Home.html" style="text-decoration:none;"><font size="4px"><font color="lightblue">..... </font>Home</font></a>
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
	include_once('../../Control/ConnectionDB.php');
	$photo = $_SESSION['DoctorPhoto'];
	$NIC 	= $_SESSION['NIC'];
	if($photo != null)
	{
		$result = mysql_query("select DoctorPhoto from doctor where NIC = '$NIC';");
		while ($row = mysql_fetch_array($result))
		{
			echo'<img height="160" width="160" src = "data:image;base64,'.$row['DoctorPhoto'].'">';//show the doctor profile picture if uploaded one.
		}
	}
	else
	{
		?>
		<img src= "../../View/Doctor/view/images/Profile Picture.jpg" alt = "Mountain View" style = "width:160px;height:160px"/> <br><br><!-- if doctor not updated his profile picture, default one will be showed -->
		<?php
	}	 
  ?>
</div>

<!-- Article Adding portion. -->
<div class="article"title="you can add your article here.This will help you to improve your Profile status in this system by adding more and more important relevant article ">
	<font size="5"><font color="yellow">....</font><B>Article</font>
	<hr>
<!-- -->
<form action= "Doctor Account Setting DB.php" method="post" enctype = "multipart/form-data"><!-- send to the encrypted photo to 'doctor account setting DB. php' -->
	<br/>
	 Article:<input class="articleChoose" type = "file" name = "article"/> <!-- select the image. -->
	<br/><br />
		<input type = "submit" name = "submit" value="upload"/><!-- image submit -->
</form>	
</div>


<div class = "patientSearch" title="You can search the patients who are following you"> <!-- doctor can show his followed patient list. -->
	<font size="3"><font color="yellow">....</font><B>Search Patient</font>
	<hr>
	<form action="PatientSearchDB.php" method="post" enctype="multipart/form-data"> <!-- head to the 'patientsearch DB.php' page and list will appear in that page. -->
		<button id="btn_click">Search</button>	<!-- search button. -->
	</form>
</div>
<!-- menu implementation part and the relevent CSS class will be menu.  -->
<div align="right" class="menu">
	<font color= "black" size="4px"> <?php echo $_SESSION['FirstName'];?> <?php echo $_SESSION['SecondName'];?> <font color = "lightblue"> ... </font></font>
	<a class = "link" href = "Doctor Account Setting.php" style="text-decoration:none;"><font size="4px">Setting<font color = "lightblue"> ... </font> </font></a>
	<a class = "link" href = "Doctor Home.php" style="text-decoration:none;"> <font size="4px">Home <font color = "lightblue"> ... </font> <font></a><tr>
	<a class = "link" href = "Doctor Logout.php" style="text-decoration:none;"> <font size="4px"> Logout <font color = "lightblue"> ... </font> <font></a>
 </div>
 <!-- css part for the chatbox. -->
<link rel="stylesheet" type="text/css" href="chat.css"/>
<script src="../../Control/jquery/jquery-1.11.3.min.js"></script> <!-- jquery -->
<!-- Chat box part. -->
<script>
var NIC = '<?php echo $_SESSION["NIC"]; ?>'; 	//assign the Doctor NIC into '$NIC' variable.
var patientNIC = '<?php echo $patientNIC;?>';	//relevent patient's NIC value will be assgin to the '$patientNIC' variable.

function submitChat(patientNIC)			//chat submitting function.
{	
	var msg = form1.msg.value;			//message will be assign to 'msg' variable and it will retrieve from the form1 message box.
	var type = "doctor";				//message holder will be Doctor. Since this page is Doctor home page.
	
	var xmlhttp = new XMLHttpRequest();	//create new XMLHttpRequest object. (Ajax)
	if(NIC == "" || msg == "")			//if messaging text area empty(A message is not typed) user will be notified that message box is empty. 
	{
		alert ("Enter your Message");	//alert.
		return;							//and the conversation will be terminated. 
	}
	
	/*this ajax part is for the auto refresh the chatlogs area. so that, user will be shown the reply instant time.
	the chat logs will be frequently refresh */
	
	//The onreadystatechange event is triggered every time the readyState changes.
	xmlhttp.onreadystatechange= function() 
	{   
	//only accept the readyState change to 4 and status is 'OK'
	//4=request finished and response is ready
	//200=OK
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)	
		{
			document.getElementById("chatlogs").innerHTML = xmlhttp.responseText;//xml response will assign to the chatlogs document.
		}
	}
	//submitted message will be sent to 'insert.php' page to enter the database.
	xmlhttp.open("GET","insert.php?NIC="+NIC+"&msg="+msg+"&patientNIC="+patientNIC+"&type="+type,true);
	xmlhttp.send();
} 
//ready function will call frequently.
$(document).ready(function() {
	//frequently call to 'logs.php' to check whether doctor got the new message from the patient.
	setInterval(function() {
    $.getJSON('logs.php',{doctorNIC:NIC,patientNIC:patientNIC,type:"doctor"},callBack);
    }, 1000);
    $.ajaxSetup({cache: false });
});
function callBack(json)
{
	//print the new message from particular patient under chatlogs part.
	$('#chatlogs').html(json[0]);
	
}
$('#btn_click').on('click', function() { window.location = 'PatientSearchDB.php'; });
</script>
</head>
<body background = "../../View/Doctor/view/images/Doctor.jpg"/>	<!-- background doctor image.-->
<!-- chat box implementation part. -->
<div class="chatbox" title="YOu can communicate with Patient here">
	<font color="lightgreen">...............</font><font color = "cerise">Stauts</font>
	<form name = "form1" align = "middle"> <!-- relevent form for the chatbox will be 'form1' -->

	<table border= "1" align = "center">
	<tr>
	<td>User Name:</td><td><b><?php echo $_SESSION['FirstName'];?></b></td> <!-- Username for the Doctor will be shown here. this session variable from the DoctorAccountSettingDB.php.  -->
	
	<tr>
	<td name = "PatientName">Patient</td><td><b><?php echo $patientName;?></b><!-- Patient Name will be showen here. if the doctor is not followed by any patient, it also will be shown here. -->
	</tr>
	<tr>
	<td>Message:</td><!-- messaging text area.-->
	<td><textarea name = "msg" id= "msg"></textarea></br></td align= "center"><b>
	</tr>
	<tr>		
	<td><a href = "#" onclick="submitChat('<?php echo $patientNIC;?>')" class = "button"> send </a></td></td>	<!-- submit the chat to the submitChat function and relevant operation will be done under that function. -->
	</tr>
	</table>
	</form>
	<!--iframe src="logs.php?doctorNIC=<?php echo $_SESSION["NIC"]; ?>&patientNIC=<?php echo $patientNIC;?>" width=200 height=100></iframe-->
	<div id="chatlogs">Loading ChatLogs.. Please Wait....</div<!-- the submitted and receiving messages will be shown under this chatlogs.-->
</div>




	
</body>
</html>