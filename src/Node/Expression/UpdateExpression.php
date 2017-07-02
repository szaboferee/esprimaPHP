<?php

namespace EsprimaPhp\Node\Expression;

use EsprimaPhp\Parser\Syntax;

class UpdateExpression extends UnaryExpression
{
    /**
     * @var string
     */
    public $type = Syntax::UPDATE_EXPRESSION;
}