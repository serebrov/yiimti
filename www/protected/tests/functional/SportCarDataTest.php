<?php

class SportCarDataTest extends WebTestCase
{
	public $fixtures=array(
		'sportCarDatas'=>'SportCarData',
	);

	public function testShow()
	{
		$this->open('?r=sportCarData/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=sportCarData/create');
	}

	public function testUpdate()
	{
		$this->open('?r=sportCarData/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=sportCarData/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=sportCarData/index');
	}

	public function testAdmin()
	{
		$this->open('?r=sportCarData/admin');
	}
}
