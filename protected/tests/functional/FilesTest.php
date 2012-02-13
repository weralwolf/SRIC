<?php

class FilesTest extends WebTestCase
{
	public $fixtures=array(
		'files'=>'Files',
	);

	public function testShow()
	{
		$this->open('?r=files/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=files/create');
	}

	public function testUpdate()
	{
		$this->open('?r=files/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=files/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=files/index');
	}

	public function testAdmin()
	{
		$this->open('?r=files/admin');
	}
}
