<?php

class AccommodationPlacesTest extends WebTestCase
{
	public $fixtures=array(
		'accommodationPlaces'=>'AccommodationPlaces',
	);

	public function testShow()
	{
		$this->open('?r=accommodationPlaces/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=accommodationPlaces/create');
	}

	public function testUpdate()
	{
		$this->open('?r=accommodationPlaces/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=accommodationPlaces/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=accommodationPlaces/index');
	}

	public function testAdmin()
	{
		$this->open('?r=accommodationPlaces/admin');
	}
}
