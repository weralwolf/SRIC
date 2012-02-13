<?php

class TextsTest extends WebTestCase
{
	public $fixtures=array(
		'texts'=>'Texts',
	);

	public function testShow()
	{
		$this->open('?r=texts/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=texts/create');
	}

	public function testUpdate()
	{
		$this->open('?r=texts/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=texts/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=texts/index');
	}

	public function testAdmin()
	{
		$this->open('?r=texts/admin');
	}
}
