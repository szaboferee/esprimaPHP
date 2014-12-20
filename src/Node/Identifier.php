<?php

namespace EsprimaPhp\Node;

use EsprimaPhp\Parser\Syntax;

class Identifier extends Expression
{
	public $type = Syntax::Identifier;
	public $name;

	/**
	 * @param $esprima
	 * @param $name
	 * @return \EsprimaPhp\Node\Expression\Identifier
	 */
	public function finish($esprima, $name)
	{
		$this->name = $name;
		return $this->finishNode($esprima);
	}

} 