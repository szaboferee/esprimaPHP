<?php
namespace EsprimaPhp\Node\Statement;

use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\Syntax;

class LabeledStatement extends Statement
{
    /**
     * @var string
     */
    public $type = Syntax::LABELED_STATEMENT;
    /**
     * @var Identifier
     */
    public $label;
    /**
     * @var Statement
     */
    public $body;

    function finish($esprima, $label, $body)
    {
        $this->label = $label;
        $this->body = $body;
        return $this->finishNode($esprima);
    }

} 