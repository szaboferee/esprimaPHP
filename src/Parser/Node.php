<?php
namespace EsprimaPhp\Parser;

use EsprimaPhp\Parser;
use EsprimaPhp\Util\ArrayList;
use JsonSerializable;

class Node implements JsonSerializable
{
	/**
	 * @var string
	 */
	public $type;

	public $range;
	/**
	 * @var SourceLocation
	 */
	public $loc;

	function __construct($esprima, $startToken = null)
	{
		if($startToken) {
			$this->wrappingNode($esprima, $startToken);
		} else {
			$this->node($esprima);
		}

	}

	public function processComment ($esprima) {
		$lastChild = null;
		$trailingComments = null;
		$bottomRight = $esprima->extra->bottomRightStack;
		$last = count($bottomRight) ? $bottomRight[count($bottomRight) - 1] : null;

		if ($this->type === Syntax::Program) {
			if (count($this->body) > 0) {
				return;
			}
		}

		if (count($esprima->extra->trailingComments) > 0) {
			if ($esprima->extra->trailingComments[0]->range[0] >= $this->range[1]) {
				$trailingComments = $esprima->extra->trailingComments;
				$esprima->extra->trailingComments = new ArrayList();
			} else {
				$esprima->extra->trailingComments = new ArrayList();
			}
		} else {
			if ($last && $last->trailingComments && $last->trailingComments[0]->range[0] >= $this->range[1]) {
				$trailingComments = $last->trailingComments;
				$last->trailingComments = new ArrayList();
			}
		}

		// Eating the stack.
		if ($last) {
			while ($last && $last->range[0] >= $this->range[0]) {
				$lastChild = $last;
				$last = $bottomRight->pop();
			}
		}

		if ($lastChild) {
			if ($lastChild->leadingComments && $lastChild->leadingComments[count($lastChild->leadingComments) - 1]->range[1] <= $this->range[0]) {
				$this->leadingComments = $lastChild->leadingComments;
				$lastChild->leadingComments = null;
			}
		} else if (count($esprima->extra->leadingComments) > 0 && $esprima->extra->leadingComments[count($esprima->extra->leadingComments) - 1]->range[1] <= $this->range[0]) {
			$this->leadingComments = $esprima->extra->leadingComments;
			$esprima->extra->leadingComments = new ArrayList();
		}


		if ($trailingComments) {
			$this->trailingComments = $trailingComments;
		}

		$bottomRight->push($this);
	}

	/**
	 * @param Parser $esprima
	 *
	 * @return Node
	 */
	public function finishNode($esprima) {
		if ($esprima->extra->range) {
			$this->range[1] = $esprima->index;
		}
		if ($esprima->extra->loc) {
			$this->loc->end = Position::createFromParser($esprima);
			if ($esprima->extra->source) {
				$this->loc->source = $esprima->extra->source;
			}
		}

		if ($esprima->extra->attachComment) {
			$this->processComment($esprima);
		}

		return $this;
	}

	/**
	 * @param $esprima
	 * @param $startToken
	 */
	protected function wrappingNode($esprima, $startToken)
	{
		if ($esprima->extra->range) {
			// start not always set
			$this->range = [isset($startToken->start) ? $startToken->start : 0, 0];
		}
		if ($esprima->extra->loc) {
			$this->loc = SourceLocation::createFromParser($esprima, $startToken);
		}
	}

	/**
	 * @param Parser $esprima
	 */
	protected function node($esprima)
	{
		$esprima->index = $esprima->lookahead->start;
		if ($esprima->lookahead->type === Token::StringLiteral) {
			$esprima->lineNumber = $esprima->lookahead->startLineNumber;
			$esprima->lineStart = $esprima->lookahead->startLineStart;
		} else {
			$esprima->lineNumber = $esprima->lookahead->lineNumber;
			$esprima->lineStart = $esprima->lookahead->lineStart;
		}
		if ($esprima->extra->range) {
			$this->range = [$esprima->index, 0];
		}
		if ($esprima->extra->loc) {
			$this->loc = SourceLocation::createFromParser($esprima);
		}
	}


	/**
	 * (PHP 5 &gt;= 5.4.0)<br/>
	 * Specify data which should be serialized to JSON
	 * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
	 * @return mixed data which can be serialized by <b>json_encode</b>,
	 * which is a value of any type other than a resource.
	 */
	public function jsonSerialize()
	{
		$object = get_object_vars($this);

		$ret = array();
		foreach($object as $key => $value) {
			if($value !== null) {
				$ret[$key] = $value;
			}
		}

		return (object) $ret;
	}
}