<?php
namespace EsprimaPhp\Node\Statement;

use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\Syntax;

class WhileStatement extends Statement
{
	/**
	 * @var string
	 */
	public $type = Syntax::WhileStatement;
	/**
	 * @var Statement
	 */
	public $body;
	/**
	 * @var Expression
	 */
	public $test;

	/**
	 * @param EsprimaPHP $esprima
	 * @param Expression $test
	 * @param Statement $body
	 */
	public function finish($esprima, $test, $body)
	{
		$this->test = $test;
		$this->body = $body;

		return $this->finishNode($esprima);
	}
} 