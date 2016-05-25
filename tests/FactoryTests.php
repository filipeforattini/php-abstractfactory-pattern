<?php

require __dir__.'\\..\\vendor\\autoload.php';

use FForattini\Factory\iFactory;
use FForattini\Factory\iProduct;

/**
 * On this test we will generate from a generic Factory concept and
 * specialize this object on a Cadillac factory.
 * 
 * PS: Here i'm just passing the factory to the object thinking on
 * the relation between both, this is optional.
 */

class CadillacFactory implements iFactory
{
	public function create($car)
	{
		if($car == 'Deville') return new Deville($this);
	}
}

/**
 * Like every single factory, it is specialized on few products, in
 * this case we are going to generate Deville 1958 cars.
 */

class Deville implements iProduct
{
	public $year = 1958;
    public function __construct(iFactory $factory)
    {
        $this->factory = $factory;
    }
}

/**
 * 
 */

class FactoryTest extends PHPUnit_Framework_TestCase
{
    public function testIfCanCreateCarFactory()
    {
    	$factory = new CadillacFactory();
    	$car = $factory->create('Deville');
        $this->assertEquals(is_null($car), false);
        $this->checkCarYear($car);
    }
    public function checkCarYear(iProduct $car)
    {
        $this->assertEquals($car->year, 1958);   
    }
}
