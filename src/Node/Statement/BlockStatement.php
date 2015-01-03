<?php

namespace EsprimaPhp\Node\Statement;

use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\Syntax;

/**
 * Class BlockStatement
 */
class BlockStatement extends Statement
{
    /**
     * @var string
     */
    public $type = Syntax::BLOCK_STATEMENT;
    /**
     * @var Statement[]
     */
    public $body;

    /**
     * @param EsprimaPHP $esprima
     * @param $body
     *
     * @return BlockStatement
     */
    public function finish($esprima, $body)
    {
        $this->body = $body;
        return $this->finishNode($esprima);
    }


} 