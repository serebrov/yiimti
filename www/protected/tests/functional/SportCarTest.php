<?php

class SportCarTest extends WebTestCase
{
	public $fixtures=array(
		'sportCars'=>'SportCar',
	);

	public function testShow()
	{
		$this->open('?r=sportCar/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=sportCar/create');
	}

	public function testUpdate()
	{
		$this->open('?r=sportCar/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=sportCar/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=sportCar/index');
	}

	public function testAdmin()
	{
		$this->open('?r=sportCar/admin');
	}
}
