<?php

namespace EsprimaPhp\Node;
use EsprimaPhp\Parser\Node;
use EsprimaPhp\Parser\Syntax;

class Program extends Node
{
	/**
	 * @var string
	 */
	public $type = Syntax::PROGRAM;
	/**
	 * @var Statement[]
	 */
	public $body;

	function finish($esprima, $body)
	{
		$this->body = $body;
		return $this->finishNode($esprima);
	}

} 