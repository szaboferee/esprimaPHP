<?php
namespace EsprimaPhp\Node\Statement;

use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\Syntax;

class WhileStatement extends Statement
{
	/**
	 * @var string
	 */
	public $type = Syntax::WHILE_STATEMENT;
	/**
	 * @var Expression
	 */
	public $test;
	/**
	 * @var Statement
	 */
	public $body;

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