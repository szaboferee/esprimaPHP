<?php
namespace EsprimaPhp\Node\Expression;
use EsprimaPhp\Node\Expression;
use EsprimaPhp\Parser\Syntax;

/**
 * Class PostfixExpression
 */
class PostfixExpression extends Expression
{
	public $type = Syntax::UpdateExpression;
	public $operator;
	public $argument;
	public $prefix;

	public function finish($esprima, $operator, $argument)
	{
		$this->operator = $operator;
		$this->argument = $argument;
		$this->prefix = false;
		return $this->finishNode($esprima);
	}

} 