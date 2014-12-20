<?php

namespace EsprimaPhp;

use ArrayAccess;
use JsonSerializable;

class SourceString implements ArrayAccess, JsonSerializable
{
	private $string = '';
	public function __construct($string) {
		$this->string = $string;
	}
	public function __toString() {
		return $this->string;
	}
	public function charCodeAt($index) {
		$char = mb_substr($this->string, $index, 1, 'UTF-8');

		if (mb_check_encoding($char, 'UTF-8')) {
			$ret = mb_convert_encoding($char, 'UTF-32BE', 'UTF-8');
			return hexdec(bin2hex($ret));
		} else {
			return null;
		}
	}
	public function slice($start, $end){
		$end = $end - $start;
		return substr($this->string, $start, $end);
	}

	/**
	 * (PHP 5 &gt;= 5.0.0)<br/>
	 * Offset to retrieve
	 * @link http://php.net/manual/en/arrayaccess.offsetget.php
	 * @param mixed $offset <p>
	 * The offset to retrieve.
	 * </p>
	 * @return mixed Can return all value types.
	 */
	public function offsetGet($offset)
	{
		return new SourceString($this->string[$offset]);
	}

	public function offsetExists($offset)
	{
		return strlen($this->string) > $offset;
	}

	public function offsetSet($offset, $value){}
	public function offsetUnset($offset){}

	/**
	 * (PHP 5 &gt;= 5.4.0)<br/>
	 * Specify data which should be serialized to JSON
	 * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
	 * @return mixed data which can be serialized by <b>json_encode</b>,
	 * which is a value of any type other than a resource.
	 */
	public function jsonSerialize()
	{
		return $this->string;
	}
}