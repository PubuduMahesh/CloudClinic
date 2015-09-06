<?php 
	session_start();
	$doctorNIC = $_POST['doctorNIC'];
	$patientNIC = $_POST['patientNIC'];
	
	//create connection 
	include_once('../../Conrol/ConnectionDB.php');
	
	?>
	<html>
	
	<head>
	
		<script>
		function submitPrescription(patientNIC)
		{	
			var NIC = '<?php echo $_SESSION["NIC"]; ?>';
			
			var msg = form1.msg.value;
			var patientNIC = patientNIC;
			
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
			
			xmlhttp.open("GET","submitPrescription.php?NIC="+NIC+"&msg="+msg+"&patientNIC="+patientNIC,true);
			xmlhttp.send();
		} 
		$(document).ready(function() {
			 $("#chatlogs").load("logs.php");
			setInterval(function() {
			  $("#chatlogs").load('logs.php?randval='+ Math.random());
		   }, 1000);
		   $.ajaxSetup({ cache: false });
		});

		$('#btn_click').on('click', function() { window.location = 'PatientSearchDB.php'; });
		</script>
		<div class="prescripionBox" title="YOu can give any prescription to Patient here">
			<font color="lightgreen">...............</font><font color = "cerise">Stauts</font>
			<form name = "form1" align = "middle">

			<table border= "1" align = "center">
			<tr>
			<td>Doctor Name:</td><td><b><?php echo $_SESSION['FirstName'];?></b></td>
			<tr>
			<td>Prescription:</td>
			<td><textarea name = "msg" id= "msg"></textarea></br></td align= "center"><b>
			</tr>
			<tr>		
			<td><a href = "#" onclick="submitPrescription('<?php echo $patientNIC;?>')" class = "button"> send </a></td></td>	
			</tr>
			</table>
			</form>
			<div id="chatlogs">Loading ChatLogs.. Please Wait....</div>
		</div>
	</head>
	
	</html>
	
	<?php
?>
