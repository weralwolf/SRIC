<?php

class ContactsTest extends WebTestCase
{
	public $fixtures=array(
		'contacts'=>'Contacts',
	);

	public function testShow()
	{
		$this->open('?r=contacts/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=contacts/create');
	}

	public function testUpdate()
	{
		$this->open('?r=contacts/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=contacts/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=contacts/index');
	}

	public function testAdmin()
	{
		$this->open('?r=contacts/admin');
	}
}
