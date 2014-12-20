<?php

namespace EsprimaPhp\Node\Expression;
use EsprimaPhp\Node\Expression;
use EsprimaPhp\Parser\Syntax;

/**
 * Class ConditionalExpression
 */
class ConditionalExpression extends Expression
{
	/**
	 * @var string
	 */
	public $type = Syntax::ConditionalExpression;

	/**
	 * @var Expression
	 */
	public $test;

	/**
	 * @var Expression
	 */
	public $alternate;

	/**
	 * @var Expression
	 */
	public $consequent;

	/**
	 * @param EsprimaPHP $esprima
	 * @param Expression $test
	 * @param Expression $consequent
	 * @param Expression $alternate
	 *
	 * @return ConditionalExpression
	 */
	public function finish($esprima, $test, $consequent, $alternate)
	{
		$this->test = $test;
		$this->alternate = $alternate;
		$this->consequent = $consequent;

		return $this->finishNode($esprima);
	}

} 