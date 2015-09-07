<?php 
	
	include_once "Patient Account Setting DB.php";


class testcase extends PHPUnit_Framework_TestCase
{
	public function testTest1()//pass
	{
		$this->assertEquals("1",insertTelephoneNumber("0","0710565685","917458477V"));
	}
	public function testTest2()//fail
	{
		$this->assertEquals("0",insertTelephoneNumber("0","0710565685","917458477V"));
	}
	public function testTest3()//pass
	{
		$this->assertEquals("2",insertStatus("1","Married","917458477V"));
	}
	public function testTest4()//fail
	{
		$this->assertEquals("1",insertStatus("1","Single","917458477V"));
	}
	public function testTest5()//pass
	{
		$this->assertEquals("2",insertSex("1","Male","917458477V"));
	}
	public function testTest6()//fail
	{
		$this->assertEquals("0",insertSex("1","Female","917458477V"));
	}
	public function testTest7()//pass
	{
		$this->assertEquals("2",insertFamilyBackground("1","no family members","917458477V"));
	}
	public function testTest8()//fail
	{
		$this->assertEquals("0",insertFamilyBackground("1","one Brother and Two sister","917458477V"));
	}
	public function testTest9()//pass
	{
		$this->assertEquals("2",insertJobHistory("1","studying","917458477V"));
	}
	public function testTest10()//fail
	{
		$this->assertEquals("0",insertJobHistory("1","No job company","917458477V"));
	}
	
	
}

	
	
?>