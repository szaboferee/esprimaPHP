<?php

namespace EsprimaPhp\Parser;

use EsprimaPhp\TokenName;
use InvalidArgumentException;

class Token implements \JsonSerializable
{
    const BOOLEAN_LITERAL = 1;
    const EOF = 2;
    const IDENTIFIER = 3;
    const KEYWORD = 4;
    const NULL_LITERAL = 5;
    const NUMERIC_LITERAL = 6;
    const PUNCTUATOR = 7;
    const STRING_LITERAL = 8;
    const REGULAR_EXPRESSION = 9;
    public $type;
    public $value;
    /**
     * @var Regex
     */
    public $regex;
    protected $lineNumber;
    protected $lineStart;
    protected $start;
    protected $end;
    protected $startLineNumber;
    protected $startLineStart;
    protected $prec;
    protected $octal;

    public function __construct($type, $value, $lineNumber = null, $lineStart = null, $start = null, $end = null)
    {
        $this->type = $type;
        $this->value = $value;
        $this->lineNumber = $lineNumber;
        $this->lineStart = $lineStart;
        $this->start = $start;
        $this->end = $end;
    }

    public static function name($token)
    {
        switch ($token) {
            case self::BOOLEAN_LITERAL:
                return TokenName::BOOLEAN_LITERAL;
            case self::EOF:
                return TokenName::EOF;
            case self::IDENTIFIER:
                return TokenName::IDENTIFIER;
            case self::KEYWORD:
                return TokenName::KEYWORD;
            case self::NULL_LITERAL:
                return TokenName::NULL_LITERAL;
            case self::NUMERIC_LITERAL:
                return TokenName::NUMERIC_LITERAL;
            case self::PUNCTUATOR:
                return TokenName::PUNCTUATOR;
            case self::STRING_LITERAL:
                return TokenName::STRING_LITERAL;
            case self::REGULAR_EXPRESSION:
                return TokenName::REGULAR_EXPRESSION;
            default:
                throw new InvalidArgumentException("Invalid token: {" . $token . "}");
        }
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function jsonSerialize()
    {
        $object = get_object_vars($this);

        $ret = array();
        foreach ($object as $key => $value) {
            if ($value !== null) {
                $ret[$key] = $value;
            }
        }

        return (object)$ret;
    }

}
