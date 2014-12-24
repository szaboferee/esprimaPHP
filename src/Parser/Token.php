<?php
namespace EsprimaPhp\Parser;

use EsprimaPhp\TokenName;
use InvalidArgumentException;

class Token {
	const BooleanLiteral = 1;
	const EOF = 2;
	const Identifier = 3;
	const Keyword = 4;
	const NullLiteral = 5;
	const NumericLiteral = 6;
	const Punctuator = 7;
	const StringLiteral = 8;
	const RegularExpression = 9;

	protected $lineNumber;
	protected $lineStart;
	protected $start;
	protected $end;
	/**
	 * @var Regex
	 */
	protected $regex;
	protected $startLineNumber;
	protected $startLineStart;
	protected $prec;
	protected $octal;

	public $type;
	public $value;

	public static function name($token)
	{
		switch($token) {
			case self::BooleanLiteral: return TokenName::BooleanLiteral;
			case self::EOF: return TokenName::EOF;
			case self::Identifier: return TokenName::Identifier;
			case self::Keyword: return TokenName::Keyword;
			case self::NullLiteral: return TokenName::NullLiteral;
			case self::NumericLiteral: return TokenName::NumericLiteral;
			case self::Punctuator: return TokenName::Punctuator;
			case self::StringLiteral: return TokenName::StringLiteral;
			case self::RegularExpression: return TokenName::RegularExpression;
			default: throw new InvalidArgumentException("Invalid token: {" . $token . "}");
		}
	}

	public function __construct($type, $value, $lineNumber = null, $lineStart= null, $start= null, $end= null){
		$this->type = $type;
		$this->value = $value;
		$this->lineNumber = $lineNumber;
		$this->lineStart = $lineStart;
		$this->start = $start;
		$this->end = $end;
	}

	public function __get($name)
	{
		return $this->$name;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}


}
