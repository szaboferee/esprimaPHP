<?php
namespace EsprimaPhp\Node\Expression;
use EsprimaPhp\Node\Expression;
use EsprimaPhp\Parser\Syntax;
use EsprimaPhp\Parser;
use EsprimaPhp\Util\ArrayList;

/**
 * Class ObjectExpression
 */
class ObjectExpression extends Expression
{
	/**
	 * @var string
	 */
	public $type = Syntax::OBJECT_EXPRESSION;

	/**
	 * @var Property[]
	 */
	public $properties;

	/**
	 * @param Parser $esprima
	 * @param ArrayList $properties
	 *
	 * @return ObjectExpression
	 */
	public function finish($esprima, $properties)
	{
		$this->properties = $properties;
		return $this->finishNode($esprima);
	}

} 