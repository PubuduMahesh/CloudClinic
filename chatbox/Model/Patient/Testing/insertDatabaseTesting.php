<?php 
	
	include_once "Patient Account Setting DB.php";


	class testcase extends PHPUnit_Framework_TestCase
	{

	/* public function testTest1()
	{
		$this->assertEquals(0,1);
	} */



	public function testTest()
	{
		$this->assertEquals("1",insertTelephoneNumber("0","0710565685","917458477V"));
	}
}

	
	
?>