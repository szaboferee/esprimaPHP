<?php
namespace EsprimaPhp\Node\Declaration;
use EsprimaPhp\Node\Declaration;
use EsprimaPhp\Parser\Syntax;

/**
 * Class FunctionDeclaration
 */
class FunctionDeclaration extends Declaration
{
	/**
	 * @var string
	 */
	public $type = Syntax::FunctionDeclaration;

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
	 * @var BlockStatement|Expression
	 */
	public $body;

    /**
     * @var Identifier|null
     */
    public $rest;

    /**
	 * @var boolean;
	 */
	public $generator;

	/**
	 * @var boolean
	 */
	public $expression;

	/**
	 * @param EsprimaPHP $esprima
	 * @param Identifier $id
	 * @param Pattern[] $params
	 * @param Expression[] $defaults
	 * @param $body
	 *
	 * @return FunctionDeclaration
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