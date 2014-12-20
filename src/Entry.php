<?php
namespace EsprimaPhp;

class Entry {
	public $type;

	public $value;

	public $range;

	/**
	 * @var SourceLocation
	 */
	public $loc;
	/**
	 * @var Regex
	 */
	public $regex = null;

	function __construct($type, $value, $range, $loc)
	{
		$this->type = $type;
		$this->value = $value;
		$this->range = $range;
		$this->loc = $loc;
	}

}
