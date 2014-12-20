<?php
namespace EsprimaPhp\Node\Expression;
use EsprimaPhp\Node\Expression;
use EsprimaPhp\Parser\Syntax;
use EsprimaPhp\Parser;

class UpdateExpression extends UnaryExpression
{
	/**
	 * @var string
	 */
	public $type = Syntax::UpdateExpression;
}