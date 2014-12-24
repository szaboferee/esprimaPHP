<?php

namespace EsprimaPhp\Node\Expression;
use EsprimaPhp\Node\Expression;
use EsprimaPhp\Parser\Syntax;
use EsprimaPhp\Parser;

/**
 * Class BinaryExpression
 */
class BinaryExpression extends Expression
{
	/**
	 * @var string
	 */
	public $type = Syntax::BINARY_EXPRESSION;

	/**
	 * @var BinaryOperator
	 */
	public $operator;

	/**
	 * @var Expression
	 */
	public $left;

	/**
	 * @var Expression
	 */
	public $right;

	/**
	 * @param Parser $esprima
	 * @param BinaryOperator $operator
	 * @param Expression $left
	 * @param Expression $right
	 *
	 * @return BinaryExpression
	 */
	public function finish($esprima, $operator, $left, $right)
	{
		$this->operator = $operator;
		$this->left = $left;
		$this->right = $right;
		return $this->finishNode($esprima);
	}

} 