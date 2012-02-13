<?php

class CitiesTest extends WebTestCase
{
	public $fixtures=array(
		'cities'=>'Cities',
	);

	public function testShow()
	{
		$this->open('?r=cities/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=cities/create');
	}

	public function testUpdate()
	{
		$this->open('?r=cities/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=cities/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=cities/index');
	}

	public function testAdmin()
	{
		$this->open('?r=cities/admin');
	}
}
