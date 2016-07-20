<?php
namespace FForattini\Patterns\AbstractFactory;

interface FactoryInterface
{

	/**
	 * Fabricates new product based on factory's specialization.
	 * 
	 * @param  string $args
	 * @return AbstractProduct
	 */
	public function create(...$args);

}