<?php

namespace EsprimaPhp\Node\Expression;

use EsprimaPhp\Node\Expression;
use EsprimaPhp\Parser\Syntax;

/**
 * Class ConditionalExpression
 */
class ConditionalExpression extends Expression
{
    /**
     * @var string
     */
    public $type = Syntax::CONDITIONAL_EXPRESSION;

    /**
     * @var Expression
     */
    public $test;

    /**
     * @var Expression
     */
    public $consequent;

    /**
     * @var Expression
     */
    public $alternate;


    /**
     * @param EsprimaPHP $esprima
     * @param Expression $test
     * @param Expression $consequent
     * @param Expression $alternate
     *
     * @return ConditionalExpression
     */
    public function finish($esprima, $test, $consequent, $alternate)
    {
        $this->test = $test;
        $this->alternate = $alternate;
        $this->consequent = $consequent;

        return $this->finishNode($esprima);
    }

} 