<?php
namespace EsprimaPhp\Node\Statement;

use EsprimaPhp\Node\Statement;
use EsprimaPhp\Parser\EsprimaPHP;
use EsprimaPhp\Parser\Node;
use EsprimaPhp\Parser\Position;
use EsprimaPhp\Parser\Syntax;

class EmptyStatement extends Statement
{
	public $type = Syntax::EMPTY_STATEMENT;

	public function finish($esprima)
	{
		return $this->finishNode($esprima);
	}


} 