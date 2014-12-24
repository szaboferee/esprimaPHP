<?php
namespace EsprimaPhp\Node\Expression;
use EsprimaPhp\Node\Expression;
use EsprimaPhp\Parser\Syntax;

/**
 * Class ArrowFunctionExpression
 */
class ArrowFunctionExpression extends Expression
{
	/**
	 * @var string
	 */
	public $type = Syntax::ARROW_FUNCTION_EXPRESSION;

    public $id = null;

	/**
	 * @var Pattern[]
	 */
	public $params;

	/**
	 * @var Expression[]
	 */
	public $defaults;

	/**
	 * @var BlockStatement | Expression
	 */
	public $body;

	/**
	 * @var Identifier|null
	 */
	public $rest;

	/**
	 * @var boolean
	 */
	public $generator;

	/**
	 * @var boolean
	 */
	public $expression;

	/**
	 * @param EsprimaPHP $esprima
	 * @param ArrayList $params
	 * @param ArrayList $defaults
	 * @param BlockStatement| Expression $body
	 * @param ArrayList $expression
	 *
	 * @return ArrowFunctionExpression
	 */
	public function finish($esprima, $params, $defaults, $body, $expression)
	{
		$this->params = $params;
		$this->defaults = $defaults;
		$this->body = $body;
		$this->rest = null;
		$this->generator = false;
		$this->expression = $expression;
		return $this->finishNode($esprima);
	}

} 