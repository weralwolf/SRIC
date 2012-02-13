<?php

class ParticipantsTest extends WebTestCase
{
	public $fixtures=array(
		'participants'=>'Participants',
	);

	public function testShow()
	{
		$this->open('?r=participants/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=participants/create');
	}

	public function testUpdate()
	{
		$this->open('?r=participants/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=participants/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=participants/index');
	}

	public function testAdmin()
	{
		$this->open('?r=participants/admin');
	}
}
