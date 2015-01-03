<?php
namespace EsprimaPhp\Node\Expression;
use EsprimaPhp\Node\Expression;
use EsprimaPhp\Parser\Syntax;
use EsprimaPhp\Parser;

class LogicalExpression extends BinaryExpression
{
    /**
     * @var string
     */
    public $type = Syntax::LOGICAL_EXPRESSION;
}