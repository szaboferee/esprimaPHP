<?php

namespace EsprimaPhp\Node\Statement;

use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\Syntax;

class IfStatement extends Statement
{
    /**
     * @var string
     */
    public $type = Syntax::IF_STATEMENT;
    /**
     * @var Expression
     */
    public $test;
    /**
     * @var  Statement
     */
    public $consequent;
    /**
     * @var Statement|null
     */
    public $alternate;

    public function finish($esprima, $test, $consequent, $alternate)
    {
        $this->test = $test;
        $this->consequent = $consequent;
        $this->alternate = $alternate;

        return $this->finishNode($esprima);
    }
}