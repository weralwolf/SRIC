<?php

class AccommodationPlacesRoomsTypesTest extends WebTestCase
{
	public $fixtures=array(
		'accommodationPlacesRoomsTypes'=>'AccommodationPlacesRoomsTypes',
	);

	public function testShow()
	{
		$this->open('?r=accommodationPlacesRoomsTypes/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=accommodationPlacesRoomsTypes/create');
	}

	public function testUpdate()
	{
		$this->open('?r=accommodationPlacesRoomsTypes/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=accommodationPlacesRoomsTypes/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=accommodationPlacesRoomsTypes/index');
	}

	public function testAdmin()
	{
		$this->open('?r=accommodationPlacesRoomsTypes/admin');
	}
}
