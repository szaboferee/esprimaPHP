<?php

namespace EsprimaPhp\Node\Expression;
use EsprimaPhp\Node\Expression;
use EsprimaPhp\Parser\Syntax;

/**
 * Class Literal
 */
class Literal extends Expression
{
	/**
	 * @var string
	 */
	public $type = Syntax::Literal;

	/**
	 * @var mixed
	 */
	public $value;

	/**
	 * @var string
	 */
	public $raw;

	/**
	 * @param EsprimaPHP $esprima
	 * @param $token
	 *
	 * @return Literal
	 */
	public function finish($esprima, $token) {
		$this->value = $token->value;
        if(is_numeric($this->value)) {
            $this->value = intval($this->value);
        }
		$this->raw = $esprima->source->slice($token->start, $token->end);
		if ($token->regex) {
			$this->regex = $token->regex;
		}
		return $this->finishNode($esprima);
	}
}