<?php

namespace EsprimaPhp\Util;


class Error extends \Exception
{
	public $message;
	public $index;
	public $lineNumber;
	public $column;
	public $description;

	function __construct($message){
		$this->message = $message;
	}



} 