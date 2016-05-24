<?php

require __dir__.'\\..\\vendor\\autoload.php';

use FForattini\Factory\AbstractFactory;
use FForattini\Factory\AbstractProduct;

class CadillacFactory implements AbstractFactory
{
	public function create($car = '')
	{
		if($car == 'Deville') return new Deville();
	}
}

class Deville implements AbstractProduct
{
	public $year = 1958;
}

class FactoryTest extends PHPUnit_Framework_TestCase
{
    public function testIfCanCreateFactory()
    {
    	$factory = new CadillacFactory();
    	$car = $factory->create('Deville');
        $this->assertEquals($car->year, 1958);
    }
}
