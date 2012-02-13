<?php

class ReportsTest extends WebTestCase
{
	public $fixtures=array(
		'reports'=>'Reports',
	);

	public function testShow()
	{
		$this->open('?r=reports/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=reports/create');
	}

	public function testUpdate()
	{
		$this->open('?r=reports/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=reports/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=reports/index');
	}

	public function testAdmin()
	{
		$this->open('?r=reports/admin');
	}
}
