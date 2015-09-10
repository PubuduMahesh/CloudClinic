<?php 
	include_once "patient register DB.php"; //include the testing php page. ()
	
	class testcase extends PHPUnit_Framework_TestCase //extends the PHPUnit_Framework_TestCasse
	{
		public function testTest1()//test case.
		{
			$this->assertEquals("success",insertPatientRegister("Amila","dezoisa","karunathilaka","912538746V","logwennaona","amilacc@gmail.com"));
		}
	}
?>