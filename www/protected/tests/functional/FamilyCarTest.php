<?php

class FamilyCarTest extends WebTestCase
{
	public $fixtures=array(
		'familyCars'=>'FamilyCar',
	);

	public function testShow()
	{
		$this->open('?r=familyCar/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=familyCar/create');
	}

	public function testUpdate()
	{
		$this->open('?r=familyCar/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=familyCar/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=familyCar/index');
	}

	public function testAdmin()
	{
		$this->open('?r=familyCar/admin');
	}
}
