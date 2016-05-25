<?php

namespace FForattini\Factory;

/**
 * iFactory
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