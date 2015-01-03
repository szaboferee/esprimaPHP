<?php
namespace EsprimaPhp\Node\Statement;

use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\Syntax;
use EsprimaPhp\Parser;

class DebuggerStatement extends Statement
{
    public $type = Syntax::DEBUGGER_STATEMENT;

    public function finish($esprima)
    {
        return parent::finishNode($esprima);
    }


} 