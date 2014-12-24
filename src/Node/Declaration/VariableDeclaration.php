<?php
namespace EsprimaPhp\Node\Declaration;
use EsprimaPhp\Node\Declaration;
use EsprimaPhp\Parser\Syntax;
use EsprimaPhp\Parser;
use EsprimaPhp\Util\ArrayList;

/**
 * Class VariableDeclaration
 */
class VariableDeclaration extends Declaration
{
	/**
	 * @var string
	 */
	public $type = Syntax::VARIABLE_DECLARATION;

	/**
	 * @var VariableDeclarator[]
	 */
	public $declarations;

	/**
	 * @var string "var" | "let" | "const"
	 */
	public $kind;

	/**
	 * @param Parser $esprima
	 * @param ArrayList $declarations
	 * @param string $kind
	 *
	 * @return VariableDeclaration
	 */
	public function finish($esprima, $declarations, $kind)
	{
		$this->declarations = $declarations;
		$this->kind = $kind;

		return $this->finishNode($esprima);
	}

} 