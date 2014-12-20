<?php
namespace EsprimaPhp\Node\Expression;
use EsprimaPhp\Node\Expression;
use EsprimaPhp\Node\Identifier;
use EsprimaPhp\Parser\Node;
use EsprimaPhp\Parser\Syntax;
use EsprimaPhp\Parser;

/**
 * Class MemberExpression
 */
class MemberExpression extends Node
{
	/**
	 * @var string
	 */
	public $type = Syntax::MemberExpression;

	/**
	 * @var Expression
	 */
	public $object;

	/**
	 * @var Identifier|Expression
	 */
	public $property;

	/**
	 * @var boolean
	 */
	public $computed;

	/**
	 * @param Parser $esprima
	 * @param string $accessor
	 * @param Expression $object
	 * @param Identifier|Expression $property
	 *
	 * @return MemberExpression
	 */
	public function finish($esprima, $accessor, $object, $property)
	{
		$this->object = $object;
		$this->property = $property;
		$this->computed = $accessor === '[';

		return $this->finishNode($esprima);
	}

} 