<?php

require __dir__.'\\..\\vendor\\autoload.php';

use FForattini\Factory\iFactory;
use FForattini\Factory\iProduct;

/**
 * In this example we will generate a Cadillac factory from a generic
 * Factory concept from our iFactory interface.
 * 
 * Here i'm just passing the factory to the object minding on relation
 * database and to show that the car can receive an iFactory object,
 * but ofc this is an optional setting.
 */

class CadillacFactory implements iFactory
{
	public function create(...$args)
	{
		if($args[0] == 'Deville') return new Deville($this);
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
 * Steps:
 * 1 - Create a Cadillac factory and check if it was created.
 * 2 - Ask to create a Deville model and check if it was created.
 * 3 - Check which year it was build.
 */

class FactoryTest extends PHPUnit_Framework_TestCase
{
    public function testIfCanCreateCarFactory()
    {
    	$factory = new CadillacFactory();
        $this->assertEquals(is_null($factory), false);
    	$car = $factory->create('Deville');
        $this->assertEquals(is_null($car), false);
        $this->checkCarYear($car);
    }
    public function checkCarYear(iProduct $car)
    {
        $this->assertEquals($car->year, 1958);   
    }
}
