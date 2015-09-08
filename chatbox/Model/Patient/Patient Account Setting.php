<?php
	
	session_start();
	$NIC = $_SESSION['NIC'];
?>
<!DOCTYPE html>
<html>
<body bgcolor = "#ADD8E6">
<body background = "../../View/Patient/view/images/Patient.jpg"/>
<head>
<link rel="stylesheet" type="css/text" href="CSS/PatientAccountSetting.css"/>
<style>


</style>
<link rel="stylesheet" type="text/css" href="../../View/Patient/CSS/PatientAccountSetting.css">
<font size = "8"> <B>Patient Account<br></font>
</head>
<div align="right" class="menu">
	<font color= "black" size="4px"> <?php echo $_SESSION['FirstName'];?> <?php echo $_SESSION['SecondName'];?><font color = "lightblue"> ........... </font> </font>
	<a class = "link" href = "Patient Account Setting.php" style="text-decoration:none;"><font size="4px">setiing<font color = "lightblue"> ... </font></font></a>
	<a class = "link" href = "Patient Home.php" style="text-decoration:none;"> <font size="4px">Home<font color = "lightblue"> ...</font><font></a><tr>
	<a class = "link" href = "Patient Logout.php" style="text-decoration:none;"> <font size="4px"> Logout <font></a>
 </div>
<div class= "relative">
<?php
	include_once('../../Control/ConnectionDB.php');
	$photo = $_SESSION['PatientPhoto'];
	$NIC 	= $_SESSION['NIC'];
	if($photo != null)
	{
		$result = mysql_query("select PatientPhoto from patient where NIC = '$NIC';");
		
			while ($row = mysql_fetch_array($result))
			$photo = $row['PatientPhoto'];
			{
				echo'<img height="160" width="160" src = "data:image;base64,'.$photo.'">';
			}
	}
	else
	{
		?>
		<img src= "../../View/Patient/view/images/Profile Picture.jpg" alt = "Mountain View" style = "width:160px;height:160px"/> <br><br>
		<?php
	}
?>
</div>
<div class = "relative1">
	<form action= "Patient Account Setting DB.php" method="post" enctype = "multipart/form-data">
	<br/>
		<input type = "file" name = "image"/>
	<br/>
		<input type = "submit" name = "sumit" value="upload"/>		
	</form>	
</div>

<div class = "relative3">
	<form name = "Patient Account" action = "Patient Account Setting DB.php" method = "post"><!--where 'register.php' must change according to the -->
	<!--<span class= "label"><br></span> <input class= "input" type = "text" name = "email2" id = "Id_email2" placeholder = "Email"/><br><br><!--want to check weather a valid or invalid Email address -->
	<input  class= "input" type = "number" style= "width:300px;" name = "TP" id = "Id_TP" placeholder = "Telephone Number" onkeypress="return lengthValidate(event)"/><br><br>
	<textarea style = "height:70px;width:300px;" class = "input" type = "text" name = "job" id = "Id_job" placeholder = "Job History"></textarea> <br><br>
	<align = "middle"> <textarea style = "height:70px;width:300px;" class = "input" type = "text" name = "address" id = "Id_address" placeholder = "Address" ></textarea> <br><br>
	<textarea style = "height:70px;width:300px;" class = "input" type = "text" name = "familyBackground" id = "Id_familyBackground" placeholder = "Family Background"></textarea> <br><br>
	<input type="radio" name="status" value="single" checked ><font size= "6">Single</font> <input type="radio" name="status" value="married"><font size= "6">Married</font><br><br>
	<input type="radio" name="sex" value="male" checked ><font size= "6">Male</font> <input type="radio" name="sex" value="female"><font size= "6">Female</font><br><br>
<span>
<select id="month" class="_5dba" title="Month" name="birthday_month" aria-label="Month">
<option selected="1" value="0">Month</option>
<option value="1">Jan</option>
<option value="2">Feb</option>
<option value="3">Mar</option>
<option value="4">Apr</option>
<option value="5">May</option>
<option value="6">Jun</option>
<option value="7">Jul</option>
<option value="8">Aug</option>
<option value="9">Sep</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select>
<select id="day" class="_5dba" title="Day" name="birthday_day" aria-label="Day">
<option selected="1" value="0">Day</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select id="year" class="_5dba" title="Year" name="birthday_year" aria-label="Year">
<option selected="1" value="0">Year</option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>

</select>
</span>
	
	<br><br>
	
	<button id="Id_submit" class="_6j mvm _6wk _6wl _58me _58mi _3ma _6o _6v" type="submit">Submit</button>
		
</div>

<Script>//validate telephone number maximum length is to 10
	function lengthValidate(event)
	{
		if(10>document.getElementById("Id_TP").value.length)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>
</body>
</html>

 