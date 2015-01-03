<?php
namespace EsprimaPhp\Node\Statement;
use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\Syntax;

class ForInStatement extends Statement
{
    /**
     * @var string
     */
    public $type = Syntax::FOR_IN_STATEMENT;
    /**
     * @var VariableDeclaration | Expression
     */
    public $left;
    /**
     * @var Expression
     */
    public $right;
    /**
     * @var Statement
     */
    public $body;
    /**
     * @var boolean
     */
    public $each;

    /**
     * @param EsprimaPHP                      $esprima
     * @param VariableDeclaration| Expression $left
     * @param Expression                      $right
     * @param Statement                       $body
     */
    public function finish($esprima, $left, $right, $body) 
    {
        $this->left = $left;
        $this->right = $right;
        $this->body = $body;
        $this->each = false;

        return $this->finishNode($esprima);
    }
} 