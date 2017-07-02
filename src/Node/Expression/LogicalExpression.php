<?php

namespace EsprimaPhp\Node\Expression;

use EsprimaPhp\Parser\Syntax;

class LogicalExpression extends BinaryExpression
{
    /**
     * @var string
     */
    public $type = Syntax::LOGICAL_EXPRESSION;
}