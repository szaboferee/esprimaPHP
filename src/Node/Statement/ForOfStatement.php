<?php

namespace EsprimaPhp\Node\Statement;

use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\Syntax;

class ForOfStatement extends Statement {
	public $type = Syntax::ForOfStatement;
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
	 * @param EsprimaPHP $esprima
	 * @param VariableDeclaration| Expression $left
	 * @param Expression $right
	 * @param Statement $body
	 */
	public function finish($esprima, $left, $right, $body) {
		$this->left = $left;
		$this->right = $right;
		$this->body = $body;
		return $this->finishNode($esprima);
	}

} 