<?php
namespace EsprimaPhp\Node\Statement;

class LetStatement extends Statement
{
	/**
	 * @var string
	 */
	public $type = Syntax::LetStatement;
	/**
	 * @var VariableDeclarator[]
	 */
	public $head;
	/**
	 * @var Statement
	 */
	public $body;

	public function finish($esprima, $head, $body)
	{
		$this->head = $head;
		$this->body = $body;
		return parent::finish($esprima);
	}


} 