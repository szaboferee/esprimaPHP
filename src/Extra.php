<?php

namespace EsprimaPhp;

use EsprimaPhp\Util\ArrayList;

class Extra
{
    public $range;
    public $loc;
    public $attachComment;
    public $source;
    /**
     * @var ArrayList|null
     */
    public $tokens;
    /**
     * @var ArrayList|null
     */
    public $comments;
    /**
     * @var ArrayList|null
     */
    public $leadingComments;
    /**
     * @var ArrayList|null
     */
    public $trailingComments;
    /**
     * @var ArrayList|null
     */
    public $bottomRightStack;
    /**
     * @var ArrayList|null
     */
    public $errors;
    public $tokenize;
    public $openParenToken;
    public $openCurlyToken;
}