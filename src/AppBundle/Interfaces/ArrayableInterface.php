<?php
namespace AppBundle\Interfaces;

interface ArrayableInterface{
	/**
	 * Converts object to Array() (So it can be converted later to JSON using json_encode)
	 * @param array $options
	 */
	public function toArray($options = array());
}