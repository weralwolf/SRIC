<?php

class OrganizationsTest extends WebTestCase
{
	public $fixtures=array(
		'organizations'=>'Organizations',
	);

	public function testShow()
	{
		$this->open('?r=organizations/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=organizations/create');
	}

	public function testUpdate()
	{
		$this->open('?r=organizations/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=organizations/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=organizations/index');
	}

	public function testAdmin()
	{
		$this->open('?r=organizations/admin');
	}
}
