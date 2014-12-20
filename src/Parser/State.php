<?php

namespace EsprimaPhp\Parser;

use EsprimaPhp\Util\ArrayList;

class State {
	public $allowIn = true;
	public $labelSet = [];
	public $parenthesisCount = 0;
	public $inFunctionBody = false;
	public $inIteration = false;
	public $inSwitch = false;
	public $lastCommentStart = -1;
	public $parenthesizedCount = 0;

	function __construct()
	{
		$this->labelSet = new ArrayList();
	}

}