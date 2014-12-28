<?php

namespace EsprimaPhp\Util;


class Error extends \Exception implements \JsonSerializable
{
	public $message;
	public $index;
	public $lineNumber;
	public $column;
	public $description;

	function __construct($message){
		$this->message = $message;
	}
    public function __toString() {
        return sprintf('{%d:[%d:%d]} - %s' ,
            $this->index,
            $this->lineNumber,
            $this->column,
            $this->message
        );
    }

    public function jsonSerialize()
    {
       return (object) [
         "index" => $this->index,
         "lineNumber" => $this->lineNumber,
         "column" => $this->column,
         "message" => $this->message,
       ];
    }
}