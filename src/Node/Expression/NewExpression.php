<?php
namespace EsprimaPhp\Node\Expression;
use EsprimaPhp\Node\Expression;
use EsprimaPhp\Parser\Syntax;
use EsprimaPhp\Parser;
use EsprimaPhp\Util\ArrayList;

/**
 * Class NewExpression
 */
class NewExpression extends Expression
{
    /**
     * @var string
     */
    public $type = Syntax::NEW_EXPRESSION;

    /**
     * @var Expression
     */
    public $callee;

    /**
     * @var Expression[]
     */
    public $arguments;

    /**
     * @param Parser     $esprima
     * @param Expression $callee
     * @param ArrayList  $args
     *
     * @return NewExpression
     */
    public function finish($esprima, $callee, $args)
    {
        $this->callee = $callee;
        $this->arguments = $args;
        return $this->finishNode($esprima);
    }

} 