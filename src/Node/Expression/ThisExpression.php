<?php

namespace EsprimaPhp\Node\Expression;

use EsprimaPhp\Node\Expression;
use EsprimaPhp\Parser\Syntax;

class ThisExpression extends Expression
{
    /**
     * @var string
     */
    public $type = Syntax::THIS_EXPRESSION;

    public function finish($esprima)
    {
        return $this->finishNode($esprima);
    }


}