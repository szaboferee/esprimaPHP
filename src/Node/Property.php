<?php

namespace EsprimaPhp\Node;

use EsprimaPhp\Node\Expression\Literal;
use EsprimaPhp\Parser;
use EsprimaPhp\Parser\Node;
use EsprimaPhp\Parser\Syntax;

class Property extends Node
{
    /**
     * @var string
     */
    public $type = Syntax::PROPERTY;

    /**
     * @var Literal|Identifier
     */
    public $key;

    /**
     * @var Expression
     */
    public $value;

    /**
     * @var string "init" | "get" | "set"
     */
    public $kind;

    /**
     * @param Parser $esprima
     * @param string $kind
     * @param Literal|Identifier $key
     * @param Expression $value
     *
     * @return Property
     */
    public function finish($esprima, $kind, $key, $value)
    {
        $this->key = $key;
        $this->value = $value;
        $this->kind = $kind;
        return $this->finishNode($esprima);
    }

} 