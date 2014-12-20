<?php
namespace EsprimaPhp\Parser;

use EsprimaPhp\Parser;

class Position
{
	/**
	 * @var integer
	 */
	public $line;

	/**
	 * @var integer
	 */
	public $column;

	/**
	 * @param integer $line
	 * @param integer$column
	 */
	function __construct($line, $column) {
		$this->line = $line;
		$this->column = $column;
	}

	/**
	 * @param Parser $parser
	 * @return Position
	 */
	public static function createFromParser($parser) {
		return new self(
			$parser->lineNumber,
			$parser->index - $parser->lineStart
		);
	}
}