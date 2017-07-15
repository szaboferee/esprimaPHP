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

    static private $tokenNameMap = array(
        self::BOOLEAN_LITERAL => TokenName::BOOLEAN_LITERAL,
        self::EOF => TokenName::EOF,
        self::IDENTIFIER => TokenName::IDENTIFIER,
        self::KEYWORD => TokenName::KEYWORD,
        self::NULL_LITERAL => TokenName::NULL_LITERAL,
        self::NUMERIC_LITERAL => TokenName::NUMERIC_LITERAL,
        self::PUNCTUATOR => TokenName::PUNCTUATOR,
        self::STRING_LITERAL => TokenName::STRING_LITERAL,
        self::REGULAR_EXPRESSION => TokenName::REGULAR_EXPRESSION,
    );

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

    /**
     * @param $token
     * @return string
     * @throws InvalidArgumentException
     */
    public static function name($token)
    {
        if (array_key_exists($token, self::$tokenNameMap)) {
            return self::$tokenNameMap[$token];
        } else {
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
