<?php
namespace EsprimaPhp\Node\Statement;

use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\Syntax;

class ReturnStatement extends Statement
{
    /**
     * @var string
     */
    public $type = Syntax::RETURN_STATEMENT;
    /**
     * @var Expression|null
     */
    public $argument;

    /**
     * @param EsprimaPHP      $esprima
     * @param Expression|null $argument
     */
    public function finish($esprima, $argument = null) 
    {
        $this->argument = $argument;

        return $this->finishNode($esprima);
    }
} 