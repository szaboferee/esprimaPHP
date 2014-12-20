<?php
namespace EsprimaPhp\Node\Statement;

use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\Syntax;

class TryStatement extends Statement
{
	/**
	 * @var string
	 */
	public $type = Syntax::TryStatement;
	/**
	 * @var BlockStatement
	 */
	public $block;
	/**
	 * @var CatchClause| null
	 */
	public $handlers;
	/**
	 * @var CatchClause[]
	 */
	public $guardedHandlers;
	/**
	 * @var BlockStatement|null
	 */
	public $finalizer;

	public function finish($esprima, $block, $guardedHandlers, $handlers = null, $finalizer = null) {
		$this->block = $block;
		$this->guardedHandlers = $guardedHandlers;
		$this->handlers = $handlers;
		$this->finalizer = $finalizer;

		return $this->finishNode($esprima);
	}
} 