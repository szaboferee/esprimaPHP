<?php

namespace EsprimaPhp\Node\Expression;

use EsprimaPhp\Node\Expression;
use EsprimaPhp\Parser;
use EsprimaPhp\Parser\Syntax;

class UnaryExpression extends Expression
{
    /**
     * @var string
     */
    public $type = Syntax::UNARY_EXPRESSION;

    /**
     * @var UnaryOperator
     */
    public $operator;

    /**
     * @var Expression
     */
    public $argument;

    /**
     * @var
     */
    public $prefix;

    /**
     * @param Parser $esprima
     * @param UnaryOperator $operator
     * @param Expression $argument
     *
     * @return UnaryExpression
     */
    public function finish($esprima, $operator, $argument)
    {
        $this->operator = $operator;
        $this->argument = $argument;
        $this->prefix = true;
        return $this->finishNode($esprima);
    }

} 