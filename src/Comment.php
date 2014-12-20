<?php
namespace EsprimaPhp;

class Comment {
	public $value;
	public $type;
	public $range;
	/**
	 * @var SourceLocation
	 */
	public $loc;
	function __construct($type, $value)	{
		$this->type = $type;
		$this->value = $value;
	}
}