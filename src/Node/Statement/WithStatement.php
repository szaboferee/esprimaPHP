<?php

namespace EsprimaPhp\Node\Statement;

use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\Syntax;

class WithStatement extends Statement
{
    /**
     * @var string
     */
    public $type = Syntax::WITH_STATEMENT;
    /**
     * @var Expression
     */
    public $object;
    /**
     * @var Statement;
     */
    public $body;

    /**
     * @param EsprimaPHP $esprima
     * @param Expression $object
     * @param Statement $body
     */
    public function finish($esprima, $object, $body)
    {
        $this->object = $object;
        $this->body = $body;
        return $this->finishNode($esprima);
    }

} 