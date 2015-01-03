<?php
namespace EsprimaPhp\Node\Expression;
use EsprimaPhp\Node\Expression;
use EsprimaPhp\Parser\Syntax;
use EsprimaPhp\Util\ArrayList;

/**
 * Class ArrayExpression
 */
class ArrayExpression extends Expression
{
    /**
     * @var string
     */
    public $type = Syntax::ARRAY_EXPRESSION;

    /**
     * @var Expression[]|null[]
     */
    public $elements;

    /**
     * @param \EsprimaPhp\Parser $esprima
     * @param ArrayList          $elements
     *
     * @return ArrayExpression
     */
    public function finish($esprima, $elements)
    {
        $this->elements = $elements;
        return $this->finishNode($esprima);
    }

} 