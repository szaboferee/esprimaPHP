<?php
namespace EsprimaPhp\Node;

use EsprimaPhp\Parser\Node;
use EsprimaPhp\Parser\Syntax;

class CatchClause extends Node
{
		public $type = Syntax::CatchClause;
	public $param;
	public $body;

	public function finish($esprima, $param, $body) {
		$this->param = $param;
		$this->body = $body;
		return $this->finishNode($esprima);
	}}