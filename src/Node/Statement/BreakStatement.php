<?php

namespace EsprimaPhp\Node\Statement;

use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\Syntax;

/**
 * Class BreakStatement
 */
class BreakStatement extends Statement
{
    /**
     * @var string
     */
    public $type = Syntax::BREAK_STATEMENT;
    /**
     * @var Identifier
     */
    public $label;

    /**
     * @param EsprimaPHP $esprima
     * @param $label
     *
     * @return BreakStatement
     */
    function finish($esprima, $label)
    {
        $this->label = $label;
        return $this->finishNode($esprima);
    }

} 