<?php
namespace EsprimaPhp\Node\Expression;
use EsprimaPhp\Node\Expression;
use EsprimaPhp\Node\Identifier;
use EsprimaPhp\Node\Statement\BlockStatement;
use EsprimaPhp\Parser\Syntax;
use EsprimaPhp\Parser;
use EsprimaPhp\Util\ArrayList;

/**
 * Class FunctionExpression
 */
class FunctionExpression extends Expression
{
	/**
	 * @var string
	 */
	public $type = Syntax::FunctionExpression;

	/**
	 * @var Identifier|null
	 */
	public $id;

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
	 * @param Parser $esprima
	 * @param Identifier|null $id
	 * @param ArrayList $params
	 * @param ArrayList $defaults
	 * @param BlockStatement|Expression $body
	 *
	 * @return FunctionExpression
	 */
	public function finish($esprima, $id, $params, $defaults, $body)
	{
		$this->id = $id;
		$this->params = $params;
		$this->defaults = $defaults;
		$this->body = $body;
		$this->rest = null;
		$this->generator = false;
		$this->expression = false;

		return $this->finishNode($esprima);
	}

} 