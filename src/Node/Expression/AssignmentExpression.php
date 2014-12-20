<?php
namespace EsprimaPhp\Node\Expression;
use EsprimaPhp\Node\Expression;
use EsprimaPhp\Parser\Syntax;

/**
 * Class AssignmentExpression
 */
class AssignmentExpression extends Expression
{
	/**
	 * @var string
	 */
	public $type = Syntax::AssignmentExpression;

	/**
	 * @var AssignmentOperator
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
	 * @param EsprimaPHP $esprima
	 * @param AssignmentOperator $operator
	 * @param Expression $left
	 * @param Expression $right
	 *
	 * @return AssignmentExpression
	 */
	public function finish($esprima, $operator, $left, $right)
	{
		$this->operator = $operator;
		$this->left = $left;
		$this->right = $right;

		return $this->finishNode($esprima);
	}

} 