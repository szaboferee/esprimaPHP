<?php

namespace EsprimaPhp\Node\Statement;

use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\Syntax;

class ThrowStatement extends Statement
{
    /**
     * @var string
     */
    public $type = Syntax::THROW_STATEMENT;
    /**
     * @var Expression
     */
    public $argument;

    /**
     * @param EsprimaPHP $esprima
     * @param Expression $argument
     */
    public function finish($esprima, $argument)
    {
        $this->argument = $argument;

        return $this->finishNode($esprima);
    }
} 