<?php

class CountriesTest extends WebTestCase
{
	public $fixtures=array(
		'countries'=>'Countries',
	);

	public function testShow()
	{
		$this->open('?r=countries/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=countries/create');
	}

	public function testUpdate()
	{
		$this->open('?r=countries/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=countries/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=countries/index');
	}

	public function testAdmin()
	{
		$this->open('?r=countries/admin');
	}
}
