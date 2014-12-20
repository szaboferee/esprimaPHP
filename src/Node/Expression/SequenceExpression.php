<?php
namespace EsprimaPhp\Node\Expression;

use EsprimaPhp\Node\Expression;
use EsprimaPhp\Parser\Syntax;

class SequenceExpression extends Expression
{
	/**
	 * @var string
	 */
	public $type = Syntax::SequenceExpression;
	/**
	 * @var Expression[]
	 */
	public $expressions;

	/**
	 * @param EsprimaPHP $esprima
	 * @param ArrayList $expressions
	 *
	 * @return SequenceExpression
	 */
	public function finish($esprima, $expressions)
	{
		$this->expressions = $expressions;
		return $this->finishNode($esprima);
	}

} 