<?php 
	include_once "patient register DB.php";
	
	class testcase extends PHPUnit_Framework_TestCase
	{
		public function testTest1()
		{
			$this->assertEquals("success",insertPatientRegister("Amila","dezoisa","karunathilaka","912538746V","logwennaona","amilacc@gmail.com"));
		}
	}
?>