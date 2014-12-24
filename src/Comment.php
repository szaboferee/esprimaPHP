<?php
namespace EsprimaPhp;

use EsprimaPhp\Parser\Node;

class Comment extends Node{
	public $type;
	public $value;

	function __construct($type, $value)	{
		$this->type = $type;
		$this->value = $value;
	}
}