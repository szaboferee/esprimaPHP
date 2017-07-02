<?php

namespace EsprimaPhp\Node\Expression;

use EsprimaPhp\Node\Expression;
use EsprimaPhp\Parser;
use EsprimaPhp\Parser\Syntax;
use EsprimaPhp\Util\ArrayList;

/**
 * Class CallExpression
 */
class CallExpression extends Expression
{
    /**
     * @var string
     */
    public $type = Syntax::CALL_EXPRESSION;

    /**
     * @var Expression
     */
    public $callee;

    /**
     * @var Expression[]
     */
    public $arguments;

    /**
     * @param Parser $esprima
     * @param ArrayList $callee
     * @param ArrayList $args
     *
     * @return CallExpression
     */
    public function finish($esprima, $callee, $args)
    {
        $this->callee = $callee;
        $this->arguments = $args;
        return $this->finishNode($esprima);
    }

} 