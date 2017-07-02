<?php

namespace EsprimaPhp\Util;


class MutableNode
{

    public $startToken;
    public $esprima;

    function __construct($esprima, $startToken = null)
    {
        $this->esprima = clone $esprima;
        $this->startToken = $startToken ? clone $startToken : null;
    }

    /**
     * @param string $nodeClass
     * @param \EsprimaPhp\Parser $esprima
     *
     * @return Node
     */
    public function finish($nodeClass, $esprima)
    {
        $args = func_get_args();
        $nodeClass = array_shift($args); // nodeclass
        $node = new $nodeClass($this->esprima, $this->startToken);
        return call_user_func_array(array($node, 'finish'), $args);
    }
} 