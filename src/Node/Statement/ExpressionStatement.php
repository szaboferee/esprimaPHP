<?php
namespace EsprimaPhp\Node\Statement;

use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\Syntax;

class ExpressionStatement extends Statement
{
    /**
     * @var string
     */
    public $type = Syntax::EXPRESSION_STATEMENT;
    /**
     * @var Expression
     */
    public $expression;

    public function finish($esprima, $expression)
    {
        $this->expression = $expression;
        return $this->finishNode($esprima);
    }

} 