<?php
?>
<!DOCTYPE html>
<html>
<link type = "txt/css" rel = "stylesheet" href = "button.css"/><body bgcolor = "#ADD8E6">
<body background = "images/Patient.jpg"/>
<head> 
<font size = "8"> <B>Patient Account<B></font>
</head>

<style>
div.relative {
    position: relative;
	top:20px;
}	
</style>

<style>
div.relative1 {
    position: relative;
	top:250px;
	left:0px;
    
}	
</style>

<style>
div.relative3 {
    position:relative;
	top:10px;
	left:400px;
    
}	
</style>

<link rel="stylesheet" tye="text/css" href="Doctor Account setting.css"/>
<div class= "relative">
<img src= "images/Profile Picture.jpg" alt = "Mountain View" style = "width:200px;height:200px" align = "left"  />
</div>

<div class = "relative3">
	<form name = "Patient Account" action = "register.php" method = "post"><!--where 'register.php' must change according to the -->
	<span class= "label"><br></span> <input class= "input" type = "text" name = "email2" id = "Id_email2" placeholder = "Email"/><br><br><!--want to check weather a valid or invalid Email address-->
	<input  class= "input" type = "text" name = "TP" id = "Id_TP" placeholder = "Telephone Number" class = "relative"/><br><br>
	<textarea style = "height:70px;" class = "input" type = "text" name = "job" id = "Id_job" placeholder = "Job History"></textarea> <br><br>
	<align = "middle"> <textarea style = "height:70px;" class = "input" type = "text" name = "address" id = "Id_address" placeholder = "Address" ></textarea> <br><br>
	<textarea style = "height:70px;" class = "input" type = "text" name = "familyBackground" id = "Id_familyBackground" placeholder = "Family Background"></textarea> <br><br>
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

</select>
</span>
	
	<br><br>
	<button id="Id_submit" class="_6j mvm _6wk _6wl _58me _58mi _3ma _6o _6v" type="submit">Submit</button>
		
</div>
</body>
</html>

 