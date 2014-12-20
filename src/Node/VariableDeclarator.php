<?php

namespace EsprimaPhp\Node;

use EsprimaPhp\Parser\Node;
use EsprimaPhp\Parser\Syntax;

class VariableDeclarator extends Node
{
	/**
	 * @var string
	 */
	public $type = Syntax::VariableDeclarator;
	/**
	 * @var Pattern
	 */
	public $id;
	/**
	 * @var Expression|null
	 */
	public $init;

	/**
	 * @param $esprima
	 * @param $id
	 * @param $init
	 *
	 * @return $this
	 */
	public function finish($esprima, $id, $init)
	{
		$this->id = $id;
		$this->init = $init;
		return $this->finishNode($esprima);
	}

} 