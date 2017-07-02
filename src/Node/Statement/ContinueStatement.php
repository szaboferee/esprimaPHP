<?php

namespace EsprimaPhp\Node\Statement;

use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\Syntax;

/**
 * Class ContinueStatement
 */
class ContinueStatement extends Statement
{
    /**
     * @var string
     */
    public $type = Syntax::CONTINUE_STATEMENT;
    /**
     * @var Identifier|null
     */
    public $label;

    /**
     * @param EsprimaPHP $esprima
     * @param $label
     *
     * @return ContinueStatement
     */
    public function finish($esprima, $label)
    {
        $this->label = $label;
        return $this->finishNode($esprima);
    }

} 