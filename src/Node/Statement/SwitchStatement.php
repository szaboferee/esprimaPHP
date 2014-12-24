<?php

namespace EsprimaPhp\Node\Statement;

use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\Syntax;

class SwitchStatement extends Statement
{
	/**
	 * @var string
	 */
	public $type = Syntax::SWITCH_STATEMENT;
	/**
	 * @var Expression
	 */
	public $discriminant;
	/**
	 * @var SwitchCase[]
	 */
	public $cases;

	/**
	 * @param EsprimaPHP $esprima
	 * @param Expression $discriminant
	 * @param SwitchCase[] $cases
	 */
	public function finish($esprima, $discriminant, $cases) {
		$this->discriminant = $discriminant;
		$this->cases = $cases;

		return $this->finishNode($esprima);
	}
} 