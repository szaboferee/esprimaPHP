<?php

namespace EsprimaPhp;

use ArrayAccess;
use JsonSerializable;

class SourceString implements ArrayAccess, JsonSerializable
{
    private $string = '';

    const UTF_8 = 'UTF-8';

    const UTF_32_BE = 'UTF-32BE';

    public function __construct($string)
    {
        if (is_bool($string)) {
            $this->string = $string ? 'true' : 'false';
        } else if (is_null($string)) {
            $this->string = 'null';
        } else {
            $this->string = (string)$string;
        }
    }

    public function __toString()
    {
        return $this->string;
    }

    public function charCodeAt($index)
    {
        $char = mb_substr($this->string, $index, 1, self::UTF_8);

        if (mb_check_encoding($char, self::UTF_8)) {
            $ret = mb_convert_encoding($char, self::UTF_32_BE, self::UTF_8);
            return hexdec(bin2hex($ret));
        } else {
            return null;
        }
    }

    public function slice($start, $end)
    {
        $end = $end - $start;
        return mb_substr($this->string, $start, $end, self::UTF_8);
    }

    public function offsetGet($offset)
    {
        if (!$this->offsetExists($offset)) {
            return null;
        }
        return new SourceString($this->string[$offset]);
    }

    public function offsetExists($offset)
    {
        return $this->length() > $offset;
    }

    public function length()
    {
        return mb_strlen($this->string);
    }

    public function offsetSet($offset, $value)
    {
    }

    public function offsetUnset($offset)
    {
    }

    public function jsonSerialize()
    {
        return $this->string;
    }
}