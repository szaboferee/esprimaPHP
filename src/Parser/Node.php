<?php

namespace EsprimaPhp\Parser;

use EsprimaPhp\Parser;
use EsprimaPhp\Util\ArrayList;
use JsonSerializable;

class Node implements JsonSerializable, \Iterator, \RecursiveIterator
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

    public $leadingComments;
    public $trailingComments;

    function __construct($esprima, $startToken = null)
    {
        if ($startToken) {
            $this->wrappingNode($esprima, $startToken);
        } else {
            $this->simpleNode($esprima);
        }

    }

    /**
     * @param $esprima
     * @param $startToken
     */
    protected function wrappingNode($esprima, $startToken)
    {
        if ($esprima->extra->range) {
            // start not always set
            $this->range = [property_exists($startToken, 'start') ? $startToken->start : 0, 0];
        }
        if ($esprima->extra->loc) {
            $this->loc = SourceLocation::createFromParser($esprima, $startToken);
        }
    }

    /**
     * @param Parser $esprima
     */
    protected function simpleNode($esprima)
    {
        $esprima->index = $esprima->lookahead->start;
        if ($esprima->lookahead->type === Token::STRING_LITERAL) {
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
     * @param Parser $esprima
     *
     * @return Node
     */
    public function finishNode($esprima)
    {
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

    public function processComment($esprima)
    {
        $lastChild = null;
        $trailingComments = null;
        $bottomRight = $esprima->extra->bottomRightStack;
        $last = count($bottomRight) ? $bottomRight[count($bottomRight) - 1] : null;

        if ($this->type === Syntax::PROGRAM && count($this->body) > 0) {
                return;
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
                unset($last->trailingComments);
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
                unset($lastChild->leadingComments);
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
        foreach ($object as $key => $value) {
            if ($value !== null || !property_exists('\EsprimaPhp\Parser\Node', $key)) {
                $ret[$key] = $value;
            }
        }

        return (object)$ret;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        next($this->keys);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return current($this->keys);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        return key($this->keys) !== null;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        $this->keys = array_keys(get_object_vars($this));
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Returns if an iterator can be created for the current entry.
     * @link http://php.net/manual/en/recursiveiterator.haschildren.php
     * @return bool true if the current entry can be iterated over, otherwise returns false.
     */
    public function hasChildren()
    {
        $current = $this->current();
        return $current instanceof ArrayList || $current instanceof Node;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        return $this->{current($this->keys)};
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Returns an iterator for the current entry.
     * @link http://php.net/manual/en/recursiveiterator.getchildren.php
     * @return SplRecursiveIterator An iterator for the current entry.
     */
    public function getChildren()
    {
        return $this->current();
    }
}