<?php
namespace EsprimaPhp\Node\Statement;

class ForStatement extends Statement
{
	/**
	 * @var string
	 */
	public $type = Syntax::ForStatement;
	/**
	 * @var VariableDeclaration | Expression | null
	 */
	public $init;
	/**
	 * @var Expression | null
	 */
	public $test;
	/**
	 * @var Expression| null
	 */
	public $update;
	/**
	 * @var Statement
	 */
	public $body;

	public function finish($esprima, $init, $test, $update, $body) {
		$this->init = $init;
		$this->test = $test;
		$this->update = $update;
		$this->body = $body;

		return parent::finish($esprima);
	}
} 