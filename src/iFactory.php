<?php

namespace FForattini\Factory;

/**
 * iFactory
 * 
 * @link https://www.wikiwand.com/en/Abstract_factory_pattern
 */
interface iFactory
{

	/**
	 * Fabricates new product based on factory's specialization.
	 * 
	 * @param  string $args
	 * @return AbstractProduct
	 */
	public function create($args);

}