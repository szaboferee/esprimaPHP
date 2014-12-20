<?php
/**
 * Created by PhpStorm.
 * User: szaboferee
 * Date: 12/17/14
 * Time: 10:28 AM
 */

namespace EsprimaPhp;

class RegexLiteral {
	public $literal;

	public $value;

	/**
	 * @var Regex
	 */
	public $regex;

	public $start;

	public $end;

	function __construct($literal, $value, $regex = null, $start = null, $end = null)
	{
		$this->literal = $literal;
		$this->value = $value;
		$this->regex = $regex;
		$this->start = $start;
		$this->end = $end;
	}

} 