<?php

namespace EsprimaPhp\Node;
use EsprimaPhp\Parser\Node;
use EsprimaPhp\Parser\Syntax;

class SwitchCase extends Node
{
	public $type = Syntax::SwitchCase;
	public $test;
	public $consequent;

	public function finish($esprima, $test, $consequent) {
		$this->test = $test;
		$this->consequent = $consequent;

		return $this->finishNode($esprima);
	}
}