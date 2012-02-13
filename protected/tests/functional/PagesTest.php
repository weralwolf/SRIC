<?php

class PagesTest extends WebTestCase
{
	public $fixtures=array(
		'pages'=>'Pages',
	);

	public function testShow()
	{
		$this->open('?r=pages/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=pages/create');
	}

	public function testUpdate()
	{
		$this->open('?r=pages/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=pages/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=pages/index');
	}

	public function testAdmin()
	{
		$this->open('?r=pages/admin');
	}
}
