<?php

namespace EsprimaPhp\Util;

use ArrayAccess;
use Countable;
use JsonSerializable;

class ArrayList implements ArrayAccess, Countable, JsonSerializable {
	private $array = array();

	function __construct($array = array())
	{
		$this->array = $array;
	}

	public function offsetExists($offset)
	{
		return array_key_exists($offset, $this->array);
	}

	public function offsetGet($offset)
	{
		if (!array_key_exists($offset, $this->array)) {
            return null;
        }
		return $this->array[$offset];
	}

	public function offsetSet($offset, $value)
	{
		if (is_null($offset)) {
			$this->array[] = $value;
		} else {
			$this->array[$offset] = $value;
		}
	}

	public function offsetUnset($offset)
	{
		unset($this->array[$offset]);
	}

	public function pop()
	{
		return array_pop($this->array);
	}

	public function push($value) {
		$this->array[] = $value;
	}

	public function count()
	{
		return count($this->array);
	}

	public function jsonSerialize()
	{
		return array_values($this->array);
	}
}