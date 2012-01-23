<?php

class CarTest extends WebTestCase
{
	public $fixtures=array(
		'cars'=>'Car',
	);

	public function testShow()
	{
		$this->open('?r=car/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=car/create');
	}

	public function testUpdate()
	{
		$this->open('?r=car/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=car/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=car/index');
	}

	public function testAdmin()
	{
		$this->open('?r=car/admin');
	}
}
