<?php

namespace EsprimaPhp\Node\Statement;

use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\Syntax;

class DoWhileStatement extends Statement
{
    /**
     * @var string
     */
    public $type = Syntax::DO_WHILE_STATEMENT;
    /**
     * @var Statement
     */
    public $body;
    /**
     * @var Expression
     */
    public $test;

    public function finish($esprima, $body, $test) 
    {
        $this->body = $body;
        $this->test = $test;
        return $this->finishNode($esprima);

    }
} 