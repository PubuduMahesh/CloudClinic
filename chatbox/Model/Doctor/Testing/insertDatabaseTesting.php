<?php 
	
	include_once "Doctor Account Setting DB.php";


class testcase extends PHPUnit_Framework_TestCase
{
	public function testTest1()//pass
	{
		$this->assertEquals("1",insertTelephoneNumber("0","0710565685","923847567V"));
	}
	public function testTest2()//fail
	{
		$this->assertEquals("0",insertTelephoneNumber("0","0710565685","923847567V"));
	}
	public function testTest3()//pass
	{
		$this->assertEquals("2",insertSpeciality("1","Surgery","923847567V"));
	}
	public function testTest4()//fail
	{
		$this->assertEquals("1",insertSpeciality("1","Psychiatrist","923847567V"));
	}
	public function testTest5()//pass
	{
		$this->assertEquals("2",insertSex("1","Male","923847567V"));
	}
	public function testTest6()//fail
	{
		$this->assertEquals("0",insertSex("1","Female","923847567V"));
	}
	public function testTest7()//pass
	{
		$this->assertEquals("2",insertAddress("1","Idama,Moratuwa","923847567V"));
	}
	public function testTest8()//fail
	{
		$this->assertEquals("0",insertAddress("1","muththur,Mannarama","923847567V"));
	}
	public function testTest9()//pass
	{
		$this->assertEquals("2",insertWorkingSpeciality("1","studying","923847567V"));
	}
	public function testTest10()//fail
	{
		$this->assertEquals("0",insertWorkingSpeciality("1","5year experience","923847567V"));
	}
	
	
}

	
	
?>