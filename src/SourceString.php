<?php

namespace EsprimaPhp;

use ArrayAccess;
use JsonSerializable;

class SourceString implements ArrayAccess, JsonSerializable
{
    private $string = '';
    public function __construct($string) 
    {
        if(is_bool($string)) {
            $this->string = $string ? 'true' : 'false';
        } else if(is_null($string)) {
            $this->string = 'null';
        } else {
            $this->string = (string) $string;
        }
    }
    public function __toString() 
    {
        return $this->string;
    }
    public function charCodeAt($index) 
    {
        $char = mb_substr($this->string, $index, 1, 'UTF-8');

        if (mb_check_encoding($char, 'UTF-8')) {
            $ret = mb_convert_encoding($char, 'UTF-32BE', 'UTF-8');
            return hexdec(bin2hex($ret));
        } else {
            return null;
        }
    }
    public function slice($start, $end)
    {
        $end = $end - $start;
        return mb_substr($this->string, $start, $end, 'UTF-8');
    }

    public function offsetGet($offset)
    {
        if(!$this->offsetExists($offset)) { return null; 
        }
        return new SourceString($this->string[$offset]);
    }

    public function offsetExists($offset)
    {
        return $this->length() > $offset;
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

    public function length() 
    {
        return mb_strlen($this->string);
    }
}