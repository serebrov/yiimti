<?php

class FamilyCarDataTest extends WebTestCase
{
	public $fixtures=array(
		'familyCarDatas'=>'FamilyCarData',
	);

	public function testShow()
	{
		$this->open('?r=familyCarData/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=familyCarData/create');
	}

	public function testUpdate()
	{
		$this->open('?r=familyCarData/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=familyCarData/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=familyCarData/index');
	}

	public function testAdmin()
	{
		$this->open('?r=familyCarData/admin');
	}
}
