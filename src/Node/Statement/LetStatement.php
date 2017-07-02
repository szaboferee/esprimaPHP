<?php

namespace EsprimaPhp\Node\Statement;

use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\Syntax;

class LetStatement extends Statement
{
    /**
     * @var string
     */
    public $type = Syntax::LET_STATEMENT;
    /**
     * @var VariableDeclarator[]
     */
    public $head;
    /**
     * @var Statement
     */
    public $body;

    public function finish($esprima, $head, $body)
    {
        $this->head = $head;
        $this->body = $body;
        return $this->finishNode($esprima);
    }


} 