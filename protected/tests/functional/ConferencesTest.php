<?php

class ConferencesTest extends WebTestCase
{
	public $fixtures=array(
		'conferences'=>'Conferences',
	);

	public function testShow()
	{
		$this->open('?r=conferences/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=conferences/create');
	}

	public function testUpdate()
	{
		$this->open('?r=conferences/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=conferences/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=conferences/index');
	}

	public function testAdmin()
	{
		$this->open('?r=conferences/admin');
	}
}
