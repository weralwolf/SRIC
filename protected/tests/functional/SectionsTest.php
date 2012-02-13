<?php

class SectionsTest extends WebTestCase
{
	public $fixtures=array(
		'sections'=>'Sections',
	);

	public function testShow()
	{
		$this->open('?r=sections/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=sections/create');
	}

	public function testUpdate()
	{
		$this->open('?r=sections/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=sections/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=sections/index');
	}

	public function testAdmin()
	{
		$this->open('?r=sections/admin');
	}
}
