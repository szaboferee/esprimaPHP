<?php

namespace EsprimaPhp;

// xdebug nesting level
ini_set('xdebug.max_nesting_level', 1000);

use EsprimaPhp\Node\CatchClause;
use EsprimaPhp\Node\ClassNameConstants;
use EsprimaPhp\Node\Declaration\FunctionDeclaration;
use EsprimaPhp\Node\Declaration\VariableDeclaration;
use EsprimaPhp\Node\Expression\ArrayExpression;
use EsprimaPhp\Node\Expression\AssignmentExpression;
use EsprimaPhp\Node\Expression\BinaryExpression;
use EsprimaPhp\Node\Expression\CallExpression;
use EsprimaPhp\Node\Expression\ConditionalExpression;
use EsprimaPhp\Node\Expression\FunctionExpression;
use EsprimaPhp\Node\Expression\LogicalExpression;
use EsprimaPhp\Node\Expression\MemberExpression;
use EsprimaPhp\Node\Expression\NewExpression;
use EsprimaPhp\Node\Expression\ObjectExpression;
use EsprimaPhp\Node\Expression\PostfixExpression;
use EsprimaPhp\Node\Expression\SequenceExpression;
use EsprimaPhp\Node\Expression\UnaryExpression;
use EsprimaPhp\Node\Expression\UpdateExpression;
use EsprimaPhp\Node\Identifier;
use EsprimaPhp\Node\Program;
use EsprimaPhp\Node\Property;
use EsprimaPhp\Node\Statement\BlockStatement;
use EsprimaPhp\Node\Statement\EmptyStatement;
use EsprimaPhp\Node\SwitchCase;
use EsprimaPhp\Node\VariableDeclarator;
use EsprimaPhp\Parser\Node;
use EsprimaPhp\Parser\Position;
use EsprimaPhp\Parser\SourceLocation;
use EsprimaPhp\Parser\State;
use EsprimaPhp\Parser\Syntax;
use EsprimaPhp\Parser\Token;
use EsprimaPhp\Util\ArrayList;
use EsprimaPhp\Util\Error;
use EsprimaPhp\Util\Helper;
use EsprimaPhp\Util\MutableNode;
use Exception;
use stdClass;

class Parser
{
    const ILLEGAL = 'ILLEGAL';
    /**
     * @var SourceString|SourceString[]
     */
    public $source;
    public $index;
    public $lineNumber;
    public $lineStart = 0;
    /**
     * @var Extra
     */
    public $extra;
    /**
     * @var Node
     */
    public $lookahead;
    private $strict;
    private $length;
    /**
     * @var State
     */
    private $state;

    public function tokenize($source = null, $options = array())
    {

        $this->source = new SourceString($source);
        $this->index = 0;
        $this->length = $this->source->length();
        $this->lineNumber = $this->length > 0 ? 1 : 0;
        $this->lineStart = 0;
        $this->lookahead = null;
        $this->state = new State();
        $this->extra = new Extra();

        $this->initTokenizerOptions($options);

        try {
            $this->peek();
            if ($this->lookahead->type === Token::EOF) {
                return $this->extra->tokens;
            }

            $this->lex();
            while ($this->lookahead->type !== Token::EOF) {
                try {
                    $this->lex();
                } catch (Error $lexError) {
                    if ($this->extra->errors) {
                        $this->extra->errors->push($lexError);
                        break;
                    } else {
                        throw $lexError;
                    }
                }
            }

            $this->filterTokenLocation();
            $tokens = $this->extra->tokens;
            if ($this->extra->comments) {
                $tokens->comments = $this->extra->comments;
            }
            if ($this->extra->errors && count($this->extra->errors)) {
                $tokens->errors = $this->extra->errors;
            }
        } catch (Exception $e) {
            $this->extra = null;
            throw $e;
        }

        $this->extra = null;

        return $tokens;
    }

    private function filterTokenLocation()
    {
        $tokens = new ArrayList();

        for ($i = 0; $i < count($this->extra->tokens); ++$i) {
            $entry = $this->extra->tokens[$i];
            $token = new Token($entry->type, $entry->value);
            if ($entry->regex) {
                $token->regex = new Regex($entry->regex->pattern, $entry->regex->flags);
            }
            if ($this->extra->range) {
                $token->range = $entry->range;
            }
            if ($this->extra->loc) {
                $token->loc = $entry->loc;
            }
            $tokens->push($token);
        }

        $this->extra->tokens = $tokens;
    }

    public function parse($source = null, $options = null)
    {
        $this->source = new SourceString($source);
        $this->index = 0;
        $this->length = $this->source->length();
        $this->lineNumber = $this->length > 0 ? 1 : 0;

        $this->state = new State();
        $this->extra = new Extra();


        $this->initParserOptions($options);

        try {
            $program = $this->parseProgram();
            if ($this->extra->comments) {
                $program->comments = $this->extra->comments;
            }
            if ($this->extra->tokens) {
                $this->filterTokenLocation();
                $program->tokens = $this->extra->tokens;
            }
            if ($this->extra->errors && count($this->extra->errors)) {
                $program->errors = $this->extra->errors;
            }

        } catch (Exception $e) {
            throw $e;
        }
        return $program;
    }

    private function parseProgram()
    {
        $this->skipComment();
        $this->peek();
        $node = new Program($this);
        $this->strict = false;
        $body = $this->parseSourceElements();
        return $node->finish($this, $body);
    }

    private function parseSourceElements()
    {
        $sourceElements = new ArrayList();
        $firstRestricted = false;

        while ($this->index < $this->length) {
            $token = $this->lookahead;
            if ($token->type !== Token::STRING_LITERAL) {
                break;
            }

            $sourceElement = $this->parseSourceElement();
            $sourceElements->push($sourceElement);
            if ($sourceElement->expression->type !== Syntax::LITERAL) {
                // this is not directive
                break;
            }
            $directive = $this->source->slice($token->start + 1, $token->end - 1);
            if ($directive == 'use strict') {
                $this->strict = true;
                if ($firstRestricted) {
                    $this->throwErrorTolerant($firstRestricted, Messages::OCTAL_LITERALS_ARE_NOT_ALLOWED_IN_STRICT_MODE);
                }
            } else {
                if (!$firstRestricted && $token->octal) {
                    $firstRestricted = $token;
                }
            }
        }

        while ($this->index < $this->length) {
            $sourceElement = $this->parseSourceElement();
            /* istanbul ignore if */
            if (!$sourceElement) {
                break;
            }
            $sourceElements->push($sourceElement);
        }
        return $sourceElements;
    }

    private function parseConditionalExpression()
    {
        $startToken = $this->lookahead;

        $expr = $this->parseBinaryExpression();
        if ($expr == PlaceHolders::ArrowParameterPlaceHolder()) {
            return $expr;
        }
        if ($this->match('?')) {
            $this->lex();
            $previousAllowIn = $this->state->allowIn;
            $this->state->allowIn = true;
            $consequent = $this->parseAssignmentExpression();
            $this->state->allowIn = $previousAllowIn;
            $this->expect(':');
            $alternate = $this->parseAssignmentExpression();

            $expr = (new ConditionalExpression($this, $startToken))->finish($this, $expr, $consequent, $alternate);
        }

        return $expr;
    }

    private function parseBinaryExpression()
    {
        $marker = $this->lookahead;
        $left = $this->parseUnaryExpression();
        if ($left == PlaceHolders::ArrowParameterPlaceHolder()) {
            return $left;
        }

        $token = $this->lookahead;
        $prec = Helper::binaryPrecedence($token, $this->state->allowIn);
        if ($prec == 0) {
            return $left;
        }
        $token->prec = $prec;
        $this->lex();

        $markers = new ArrayList([$marker, $this->lookahead]);
        $right = $this->parseUnaryExpression();

        $stack = new ArrayList([$left, $token, $right]);

        while (($prec = Helper::binaryPrecedence($this->lookahead, $this->state->allowIn)) > 0) {

            // Reduce: make a binary expression from the three topmost entries.
            while ((count($stack) > 2) && ($prec <= $stack[count($stack) - 2]->prec)) {
                $right = $stack->pop();
                $operator = $stack->pop()->value;
                $left = $stack->pop();
                $markers->pop();
                $expr = ($operator == '||' || $operator == '&&')
                    ? (new LogicalExpression($this, $markers[count($markers) - 1]))->finish($this, $operator, $left, $right)
                    : (new BinaryExpression($this, $markers[count($markers) - 1]))->finish($this, $operator, $left, $right);
                $stack->push($expr);
            }

            // Shift.
            $token = $this->lex();
            $token->prec = $prec;
            $stack->push($token);
            $markers->push($this->lookahead);
            $expr = $this->parseUnaryExpression();
            $stack->push($expr);
        }

        // Final reduce to clean-up the stack.
        $i = count($stack) - 1;
        $expr = $stack[$i];
        $markers->pop();
        while ($i > 1) {
            $expr = ($stack[$i - 1]->value == '||' || $stack[$i - 1]->value == '&&')
                ? (new LogicalExpression($this, $markers->pop()))->finish($this, $stack[$i - 1]->value, $stack[$i - 2], $expr)
                : (new BinaryExpression($this, $markers->pop()))->finish($this, $stack[$i - 1]->value, $stack[$i - 2], $expr);
            $i -= 2;
        }

        return $expr;
    }

    private function parseUnaryExpression()
    {
        if ($this->lookahead->type !== Token::PUNCTUATOR && $this->lookahead->type !== Token::KEYWORD) {
            $expr = $this->parsePostfixExpression();
        } else if ($this->match('++') || $this->match('--')) {
            $startToken = $this->lookahead;
            $token = $this->lex();
            $expr = $this->parseUnaryExpression();
            // 11.4.4, 11.4.5
            if ($this->strict && $expr->type == Syntax::IDENTIFIER && Helper::isRestrictedWord($expr->name)) {
                $this->throwErrorTolerant(null, Messages::PREFIX_INCREMENT_DECREMENT_MAY_NOT_HAVE_EVAL_OR_ARGUMENTS_OPERAND_IN_STRICT_MODE);
            }

            if (!Helper::isLeftHandSide($expr)) {
                $this->throwErrorTolerant(null, Messages::INVALID_LEFT_HAND_SIDE_IN_ASSIGNMENT);
            }

            $expr = (new UpdateExpression($this, $startToken))->finish($this, $token->value, $expr);
        } else if ($this->match('+') || $this->match('-') || $this->match('~') || $this->match('!')) {
            $startToken = $this->lookahead;
            $token = $this->lex();
            $expr = $this->parseUnaryExpression();
            $expr = (new UnaryExpression($this, $startToken))->finish($this, $token->value, $expr);
        } else if ($this->matchKeyword('delete') || $this->matchKeyword('void') || $this->matchKeyword('typeof')) {
            $startToken = $this->lookahead;
            $token = $this->lex();
            $expr = $this->parseUnaryExpression();
            $expr = (new UnaryExpression($this, $startToken))->finish($this, $token->value, $expr);
            if ($this->strict && $expr->operator == 'delete' && $expr->argument->type == Syntax::IDENTIFIER) {
                $this->throwErrorTolerant(null, Messages::DELETE_OF_AN_UNQUALIFIED_IDENTIFIER_IN_STRICT_MODE);
            }
        } else {
            $expr = $this->parsePostfixExpression();
        }

        return $expr;
    }

    private function parsePostfixExpression()
    {
        $startToken = $this->lookahead;
        $expr = $this->parseLeftHandSideExpressionAllowCall();
        if ($this->lookahead->type == Token::PUNCTUATOR) {
            if (($this->match('++') || $this->match('--')) && !$this->peekLineTerminator()) {
                // 11.3.1, 11.3.2
                if ($this->strict && $expr->type == Syntax::IDENTIFIER && Helper::isRestrictedWord($expr->name)) {
                    $this->throwErrorTolerant(null, Messages::POSTFIX_INCREMENT_DECREMENT_MAY_NOT_HAVE_EVAL_OR_ARGUMENTS_OPERAND_IN_STRICT_MODE);
                }

                if (!Helper::isLeftHandSide($expr)) {
                    $this->throwErrorTolerant(null, Messages::INVALID_LEFT_HAND_SIDE_IN_ASSIGNMENT);
                }

                $token = $this->lex();
                $expr = (new PostfixExpression($this, $startToken))->finish($this, $token->value, $expr);
            }
        }

        return $expr;
    }

    private function parseLeftHandSideExpressionAllowCall()
    {
        $previousAllowIn = $this->state->allowIn;

        $startToken = $this->lookahead;
        $this->state->allowIn = true;
        $expr = $this->matchKeyword('new') ? $this->parseNewExpression() : $this->parsePrimaryExpression();

        for (; ;) {
            if ($this->match('.')) {
                $property = $this->parseNonComputedMember();
                $expr = (new MemberExpression($this, $startToken))->finish($this, '.', $expr, $property);
            } else if ($this->match('(')) {
                $args = $this->parseArguments();
                $expr = (new CallExpression($this, $startToken))->finish($this, $expr, $args);
            } else if ($this->match('[')) {
                $property = $this->parseComputedMember();
                $expr = (new MemberExpression($this, $startToken))->finish($this, '[', $expr, $property);
            } else {
                break;
            }
        }
        $this->state->allowIn = $previousAllowIn;

        return $expr;
    }

    private function matchKeyword($keyword)
    {
        return $this->lookahead->type == Token::KEYWORD && $this->lookahead->value == $keyword;
    }

    private function parseNewExpression()
    {
        $node = new NewExpression($this);
        $this->expectKeyword('new');
        $callee = $this->parseLeftHandSideExpression();
        $args = $this->match('(') ? $this->parseArguments() : new ArrayList();

        return $node->finish($this, $callee, $args);
    }

    private function expectKeyword($keyword)
    {
        $token = $this->lex();
        if ($token->type !== Token::KEYWORD || $token->value != $keyword) {
            $this->throwUnexpected($token);
        }
    }

    private function lex()
    {
        $token = $this->lookahead;
        $this->index = $token->end;
        $this->lineNumber = $token->lineNumber;
        $this->lineStart = $token->lineStart;

        $this->lookahead = ($this->extra->tokens) ? $this->collectToken() : $this->advance();

        $this->index = $token->end;
        $this->lineNumber = $token->lineNumber;
        $this->lineStart = $token->lineStart;

        return $token;
    }

    private function collectToken()
    {
        $this->skipComment();
        $loc = new SourceLocation(new Position($this->lineNumber, $this->index - $this->lineStart), null);

        $token = $this->advance();
        $loc->end = new Position($this->lineNumber, $this->index - $this->lineStart);

        if ($token->type !== Token::EOF) {
            $value = $this->source->slice($token->start, $token->end);
            $entry = new Entry(Token::name($token->type), $value, [$token->start, $token->end], $loc);
            if ($token->regex) {
                $entry->regex = $token->regex;
            }
            $this->extra->tokens->push($entry);
        }

        return $token;
    }

    private function skipComment()
    {
        $start = ($this->index == 0);
        while ($this->index < $this->length) {
            $ch = $this->source->charCodeAt($this->index);

            if (Helper::isWhiteSpace($ch)) {
                ++$this->index;
            } else if (Helper::isLineTerminator($ch)) {
                ++$this->index;
                if ($ch == 0x0D && $this->source->charCodeAt($this->index) == 0x0A) {
                    ++$this->index;
                }
                ++$this->lineNumber;
                $this->lineStart = $this->index;
                $start = true;
            } else if ($ch == 0x2F) { // U+002F is '/'
                $ch = $this->source->charCodeAt($this->index + 1);
                if ($ch == 0x2F) {
                    ++$this->index;
                    ++$this->index;
                    $this->skipSingleLineComment(2);
                    $start = true;
                } else if ($ch == 0x2A) {  // U+002A is '*'
                    ++$this->index;
                    ++$this->index;
                    $this->skipMultiLineComment();
                } else {
                    break;
                }
            } else if ($start && $ch == 0x2D) { // U+002D is '-'
                // U+003E is '>'
                if (($this->source->charCodeAt($this->index + 1) == 0x2D)
                    && ($this->source->charCodeAt($this->index + 2) == 0x3E)
                ) {
                    // '-->' is a single-line comment
                    $this->index += 3;
                    $this->skipSingleLineComment(3);
                } else {
                    break;
                }
            } else if ($ch == 0x3C) { // U+003C is '<'
                if ($this->source->slice($this->index + 1, $this->index + 4) == '!--') {
                    ++$this->index; // `<`
                    ++$this->index; // `!`
                    ++$this->index; // `-`
                    ++$this->index; // `-`
                    $this->skipSingleLineComment(4);
                } else {
                    break;
                }
            } else {
                break;
            }
        }
    }

    /**
     * @param integer $offset
     */
    private function skipSingleLineComment($offset)
    {
        $start = $this->index - $offset;
        /**
         * @var SourceLocation $loc
         */
        $loc = new SourceLocation(new Position($this->lineNumber, $this->index - $this->lineStart - $offset), null);

        while ($this->index < $this->length) {
            $ch = $this->source->charCodeAt($this->index);
            ++$this->index;
            if (Helper::isLineTerminator($ch)) {
                if ($this->extra->comments) {
                    $comment = $this->source->slice($start + $offset, $this->index - 1);
                    $loc->end = new Position($this->lineNumber, $this->index - $this->lineStart - 1);
                    $this->addComment('Line', $comment, $start, $this->index - 1, $loc);
                }
                if ($ch == 13 && $this->source->charCodeAt($this->index) == 10) {
                    ++$this->index;
                }
                ++$this->lineNumber;
                $this->lineStart = $this->index;
                return;
            }
        }

        if ($this->extra->comments) {
            $comment = $this->source->slice($start + $offset, $this->index);
            $loc->end = new Position($this->lineNumber, $this->index - $this->lineStart);
            $this->addComment('Line', $comment, $start, $this->index, $loc);
        }
    }

    /**
     * @param integer $type
     * @param mixed $value
     * @param integer $start
     * @param integer $end
     * @param SourceLocation $loc
     *
     * @return void
     */
    private function addComment($type, $value, $start, $end, $loc)
    {
        assert(is_numeric($start), 'Comment must have valid position');
        if ($this->state->lastCommentStart >= $start) {
            return;
        }
        $this->state->lastCommentStart = $start;

        $comment = new Comment($type, $value);
        if ($this->extra->range) {
            $comment->range = [$start, $end];
        }
        if ($this->extra->loc) {
            $comment->loc = $loc;
        }
        $this->extra->comments->push($comment);
        if ($this->extra->attachComment) {
            $this->extra->leadingComments->push($comment);
            $this->extra->trailingComments->push($comment);
        }
    }

    private function skipMultiLineComment()
    {
        //var start, loc, ch, comment;
        $start = 0;
        $loc = null;
        if ($this->extra->comments) {
            $start = $this->index - 2;
            $loc = new SourceLocation(new Position($this->lineNumber, $this->index - $this->lineStart - 2), null);
        }

        while ($this->index < $this->length) {
            $ch = $this->source->charCodeAt($this->index);
            if (Helper::isLineTerminator($ch)) {
                if ($ch == 0x0D && $this->source->charCodeAt($this->index + 1) == 0x0A) {
                    ++$this->index;
                }
                ++$this->lineNumber;
                ++$this->index;
                $this->lineStart = $this->index;
                if ($this->index >= $this->length) {
                    $this->throwError(null, Messages::UNEXPECTED_TOKEN_S, self::ILLEGAL);
                }
            } else if ($ch == 0x2A) {
                // Block comment ends with '*/'.
                if ($this->source->charCodeAt($this->index + 1) == 0x2F) {
                    ++$this->index;
                    ++$this->index;
                    if ($this->extra->comments) {
                        $comment = $this->source->slice($start + 2, $this->index - 2);
                        $loc->end = new Position($this->lineNumber, $this->index - $this->lineStart);
                        $this->addComment('Block', $comment, $start, $this->index, $loc);
                    }
                    return;
                }
                ++$this->index;
            } else {
                ++$this->index;
            }
        }
        $this->throwError(null, Messages::UNEXPECTED_TOKEN_S, self::ILLEGAL);
    }

    private function throwError()
    {
        $args = func_get_args();
        $token = array_shift($args);
        $msg = call_user_func_array('sprintf', $args);

        if ($token && property_exists($token, 'lineNumber')) {
            $error = new Error('Error: Line ' . $token->lineNumber . ': ' . $msg);
            $error->index = $token->start;
            $error->lineNumber = $token->lineNumber;
            $error->column = $token->start - $this->lineStart + 1;
        } else {
            $error = new Error('Error: Line ' . $this->lineNumber . ': ' . $msg);
            $error->index = $this->index;
            $error->lineNumber = $this->lineNumber;
            $error->column = $this->index - $this->lineStart + 1;
        }

        $error->description = $msg;
        throw $error;
    }

    private function advance()
    {
        $this->skipComment();

        if ($this->index >= $this->length) {
            return new Token(Token::EOF, null, $this->lineNumber, $this->lineStart, $this->index, $this->index);
        }

        $ch = $this->source->charCodeAt($this->index);

        if (Helper::isIdentifierStart($ch)) {
            return $this->scanIdentifier();
        }

        // Very common: ( and ) and ;
        if ($ch == 0x28 || $ch == 0x29 || $ch == 0x3B) {
            return $this->scanPunctuator();
        }

        // String literal starts with single quote (U+0027) or double quote (U+0022).
        if ($ch == 0x27 || $ch == 0x22) {
            return $this->scanStringLiteral();
        }


        // Dot (.) U+002E can also start a floating-point number, hence the need
        // to check the next character.
        if ($ch == 0x2E) {
            if (Helper::isDecimalDigit($this->source->charCodeAt($this->index + 1))) {
                return $this->scanNumericLiteral();
            }
            return $this->scanPunctuator();
        }

        if (Helper::isDecimalDigit($ch)) {
            return $this->scanNumericLiteral();
        }

        // Slash (/) U+002F can also start a regex.
        if ($this->extra->tokenize && $ch == 0x2F) {
            return $this->advanceSlash();
        }

        return $this->scanPunctuator();
    }

    private function scanIdentifier()
    {
        $start = $this->index;
        // Backslash (U+005C) starts an escaped character.
        $id = ($this->source->charCodeAt($this->index) == 0x5C) ? $this->getEscapedIdentifier() : $this->getIdentifier();
        // There is no keyword or literal with only one character.
        // Thus, it must be an identifier.
        if (strlen($id) == 1) {
            $type = Token::IDENTIFIER;
        } else if (Helper::isKeyword($id, $this->strict)) {
            $type = Token::KEYWORD;
        } else if ($id == 'null') {
            $type = Token::NULL_LITERAL;
        } else if ($id == 'true' || $id == 'false') {
            $type = Token::BOOLEAN_LITERAL;
        } else {
            $type = Token::IDENTIFIER;
        }

        return new Token($type, $id, $this->lineNumber, $this->lineStart, $start, $this->index);
    }

    private function getEscapedIdentifier()
    {
        $ch = $this->source->charCodeAt($this->index++);
        $id = chr($ch);

        // '\u' (U+005C, U+0075) denotes an escaped character.
        if ($ch == 0x5C) {
            if ($this->source->charCodeAt($this->index) != 0x75) {
                $this->throwError(null, Messages::UNEXPECTED_TOKEN_S, self::ILLEGAL);
            }
            ++$this->index;
            $ch = $this->scanHexEscape('u');
            if (!$ch || $ch == '\\' || !Helper::isIdentifierStart($ch->charCodeAt(0))) {
                $this->throwError(null, Messages::UNEXPECTED_TOKEN_S, self::ILLEGAL);
            }
            $id = $ch;
        }

        while ($this->index < $this->length) {
            $ch = $this->source->charCodeAt($this->index);
            if (!Helper::isIdentifierPart($ch)) {
                break;
            }
            ++$this->index;
            $id .= chr($ch);

            // '\u' (U+005C, U+0075) denotes an escaped character.
            if ($ch == 0x5C) {
                $id = substr($id, 0, strlen($id) - 1);
                if ($this->source->charCodeAt($this->index) != 0x75) {
                    $this->throwError(null, Messages::UNEXPECTED_TOKEN_S, self::ILLEGAL);
                }
                ++$this->index;
                $ch = $this->scanHexEscape('u');
                if (!$ch || $ch == '\\' || !Helper::isIdentifierPart($ch->charCodeAt(0))) {
                    $this->throwError(null, Messages::UNEXPECTED_TOKEN_S, self::ILLEGAL);
                }
                $id .= $ch;
            }
        }

        return $id;
    }

    private function scanHexEscape($prefix)
    {
        $code = 0;
        $len = ($prefix == 'u') ? 4 : 2;
        for ($i = 0; $i < $len; ++$i) {
            if ($this->index < $this->length && Helper::isHexDigit($this->source[$this->index])) {
                $ch = $this->source[$this->index++];
                $code = $code * 16 + strpos('0123456789abcdef', strtolower($ch));
            } else {
                return '';
            }
        }

        return new SourceString(chr($code));
    }

    private function getIdentifier()
    {
        $start = $this->index++;
        while ($this->index < $this->length) {
            $ch = $this->source->charCodeAt($this->index);
            if ($ch == 0x5C) {
                // Blackslash (U+005C) marks Unicode escape sequence.
                $this->index = $start;
                return $this->getEscapedIdentifier();
            }
            if (Helper::isIdentifierPart($ch)) {
                ++$this->index;
            } else {
                break;
            }
        }

        return $this->source->slice($start, $this->index);
    }

    private function scanPunctuator()
    {
        $start = $this->index;
        $code = $this->source->charCodeAt($this->index);
        $ch1 = $this->source[$this->index];

        switch ($code) {
            // Check for most common single-character punctuators.
            case 0x2E:  // . dot
            case 0x28:  // ( open bracket
            case 0x29:  // ) close bracket
            case 0x3B:  // ; semicolon
            case 0x2C:  // , comma
            case 0x7B:  // { open curly brace
            case 0x7D:  // } close curly brace
            case 0x5B:  // [
            case 0x5D:  // ]
            case 0x3A:  // :
            case 0x3F:  // ?
            case 0x7E:  // ~
                ++$this->index;
                if ($this->extra->tokenize) {
                    if ($code == 0x28) {
                        $this->extra->openParenToken = count($this->extra->tokens);
                    } else if ($code == 0x7B) {
                        $this->extra->openCurlyToken = count($this->extra->tokens);
                    }
                }
                return new Token(
                    Token::PUNCTUATOR, chr($code), $this->lineNumber, $this->lineStart, $start, $this->index
                );

            default:
                $code2 = $this->source->charCodeAt($this->index + 1);

                // '=' (U+003D) marks an assignment or comparison operator.
                if ($code2 == 0x3D) {
                    switch ($code) {
                        case 0x2B:  // +
                        case 0x2D:  // -
                        case 0x2F:  // /
                        case 0x3C:  // <
                        case 0x3E:  // >
                        case 0x5E:  // ^
                        case 0x7C:  // |
                        case 0x25:  // %
                        case 0x26:  // &
                        case 0x2A:  // *
                            $this->index += 2;
                            return new Token(
                                Token::PUNCTUATOR, chr($code) . chr($code2), $this->lineNumber, $this->lineStart, $start, $this->index
                            );

                        case 0x21: // !
                        case 0x3D: // =
                            $this->index += 2;

                            // !== and ==
                            if ($this->source->charCodeAt($this->index) == 0x3D) {
                                ++$this->index;
                            }
                            return new Token(
                                Token::PUNCTUATOR, $this->source->slice($start, $this->index), $this->lineNumber, $this->lineStart, $start, $this->index
                            );
                    }
                }
        }

        // 4-character punctuator: >>>=
        $ch4 = substr($this->source, $this->index, 4);

        if ($ch4 == '>>>=') {
            $this->index += 4;
            return new Token(
                Token::PUNCTUATOR, $ch4, $this->lineNumber, $this->lineStart, $start, $this->index
            );
        }

        // 3-character punctuators: == !== >>> <<= >>=

        $ch3 = substr($ch4, 0, 3);

        if ($ch3 == '>>>' || $ch3 == '<<=' || $ch3 == '>>=') {
            $this->index += 3;
            return new Token(
                Token::PUNCTUATOR, $ch3, $this->lineNumber, $this->lineStart, $start, $this->index
            );
        }

        // Other 2-character punctuators: ++ -- << >> && ||
        $ch2 = new SourceString(substr($ch3, 0, 2));

        if (($ch1 == $ch2[1] && (strpos('+-<>&|', (string)$ch1) !== false)) || $ch2 == '=>') {
            $this->index += 2;
            return new Token(
                Token::PUNCTUATOR, $ch2, $this->lineNumber, $this->lineStart, $start, $this->index
            );
        }

        // 1-character punctuators: < > = ! + - * % & | ^ /

        if (strpos('<>=!+-*%&|^/', (string)$ch1) !== false) {
            ++$this->index;
            return new Token(
                Token::PUNCTUATOR, $ch1, $this->lineNumber, $this->lineStart, $start, $this->index
            );
        }

        $this->throwError(null, Messages::UNEXPECTED_TOKEN_S, self::ILLEGAL);
    }

    private function scanStringLiteral()
    {
        $str = '';
        $octal = false;
        $startLineNumber = $this->lineNumber;
        $startLineStart = $this->lineStart;

        $quote = $this->source[$this->index];
        assert(
            ($quote == "'" || $quote == '"'),
            'String literal must starts with a quote it started with:' . $quote
        );

        $start = $this->index;
        ++$this->index;

        while ($this->index < $this->length) {
            $ch = $this->source[$this->index++];

            if ($ch == $quote) {
                $quote = '';
                break;
            } else if ($ch == '\\') {
                $ch = $this->source[$this->index++];
                if (!$ch || !Helper::isLineTerminator($ch->charCodeAt(0))) {
                    switch ($ch) {
                        case 'u':
                        case 'x':
                            if ($this->source[$this->index] == '{') {
                                ++$this->index;
                                $str .= $this->scanUnicodeCodePointEscape();
                            } else {
                                $restore = $this->index;
                                $unescaped = $this->scanHexEscape($ch);
                                if ($unescaped) {
                                    $str .= $unescaped;
                                } else {
                                    $this->index = $restore;
                                    $str .= $ch;
                                }
                            }
                            break;
                        case 'n':
                            $str .= '\n';
                            break;
                        case 'r':
                            $str .= '\r';
                            break;
                        case 't':
                            $str .= '\t';
                            break;
                        case 'b':
                            $str .= '\b';
                            break;
                        case 'f':
                            $str .= '\f';
                            break;
                        case 'v':
                            $str .= '\x0B';
                            break;

                        default:
                            if (Helper::isOctalDigit($ch)) {
                                $code = strpos('01234567', (string)$ch);

                                // \0 is not octal escape sequence
                                if ($code !== 0) {
                                    $octal = true;
                                }

                                if ($this->index < $this->length && Helper::isOctalDigit($this->source[$this->index])) {
                                    $octal = true;
                                    $code = $code * 8 + strpos('01234567', $this->source[$this->index++]);

                                    // 3 digits are only allowed when string starts
                                    // with 0, 1, 2, 3
                                    if (strpos('0123', $ch) >= 0
                                        && $this->index < $this->length
                                        && Helper::isOctalDigit($this->source[$this->index])
                                    ) {
                                        $code = $code * 8 + strpos('01234567', $this->source[$this->index++]);
                                    }
                                }
                                $str .= chr($code);
                            } else {
                                $str .= $ch;
                            }
                            break;
                    }
                } else {
                    ++$this->lineNumber;
                    if ($ch == '\r' && $this->source[$this->index] == '\n') {
                        ++$this->index;
                    }
                    $this->lineStart = $this->index;
                }
            } else if (Helper::isLineTerminator($ch->charCodeAt(0))) {
                break;
            } else {
                $str .= $ch;
            }
        }

        if ($quote != '') {
            $this->throwError(null, Messages::UNEXPECTED_TOKEN_S, self::ILLEGAL);
        }

        $token = new Token(Token::STRING_LITERAL, $str, $this->lineNumber, $this->lineStart, $start, $this->index);
        $token->octal = $octal;
        $token->startLineNumber = $startLineNumber;
        $token->startLineStart = $startLineStart;

        return $token;
    }

    private function scanUnicodeCodePointEscape()
    {
        $ch = $this->source[$this->index];
        $code = 0;

        // At least, one hex digit is required.
        if ($ch == '}') {
            $this->throwError(null, Messages::UNEXPECTED_TOKEN_S, self::ILLEGAL);
        }

        while ($this->index < $this->length) {
            $ch = $this->source[$this->index++];
            if (!Helper::isHexDigit($ch)) {
                break;
            }
            $code = $code * 16 + strpos('0123456789abcdef', strtolower($ch));
        }

        if ($code > 0x10FFFF || $ch != '}') {
            $this->throwError(null, Messages::UNEXPECTED_TOKEN_S, self::ILLEGAL);
        }

        // UTF-16 Encoding
        if ($code <= 0xFFFF) {
            return chr($code);
        }
        $cu1 = (($code - 0x10000) >> 10) + 0xD800;
        $cu2 = (($code - 0x10000) & 1023) + 0xDC00;
        return chr($cu1) . chr($cu2);
    }

    private function scanNumericLiteral()
    {
        $ch = $this->source[$this->index];
        assert(
            Helper::isDecimalDigit($ch->charCodeAt(0)) || ($ch == '.'),
            'Numeric literal must start with a decimal digit or a decimal point value:' . $this->index . ' -- ' . $ch . " : " . $ch->charCodeAt(0)
        );

        $start = $this->index;
        $number = '';
        if ($ch != '.') {
            $number = $this->source[$this->index++];
            $ch = $this->source->offsetExists($this->index) ? $this->source[$this->index] : '';

            // Hex number starts with '0x'.
            // Octal number starts with '0'.
            if ($number == '0') {
                if ($ch == 'x' || $ch == 'X') {
                    ++$this->index;
                    return $this->scanHexLiteral($start);
                }
                if (Helper::isOctalDigit($ch)) {
                    return $this->scanOctalLiteral($start);
                }

                // decimal number starts with '0' such as '09' is illegal.
                if ($ch && Helper::isDecimalDigit($ch->charCodeAt(0))) {
                    $this->throwError(null, Messages::UNEXPECTED_TOKEN_S, self::ILLEGAL);
                }
            }

            while (Helper::isDecimalDigit($this->source->charCodeAt($this->index))) {
                $number .= $this->source[$this->index++];
            }
            $ch = $this->source->offsetExists($this->index) ? $this->source[$this->index] : '';
        }

        if ($ch == '.') {
            $number .= $this->source[$this->index++];
            while (Helper::isDecimalDigit($this->source->charCodeAt($this->index))) {
                $number .= $this->source[$this->index++];
            }
            $ch = isset($this->source[$this->index]) ? $this->source[$this->index] : '';
        }

        if ($ch == 'e' || $ch == 'E') {
            $number .= $this->source[$this->index++];

            $ch = $this->source[$this->index];
            if ($ch == '+' || $ch == '-') {
                $number .= $this->source[$this->index++];
            }
            if (Helper::isDecimalDigit($this->source->charCodeAt($this->index))) {
                while (Helper::isDecimalDigit($this->source->charCodeAt($this->index))) {
                    $number .= $this->source[$this->index++];
                }
            } else {
                $this->throwError(null, Messages::UNEXPECTED_TOKEN_S, self::ILLEGAL);
            }
        }

        if (Helper::isIdentifierStart($this->source->charCodeAt($this->index))) {
            $this->throwError(null, Messages::UNEXPECTED_TOKEN_S, self::ILLEGAL);
        }

        return new Token(Token::NUMERIC_LITERAL, floatval((string)$number), $this->lineNumber, $this->lineStart, $start, $this->index);
    }

    private function scanHexLiteral($start)
    {
        $number = '';

        while ($this->index < $this->length) {
            if (!Helper::isHexDigit($this->source[$this->index])) {
                break;
            }
            $number .= $this->source[$this->index++];
        }

        if (strlen($number) == 0) {
            $this->throwError(null, Messages::UNEXPECTED_TOKEN_S, self::ILLEGAL);
        }

        if (Helper::isIdentifierStart($this->source->charCodeAt($this->index))) {
            $this->throwError(null, Messages::UNEXPECTED_TOKEN_S, self::ILLEGAL);
        }

        return new Token(Token::NUMERIC_LITERAL, hexdec('0x' . $number), $this->lineNumber, $this->lineStart, $start, $this->index);
    }

    private function scanOctalLiteral($start)
    {
        $number = '0' . $this->source[$this->index++];
        while ($this->index < $this->length) {
            if (!Helper::isOctalDigit($this->source[$this->index])) {
                break;
            }
            $number .= $this->source[$this->index++];
        }

        if (Helper::isIdentifierStart($this->source->charCodeAt($this->index))
            || Helper::isDecimalDigit($this->source->charCodeAt($this->index))
        ) {
            $this->throwError(null, Messages::UNEXPECTED_TOKEN_S, self::ILLEGAL);
        }

        $token = new Token(Token::NUMERIC_LITERAL, octdec($number), $this->lineNumber, $this->lineStart, $start, $this->index);

        $token->octal = true;

        return $token;
    }

    private function advanceSlash()
    {
        // Using the following algorithm:
        // https://github.com/mozilla/sweet.js/wiki/design
        $prevToken = $this->extra->tokens[count($this->extra->tokens) - 1];
        if (!$prevToken) {
            // Nothing before that: it cannot be a division.
            return $this->collectRegex();
        }
        if ($prevToken->type == 'Punctuator') {
            if ($prevToken->value == ']') {
                return $this->scanPunctuator();
            }
            if ($prevToken->value == ')') {
                $checkToken = $this->extra->tokens[$this->extra->openParenToken - 1];
                if ($checkToken
                    && $checkToken->type == TokenName::KEYWORD
                    && ($checkToken->value == 'if'
                        || $checkToken->value == 'while'
                        || $checkToken->value == 'for'
                        || $checkToken->value == 'with')
                ) {
                    return $this->collectRegex();
                }
                return $this->scanPunctuator();
            }
            if ($prevToken->value == '}') {
                // Dividing a function by anything makes little sense,
                // but we have to check for that.
                if ($this->extra->tokens[$this->extra->openCurlyToken - 3]
                    && $this->extra->tokens[$this->extra->openCurlyToken - 3]->type == TokenName::KEYWORD
                ) {
                    // Anonymous function.
                    $checkToken = $this->extra->tokens[$this->extra->openCurlyToken - 4];
                    if (!$checkToken) {
                        return $this->scanPunctuator();
                    }
                } else if ($this->extra->tokens[$this->extra->openCurlyToken - 4]
                    && $this->extra->tokens[$this->extra->openCurlyToken - 4]->type == TokenName::KEYWORD
                ) {
                    // Named function.
                    $checkToken = $this->extra->tokens[$this->extra->openCurlyToken - 5];
                    if (!$checkToken) {
                        return $this->collectRegex();
                    }
                } else {
                    return $this->scanPunctuator();
                }
                // checkToken determines whether the function is
                // a declaration or an expression.
                if (Helper::isFnExprToken($checkToken->value)) {
                    // It is an expression.
                    return $this->scanPunctuator();
                }
                // It is a declaration.
                return $this->collectRegex();
            }
            return $this->collectRegex();
        }
        if ($prevToken->type == TokenName::KEYWORD) {
            return $this->collectRegex();
        }
        return $this->scanPunctuator();
    }

    private function collectRegex()
    {
        $this->skipComment();

        $pos = $this->index;
        $loc = new SourceLocation(new Position($this->lineNumber, $this->index - $this->lineStart), null);


        $regex = $this->scanRegExp();

        $loc->end = new Position($this->lineNumber, $this->index - $this->lineStart);

        /* istanbul ignore next */
        if (!$this->extra->tokenize) {
            // Pop the previous token, which is likely '/' or '/='
            if (count($this->extra->tokens) > 0) {
                $token = $this->extra->tokens[count($this->extra->tokens) - 1];
                if ($token->range[0] == $pos && $token->type == 'Punctuator' && ($token->value == '/' || $token->value == '/=')) {
                        $this->extra->tokens->pop();
                }
            }
            $newToken = new Token('RegularExpression', $regex->literal);
            $newToken->regex = $regex->regex;
            $newToken->range = [$pos, $this->index];
            $newToken->loc = $loc;

            $this->extra->tokens->push($newToken);
        }

        return $regex;
    }

    private function scanRegExp()
    {
        $this->lookahead = null;
        $this->skipComment();
        $start = $this->index;

        $body = $this->scanRegExpBody();
        $flags = $this->scanRegExpFlags();
        $value = $this->testRegExp($body->value, $flags->value);

        if ($this->extra->tokenize) {
            $token = new Token(Token::REGULAR_EXPRESSION, $value, $this->lineNumber, $this->lineStart, $start, $this->index);
            $token->regex = new Regex($body->value, $flags->value);
            return $token;
        }

        return new RegexLiteral($body->literal . $flags->literal, $value, new Regex($body->value, $flags->value), $start, $this->index);
    }

    private function scanRegExpBody()
    {
        $ch = $this->source[$this->index];
        assert($ch == '/', 'Regular expression literal must start with a slash');
        $str = $this->source[$this->index++];

        $classMarker = false;
        $terminated = false;
        while ($this->index < $this->length) {
            $ch = $this->source[$this->index++];
            $str .= $ch;
            if ($ch == '\\') {
                $ch = $this->source[$this->index++];
                // ECMA-262 7.8.5
                if (Helper::isLineTerminator($ch->charCodeAt(0))) {
                    $this->throwError(null, Messages::INVALID_REGULAR_EXPRESSION_MISSING);
                }
                $str .= $ch;
            } else if (Helper::isLineTerminator($ch->charCodeAt(0))) {
                $this->throwError(null, Messages::INVALID_REGULAR_EXPRESSION_MISSING);
            } else if ($classMarker) {
                if ($ch == ']') {
                    $classMarker = false;
                }
            } else {
                if ($ch == '/') {
                    $terminated = true;
                    break;
                } else if ($ch == '[') {
                    $classMarker = true;
                }
            }
        }

        if (!$terminated) {
            $this->throwError(null, Messages::INVALID_REGULAR_EXPRESSION_MISSING);
        }
        // Exclude leading and trailing slash.
        $body = substr($str, 1, strlen($str) - 2);

        return new RegexLiteral($str, $body);
    }

    private function scanRegExpFlags()
    {
        $str = '';
        $flags = '';
        while ($this->index < $this->length) {
            $ch = $this->source[$this->index];
            if (!Helper::isIdentifierPart($ch->charCodeAt(0))) {
                break;
            }

            ++$this->index;
            if ($ch == '\\' && $this->index < $this->length) {
                $ch = $this->source[$this->index];
                if ($ch == 'u') {
                    ++$this->index;
                    $restore = $this->index;
                    $ch = $this->scanHexEscape('u');
                    if ($ch) {
                        $flags .= $ch;
                        for ($str .= '\\u'; $restore < $this->index; ++$restore) {
                            $str .= $this->source[$restore];
                        }
                    } else {
                        $this->index = $restore;
                        $flags .= 'u';
                        $str .= '\\u';
                    }
                    $this->throwErrorTolerant(null, Messages::UNEXPECTED_TOKEN_S, self::ILLEGAL);
                } else {
                    $str .= '\\';
                    $this->throwErrorTolerant(null, Messages::UNEXPECTED_TOKEN_S, self::ILLEGAL);
                }
            } else {
                $flags .= $ch;
                $str .= $ch;
            }
        }

        return new RegexLiteral($str, $flags);
    }

    private function throwErrorTolerant()
    {
        try {
            call_user_func_array(array($this, 'throwError'), func_get_args());

        } catch (Exception $e) {
            if ($this->extra->errors) {
                $this->extra->errors->push($e);
            } else {
                throw $e;
            }
        }
    }

    private function testRegExp($pattern, $flags)
    {
        // firefox y flag hack
        if (strpos($flags, 'y') !== false) {
            return null;
        }

        $exp = "/" . $pattern . "/" . $flags;
        if (@preg_match($exp, null) === false) {
            $this->throwError(null, Messages::INVALID_REGULAR_EXPRESSION);
        } else {
            return $exp;
        }
    }

    private function throwUnexpected($token)
    {
        if ($token->type == Token::EOF) {
            $this->throwError($token, Messages::UNEXPECTED_END_OF_INPUT);
        }

        if ($token->type == Token::NUMERIC_LITERAL) {
            $this->throwError($token, Messages::UNEXPECTED_NUMBER);
        }

        if ($token->type == Token::STRING_LITERAL) {
            $this->throwError($token, Messages::UNEXPECTED_STRING);
        }

        if ($token->type == Token::IDENTIFIER) {
            $this->throwError($token, Messages::UNEXPECTED_IDENTIFIER);
        }

        if ($token->type == Token::KEYWORD) {
            if (Helper::isFutureReservedWord($token->value)) {
                $this->throwError($token, Messages::UNEXPECTED_RESERVED_WORD);
            } else if ($this->strict && Helper::isStrictModeReservedWord($token->value)) {
                $this->throwErrorTolerant($token, Messages::USE_OF_FUTURE_RESERVED_WORD_IN_STRICT_MODE);
                return;
            }
            $this->throwError($token, Messages::UNEXPECTED_TOKEN_S, $token->value);
        }

        // BooleanLiteral, NullLiteral, or Punctuator.
        $this->throwError($token, Messages::UNEXPECTED_TOKEN_S, $token->value);
    }

    private function parseLeftHandSideExpression()
    {
        assert($this->state->allowIn, 'callee of new expression always allow in keyword.');

        $startToken = $this->lookahead;

        $expr = $this->matchKeyword('new') ? $this->parseNewExpression() : $this->parsePrimaryExpression();

        for (; ;) {
            if ($this->match('[')) {
                $property = $this->parseComputedMember();
                $expr = (new MemberExpression($this, $startToken))->finish($this, '[', $expr, $property);
            } else if ($this->match('.')) {
                $property = $this->parseNonComputedMember();
                $expr = (new MemberExpression($this, $startToken))->finish($this, '.', $expr, $property);
            } else {
                break;
            }
        }
        return $expr;
    }

    private function parsePrimaryExpression()
    {

        $expr = null;
        if ($this->match('(')) {
            return $this->parseGroupExpression();
        }

        if ($this->match('[')) {
            return $this->parseArrayInitialiser();
        }

        if ($this->match('{')) {
            return $this->parseObjectInitialiser();
        }

        $type = $this->lookahead->type;
        $node = new MutableNode($this);

        if ($type == Token::IDENTIFIER) {
            $expr = $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_IDENTIFIER, $this, $this->lex()->value);
        } else if ($type == Token::STRING_LITERAL || $type == Token::NUMERIC_LITERAL) {
            if ($this->strict && $this->lookahead->octal) {
                $this->throwErrorTolerant($this->lookahead, Messages::OCTAL_LITERALS_ARE_NOT_ALLOWED_IN_STRICT_MODE);
            }
            $expr = $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_EXPRESSION_LITERAL, $this, $this->lex());
        } else if ($type == Token::KEYWORD) {
            if ($this->matchKeyword('function')) {
                return $this->parseFunctionExpression();
            }
            if ($this->matchKeyword('this')) {
                $this->lex();
                $expr = $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_EXPRESSION_THIS_EXPRESSION, $this);
            } else {
                $this->throwUnexpected($this->lex());
            }
        } else if ($type == Token::BOOLEAN_LITERAL) {
            $token = $this->lex();
            $token->value = ($token->value == 'true');
            $expr = $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_EXPRESSION_LITERAL, $this, $token);
        } else if ($type == Token::NULL_LITERAL) {
            $token = $this->lex();
            $token->value = null;
            $expr = $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_EXPRESSION_LITERAL, $this, $token);
        } else if ($this->match('/') || $this->match('/=')) {
            if ($this->extra->tokens) {
                $expr = $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_EXPRESSION_LITERAL, $this, $this->collectRegex());
            } else {
                $expr = $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_EXPRESSION_LITERAL, $this, $this->scanRegExp());
            }
            $this->peek();
        } else {
            $this->throwUnexpected($this->lex());
        }

        return $expr;
    }

    private function match($value)
    {
        return $this->lookahead->type == Token::PUNCTUATOR && $this->lookahead->value == $value;
    }

    private function parseGroupExpression()
    {
        $this->expect('(');

        if ($this->match(')')) {
            $this->lex();
            return PlaceHolders::ArrowParameterPlaceHolder();
        }

        ++$this->state->parenthesisCount;

        $expr = $this->parseExpression();

        $this->expect(')');

        return $expr;
    }

    private function expect($value)
    {
        $token = $this->lex();
        if ($token->type !== Token::PUNCTUATOR || $token->value != $value) {
            $this->throwUnexpected($token);
        }
    }

    private function parseExpression()
    {
        $startToken = $this->lookahead;

        $expr = $this->parseAssignmentExpression();

        if ($this->match(',')) {
            $expressions = new ArrayList([$expr]);

            while ($this->index < $this->length) {
                if (!$this->match(',')) {
                    break;
                }
                $this->lex();
                $expressions->push($this->parseAssignmentExpression());
            }

            $expr = (new SequenceExpression($this, $startToken))->finish($this, $expressions);
        }

        return $expr;
    }

    private function parseAssignmentExpression()
    {
        $oldParenthesisCount = $this->state->parenthesisCount;
        $startToken = $this->lookahead;
        $token = $this->lookahead;
        $list = null;
        $expr = $this->parseConditionalExpression();

        if ($expr == PlaceHolders::ArrowParameterPlaceHolder() || $this->match('=>')) {
            if ($this->state->parenthesisCount == $oldParenthesisCount
                || $this->state->parenthesisCount == ($oldParenthesisCount + 1)
            ) {
                if ($expr->type == Syntax::IDENTIFIER) {
                    $list = $this->reinterpretAsCoverFormalsList([$expr]);
                } else if ($expr->type == Syntax::ASSIGNMENT_EXPRESSION) {
                    $list = $this->reinterpretAsCoverFormalsList([$expr]);
                } else if ($expr->type == Syntax::SEQUENCE_EXPRESSION) {
                    $list = $this->reinterpretAsCoverFormalsList($expr->expressions);
                } else if ($expr == PlaceHolders::ArrowParameterPlaceHolder()) {
                    $list = $this->reinterpretAsCoverFormalsList(new ArrayList());
                }
                if ($list) {
                    return $this->parseArrowFunctionExpression($list, new MutableNode($this, $startToken));
                }
            }
        }

        if ($this->matchAssign()) {
            // LeftHandSideExpression
            if (!Helper::isLeftHandSide($expr)) {
                $this->throwErrorTolerant(null, Messages::INVALID_LEFT_HAND_SIDE_IN_ASSIGNMENT);
            }

            // 11.13.1
            if ($this->strict && $expr->type == Syntax::IDENTIFIER && Helper::isRestrictedWord($expr->name)) {
                $this->throwErrorTolerant($token, Messages::ASSIGNMENT_TO_EVAL_OR_ARGUMENTS_IS_NOT_ALLOWED_IN_STRICT_MODE);
            }

            $token = $this->lex();
            $right = $this->parseAssignmentExpression();
            $expr = (new AssignmentExpression($this, $startToken))->finish($this, $token->value, $expr, $right);
        }

        return $expr;
    }

    private function reinterpretAsCoverFormalsList($expressions)
    {
        $params = new ArrayList();
        $defaults = new ArrayList();
        $defaultCount = 0;
        $rest = null;
        $options = new stdClass();
        $options->stricted = false;
        $options->firstRestricted = false;
        $options->message = false;
        $options->paramSet = new ArrayList();

        for ($i = 0, $len = count($expressions); $i < $len; $i += 1) {
            $param = $expressions[$i];
            if ($param->type == Syntax::IDENTIFIER) {
                $params->push($param);
                $defaults->push(null);
                $this->validateParam($options, $param, $param->name);
            } else if ($param->type == Syntax::ASSIGNMENT_EXPRESSION) {
                $params->push($param->left);
                $defaults->push($param->right);
                ++$defaultCount;
                $this->validateParam($options, $param->left, $param->left->name);
            } else {
                return null;
            }
        }

        if ($options->message == Messages::STRICT_MODE_FUNCTION_MAY_NOT_HAVE_DUPLICATE_PARAMETER_NAMES) {
            $this->throwError(
                $this->strict ? $options->stricted : $options->firstRestricted,
                $options->message
            );
        }

        if ($defaultCount == 0) {
            $defaults = new ArrayList();
        }

        return (object)[
            'params' => $params,
            'defaults' => $defaults,
            'rest' => $rest,
            'stricted' => $options->stricted,
            'firstRestricted' => $options->firstRestricted,
            'message' => $options->message
        ];
    }

    private function validateParam($options, $param, $name)
    {
        $key = '$' . $name;
        if ($this->strict) {
            if (Helper::isRestrictedWord($name)) {
                $options->stricted = $param;
                $options->message = Messages::PARAMETER_NAME_EVAL_OR_ARGUMENTS_IS_NOT_ALLOWED_IN_STRICT_MODE;
            }
            if ($options->paramSet->offsetExists($key)) {
                $options->stricted = $param;
                $options->message = Messages::STRICT_MODE_FUNCTION_MAY_NOT_HAVE_DUPLICATE_PARAMETER_NAMES;
            }
        } else if (!property_exists($options, 'firstRestricted') || !$options->firstRestricted) {
            if (Helper::isRestrictedWord($name)) {
                $options->firstRestricted = $param;
                $options->message = Messages::PARAMETER_NAME_EVAL_OR_ARGUMENTS_IS_NOT_ALLOWED_IN_STRICT_MODE;
            } else if (Helper::isStrictModeReservedWord($name)) {
                $options->firstRestricted = $param;
                $options->message = Messages::USE_OF_FUTURE_RESERVED_WORD_IN_STRICT_MODE;
            } else if ($options->paramSet->offsetExists($key)) {
                $options->firstRestricted = $param;
                $options->message = Messages::STRICT_MODE_FUNCTION_MAY_NOT_HAVE_DUPLICATE_PARAMETER_NAMES;
            }
        }
        $options->paramSet[$key] = true;
    }

    private function parseArrowFunctionExpression($options, MutableNode $node)
    {

        $this->expect('=>');
        $previousStrict = $this->strict;

        $body = $this->parseConciseBody();

        if ($this->strict && $options->firstRestricted) {
            $this->throwError($options->firstRestricted, $options->message);
        }
        if ($this->strict && $options->stricted) {
            $this->throwErrorTolerant($options->stricted, $options->message);
        }

        $this->strict = $previousStrict;

        return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_EXPRESSION_ARROW_FUNCTION_EXPRESSION, $this, $options->params, $options->defaults, $body, $body->type !== Syntax::BLOCK_STATEMENT);
    }

    private function parseConciseBody()
    {
        if ($this->match('{')) {
            return $this->parseFunctionSourceElements();
        }
        return $this->parseAssignmentExpression();
    }

    private function parseFunctionSourceElements()
    {
        $firstRestricted = false;
        $sourceElements = new ArrayList();
        $node = new BlockStatement($this);
        $this->expect('{');

        while ($this->index < $this->length) {
            if ($this->lookahead->type !== Token::STRING_LITERAL) {
                break;
            }
            $token = $this->lookahead;

            $sourceElement = $this->parseSourceElement();
            $sourceElements->push($sourceElement);
            if ($sourceElement->expression->type !== Syntax::LITERAL) {
                // this is not directive
                break;
            }
            $directive = $this->source->slice($token->start + 1, $token->end - 1);
            if ($directive == 'use strict') {
                $this->strict = true;
                if ($firstRestricted) {
                    $this->throwErrorTolerant($firstRestricted, Messages::OCTAL_LITERALS_ARE_NOT_ALLOWED_IN_STRICT_MODE);
                }
            } else {
                if (!$firstRestricted && $token->octal) {
                    $firstRestricted = $token;
                }
            }
        }

        $oldLabelSet = $this->state->labelSet;
        $oldInIteration = $this->state->inIteration;
        $oldInSwitch = $this->state->inSwitch;
        $oldInFunctionBody = $this->state->inFunctionBody;
        $oldParenthesisCount = $this->state->parenthesizedCount;

        $this->state->labelSet = new ArrayList();
        $this->state->inIteration = false;
        $this->state->inSwitch = false;
        $this->state->inFunctionBody = true;
        $this->state->parenthesizedCount = 0;

        while ($this->index < $this->length) {
            if ($this->match('}')) {
                break;
            }
            $sourceElement = $this->parseSourceElement();
            if ($sourceElement == null) {
                break;
            }
            $sourceElements->push($sourceElement);
        }

        $this->expect('}');

        $this->state->labelSet = $oldLabelSet;
        $this->state->inIteration = $oldInIteration;
        $this->state->inSwitch = $oldInSwitch;
        $this->state->inFunctionBody = $oldInFunctionBody;
        $this->state->parenthesizedCount = $oldParenthesisCount;

        return $node->finish($this, $sourceElements);
    }

    private function parseSourceElement()
    {
        if ($this->lookahead->type == Token::KEYWORD) {
            switch ($this->lookahead->value) {
                case 'const':
                case 'let':
                    return $this->parseConstLetDeclaration($this->lookahead->value);
                case 'function':
                    return $this->parseFunctionDeclaration();
                default:
                    return $this->parseStatement();
            }
        }

        if ($this->lookahead->type !== Token::EOF) {
            return $this->parseStatement();
        }
    }

    private function parseConstLetDeclaration($kind)
    {
        $node = new VariableDeclaration($this);
        $this->expectKeyword($kind);
        $declarations = $this->parseVariableDeclarationList($kind);
        $this->consumeSemicolon();

        return $node->finish($this, $declarations, $kind);
    }

    private function parseVariableDeclarationList($kind = null)
    {
        $list = new ArrayList();

        do {
            $list->push($this->parseVariableDeclaration($kind));
            if (!$this->match(',')) {
                break;
            }
            $this->lex();
        } while ($this->index < $this->length);

        return $list;
    }

    private function parseVariableDeclaration($kind = null)
    {
        $node = new VariableDeclarator($this);
        $init = null;
        $id = $this->parseVariableIdentifier();

        // 12.2.1
        if ($this->strict && Helper::isRestrictedWord($id->name)) {
            $this->throwErrorTolerant(null, Messages::VARIABLE_NAME_MAY_NOT_BE_EVAL_OR_ARGUMENTS_IN_STRICT_MODE);
        }

        if ($kind == 'const') {
            $this->expect('=');
            $init = $this->parseAssignmentExpression();
        } else if ($this->match('=')) {
            $this->lex();
            $init = $this->parseAssignmentExpression();
        }

        return $node->finish($this, $id, $init);
    }

    /**
     * @return Node\Expression\Identifier
     */
    private function parseVariableIdentifier()
    {
        $node = new Identifier($this);
        $token = $this->lex();

        if ($token->type !== Token::IDENTIFIER) {
            $this->throwUnexpected($token);
        }

        return $node->finish($this, $token->value);
    }

    private function consumeSemicolon()
    {
        // Catch the very common case first: immediately a semicolon (U+003B).
        if ($this->source->charCodeAt($this->index) == 0x3B || $this->match(';')) {
            $this->lex();
            return;
        }

        $line = $this->lineNumber;
        $this->skipComment();
        if ($this->lineNumber !== $line) {
            return;
        }

        if ($this->lookahead->type !== Token::EOF && !$this->match('}')) {
            $this->throwUnexpected($this->lookahead);
        }
    }

    private function parseFunctionDeclaration()
    {
        $node = new FunctionDeclaration($this);
        $message = '';
        $firstRestricted = null;
        $this->expectKeyword('function');
        $token = $this->lookahead;
        $id = $this->parseVariableIdentifier();
        if ($this->strict) {
            if (Helper::isRestrictedWord($token->value)) {
                $this->throwErrorTolerant($token, Messages::FUNCTION_NAME_MAY_NOT_BE_EVAL_OR_ARGUMENTS_IN_STRICT_MODE);
            }
        } else {
            if (Helper::isRestrictedWord($token->value)) {
                $firstRestricted = $token;
                $message = Messages::FUNCTION_NAME_MAY_NOT_BE_EVAL_OR_ARGUMENTS_IN_STRICT_MODE;
            } else if (Helper::isStrictModeReservedWord($token->value)) {
                $firstRestricted = $token;
                $message = Messages::USE_OF_FUTURE_RESERVED_WORD_IN_STRICT_MODE;
            }
        }

        $tmp = $this->parseParams($firstRestricted);
        $params = $tmp->params;
        $defaults = $tmp->defaults;
        $stricted = $tmp->stricted;
        $firstRestricted = $tmp->firstRestricted;
        if ($tmp->message) {
            $message = $tmp->message;
        }

        $previousStrict = $this->strict;
        $body = $this->parseFunctionSourceElements();
        if ($this->strict && $firstRestricted) {
            $this->throwError($firstRestricted, $message);
        }
        if ($this->strict && $stricted) {
            $this->throwErrorTolerant($stricted, $message);
        }
        $this->strict = $previousStrict;

        return $node->finish($this, $id, $params, $defaults, $body);
    }

    private function parseParams($firstRestricted)
    {

        $options = new stdClass();
        $options->params = new ArrayList();
        $options->defaultCount = 0;
        $options->defaults = new ArrayList();
        $options->firstRestricted = $firstRestricted;
        $options->stricted = false;
        $options->message = false;


        $this->expect('(');

        if (!$this->match(')')) {
            $options->paramSet = new ArrayList();
            while ($this->index < $this->length) {
                if (!$this->parseParam($options)) {
                    break;
                }
                $this->expect(',');
            }
        }

        $this->expect(')');

        if ($options->defaultCount == 0) {
            $options->defaults = new ArrayList();
        }

        return $options;
    }

    private function parseParam($options)
    {
        $def = null;
        $token = $this->lookahead;
        $param = $this->parseVariableIdentifier();
        $this->validateParam($options, $token, $token->value);
        if ($this->match('=')) {
            $this->lex();
            $def = $this->parseAssignmentExpression();
            ++$options->defaultCount;
        }

        $options->params->push($param);
        $options->defaults->push($def);

        return !$this->match(')');
    }

    private function parseStatement()
    {
        $type = $this->lookahead->type;

        if ($type == Token::EOF) {
            $this->throwUnexpected($this->lookahead);
        }

        if ($type == Token::PUNCTUATOR && $this->lookahead->value == '{') {
            return $this->parseBlock();
        }

        $node = new MutableNode($this);
        if ($type == Token::PUNCTUATOR) {
            switch ($this->lookahead->value) {
                case ';':
                    return $this->parseEmptyStatement($node);
                case '(':
                    return $this->parseExpressionStatement($node);
                default:
                    break;
            }
        } else if ($type == Token::KEYWORD) {
            switch ($this->lookahead->value) {
                case 'break':
                    return $this->parseBreakStatement($node);
                case 'continue':
                    return $this->parseContinueStatement($node);
                case 'debugger':
                    return $this->parseDebuggerStatement($node);
                case 'do':
                    return $this->parseDoWhileStatement($node);
                case 'for':
                    return $this->parseForStatement($node);
                case 'function':
                    return $this->parseFunctionDeclaration($node);
                case 'if':
                    return $this->parseIfStatement($node);
                case 'return':
                    return $this->parseReturnStatement($node);
                case 'switch':
                    return $this->parseSwitchStatement($node);
                case 'throw':
                    return $this->parseThrowStatement($node);
                case 'try':
                    return $this->parseTryStatement($node);
                case 'var':
                    return $this->parseVariableStatement($node);
                case 'while':
                    return $this->parseWhileStatement($node);
                case 'with':
                    return $this->parseWithStatement($node);
                default:
                    break;
            }
        }

        $expr = $this->parseExpression();

        // 12.12 Labelled Statements
        if (($expr->type == Syntax::IDENTIFIER) && $this->match(':')) {
            $this->lex();

            $key = '$' . $expr->name;
            if (isset($this->state->labelSet[$key])) {
                $this->throwError(null, Messages::S_S_HAS_ALREADY_BEEN_DECLARED, 'Label', $expr->name);
            }

            $this->state->labelSet[$key] = true;
            $labeledBody = $this->parseStatement();
            unset($this->state->labelSet[$key]);

            return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_LABELED_STATEMENT, $this, $expr, $labeledBody);
        }

        $this->consumeSemicolon();

        return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_EXPRESSION_STATEMENT, $this, $expr);
    }

    private function parseBlock()
    {
        $node = new BlockStatement($this);

        $this->expect('{');

        $block = $this->parseStatementList();

        $this->expect('}');

        return $node->finish($this, $block);
    }

    private function parseStatementList()
    {
        $list = new ArrayList();


        while ($this->index < $this->length) {
            if ($this->match('}')) {
                break;
            }
            $statement = $this->parseSourceElement();
            if ($statement == null) {
                break;
            }
            $list->push($statement);
        }

        return $list;
    }

    private function parseEmptyStatement()
    {
        $node = new EmptyStatement($this);
        $this->expect(';');

        return $node->finish($this);
    }

    private function parseExpressionStatement(MutableNode $node)
    {
        $expr = $this->parseExpression();
        $this->consumeSemicolon();

        return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_EXPRESSION_STATEMENT, $this, $expr);
    }

    private function parseBreakStatement(MutableNode $node)
    {
        $label = null;
        $this->expectKeyword('break');
        // Catch the very common case first: immediately a semicolon (U+003B).
        if ($this->source->charCodeAt($this->index) == 0x3B) {
            $this->lex();

            if (!($this->state->inIteration || $this->state->inSwitch)) {
                $this->throwError(null, Messages::ILLEGAL_BREAK_STATEMENT);
            }

            return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_BREAK_STATEMENT, $this, null);
        }

        if ($this->peekLineTerminator()) {
            if (!($this->state->inIteration || $this->state->inSwitch)) {
                $this->throwError(null, Messages::ILLEGAL_BREAK_STATEMENT);
            }

            return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_BREAK_STATEMENT, $this, null);
        }

        if ($this->lookahead->type == Token::IDENTIFIER) {
            $label = $this->parseVariableIdentifier();

            $key = '$' . $label->name;
            if (!$this->state->labelSet->offsetExists($key)) {
                $this->throwError(null, Messages::UNDEFINED_LABEL_S, $label->name);
            }
        }

        $this->consumeSemicolon();

        if ($label == null && !($this->state->inIteration || $this->state->inSwitch)) {
            $this->throwError(null, Messages::ILLEGAL_BREAK_STATEMENT);
        }

        return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_BREAK_STATEMENT, $this, $label);
    }

    private function peekLineTerminator()
    {
        $pos = $this->index;
        $line = $this->lineNumber;
        $start = $this->lineStart;
        $this->skipComment();
        $found = $this->lineNumber !== $line;
        $this->index = $pos;
        $this->lineNumber = $line;
        $this->lineStart = $start;

        return $found;
    }

    private function parseContinueStatement(MutableNode $node)
    {
        $label = null;

        $this->expectKeyword('continue');

        // Optimize the most common form: 'continue;'.
        if ($this->source->charCodeAt($this->index) == 0x3B) {
            $this->lex();

            if (!$this->state->inIteration) {
                $this->throwError(null, Messages::ILLEGAL_CONTINUE_STATEMENT);
            }

            return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_CONTINUE_STATEMENT, $this, null);
        }

        if ($this->peekLineTerminator()) {
            if (!$this->state->inIteration) {
                $this->throwError(null, Messages::ILLEGAL_CONTINUE_STATEMENT);
            }

            return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_CONTINUE_STATEMENT, $this, null);
        }

        if ($this->lookahead->type == Token::IDENTIFIER) {
            $label = $this->parseVariableIdentifier();

            $key = '$' . $label->name;
            if (!$this->state->labelSet->offsetExists($key)) {
                $this->throwError(null, Messages::UNDEFINED_LABEL_S, $label->name);
            }
        }

        $this->consumeSemicolon();

        if ($label == null && !$this->state->inIteration) {
            $this->throwError(null, Messages::ILLEGAL_CONTINUE_STATEMENT);
        }

        return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_CONTINUE_STATEMENT, $this, $label);
    }

    private function parseDebuggerStatement(MutableNode $node)
    {
        $this->expectKeyword('debugger');

        $this->consumeSemicolon();

        return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_DEBUGGER_STATEMENT, $this);
    }

    private function parseDoWhileStatement(MutableNode $node)
    {
        $this->expectKeyword('do');
        $oldInIteration = $this->state->inIteration;
        $this->state->inIteration = true;
        $body = $this->parseStatement();
        $this->state->inIteration = $oldInIteration;
        $this->expectKeyword('while');
        $this->expect('(');

        $test = $this->parseExpression();

        $this->expect(')');

        if ($this->match(';')) {
            $this->lex();
        }

        return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_DO_WHILE_STATEMENT, $this, $body, $test);
    }

    private function parseForStatement(MutableNode $node)
    {
        $previousAllowIn = $this->state->allowIn;
        $left = $init = $test = $update = null;
        $this->expectKeyword('for');
        $this->expect('(');

        if ($this->match(';')) {
            $this->lex();
        } else {
            if ($this->matchKeyword('var') || $this->matchKeyword('let')) {
                $this->state->allowIn = false;
                $init = $this->parseForVariableDeclaration();
                $this->state->allowIn = $previousAllowIn;

                if (count($init->declarations) == 1 && $this->matchKeyword('in')) {
                    $this->lex();
                    $left = $init;
                    $right = $this->parseExpression();
                    $init = null;
                }
            } else {
                $this->state->allowIn = false;
                $init = $this->parseExpression();
                $this->state->allowIn = $previousAllowIn;

                if ($this->matchKeyword('in')) {
                    // LeftHandSideExpression
                    if (!Helper::isLeftHandSide($init)) {
                        $this->throwErrorTolerant(null, Messages::INVALID_LEFT_HAND_SIDE_IN_FOR_IN);
                    }

                    $this->lex();
                    $left = $init;
                    $right = $this->parseExpression();
                    $init = null;
                }
            }

            if (!$left) {
                $this->expect(';');
            }
        }

        if (!$left) {

            if (!$this->match(';')) {
                $test = $this->parseExpression();
            }
            $this->expect(';');

            if (!$this->match(')')) {
                $update = $this->parseExpression();
            }
        }

        $this->expect(')');

        $oldInIteration = $this->state->inIteration;
        $this->state->inIteration = true;

        $body = $this->parseStatement();

        $this->state->inIteration = $oldInIteration;

        return (!$left) ?
            $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_FOR_STATEMENT, $this, $init, $test, $update, $body) :
            $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_FOR_IN_STATEMENT, $this, $left, $right, $body);

    }

    private function parseForVariableDeclaration()
    {
        $node = new VariableDeclaration($this);

        $token = $this->lex();
        $declarations = $this->parseVariableDeclarationList();

        return $node->finish($this, $declarations, $token->value);
    }

    private function parseIfStatement(MutableNode $node)
    {
        $this->expectKeyword('if');
        $this->expect('(');
        $test = $this->parseExpression();
        $this->expect(')');
        $consequent = $this->parseStatement();
        if ($this->matchKeyword('else')) {
            $this->lex();
            $alternate = $this->parseStatement();
        } else {
            $alternate = null;
        }

        return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_IF_STATEMENT, $this, $test, $consequent, $alternate);
    }

    private function parseReturnStatement(MutableNode $node)
    {
        $argument = null;

        $this->expectKeyword('return');

        if (!$this->state->inFunctionBody) {
            $this->throwErrorTolerant(null, Messages::ILLEGAL_RETURN_STATEMENT);
        }

        // 'return' followed by a space and an identifier is very common.
        if ($this->source->charCodeAt($this->index) == 0x20 && Helper::isIdentifierStart($this->source->charCodeAt($this->index + 1))) {
                $argument = $this->parseExpression();
                $this->consumeSemicolon();
                return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_RETURN_STATEMENT, $this, $argument);
        }

        if ($this->peekLineTerminator()) {
            return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_RETURN_STATEMENT, $this, null);
        }

        if (!$this->match(';') && !$this->match('}') && $this->lookahead->type !== Token::EOF) {
                $argument = $this->parseExpression();
        }

        $this->consumeSemicolon();

        return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_RETURN_STATEMENT, $this, $argument);
    }

    private function parseSwitchStatement(MutableNode $node)
    {
        $this->expectKeyword('switch');

        $this->expect('(');

        $discriminant = $this->parseExpression();

        $this->expect(')');

        $this->expect('{');

        $cases = new ArrayList();

        if ($this->match('}')) {
            $this->lex();
            return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_SWITCH_STATEMENT, $this, $discriminant, $cases);
        }

        $oldInSwitch = $this->state->inSwitch;
        $this->state->inSwitch = true;
        $defaultFound = false;

        while ($this->index < $this->length) {
            if ($this->match('}')) {
                break;
            }
            $clause = $this->parseSwitchCase();
            if ($clause->test == null) {
                if ($defaultFound) {
                    $this->throwError(null, Messages::MORE_THAN_ONE_DEFAULT_CLAUSE_IN_SWITCH_STATEMENT);
                }
                $defaultFound = true;
            }
            $cases->push($clause);
        }

        $this->state->inSwitch = $oldInSwitch;

        $this->expect('}');

        return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_SWITCH_STATEMENT, $this, $discriminant, $cases);
    }

    private function parseSwitchCase()
    {
        $consequent = new ArrayList();
        $node = new SwitchCase($this);

        if ($this->matchKeyword('default')) {
            $this->lex();
            $test = null;
        } else {
            $this->expectKeyword('case');
            $test = $this->parseExpression();
        }
        $this->expect(':');

        while ($this->index < $this->length) {
            if ($this->match('}') || $this->matchKeyword('default') || $this->matchKeyword('case')) {
                break;
            }
            $statement = $this->parseStatement();
            $consequent->push($statement);
        }

        return $node->finish($this, $test, $consequent);
    }

    private function parseThrowStatement(MutableNode $node)
    {
        $this->expectKeyword('throw');

        if ($this->peekLineTerminator()) {
            $this->throwError(null, Messages::ILLEGAL_NEWLINE_AFTER_THROW);
        }

        $argument = $this->parseExpression();

        $this->consumeSemicolon();

        return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_THROW_STATEMENT, $this, $argument);
    }

    private function parseTryStatement(MutableNode $node)
    {
        $handlers = new ArrayList();
        $finalizer = null;

        $this->expectKeyword('try');

        $block = $this->parseBlock();

        if ($this->matchKeyword('catch')) {
            $handlers->push($this->parseCatchClause());
        }

        if ($this->matchKeyword('finally')) {
            $this->lex();
            $finalizer = $this->parseBlock();
        }

        if (count($handlers) == 0 && !$finalizer) {
            $this->throwError(null, Messages::MISSING_CATCH_OR_FINALLY_AFTER_TRY);
        }

        return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_TRY_STATEMENT, $this, $block, new ArrayList(), $handlers, $finalizer);

    }

    private function parseCatchClause()
    {
        $node = new CatchClause($this);

        $this->expectKeyword('catch');

        $this->expect('(');
        if ($this->match(')')) {
            $this->throwUnexpected($this->lookahead);
        }

        $param = $this->parseVariableIdentifier();
        // 12.14.1
        if ($this->strict && Helper::isRestrictedWord($param->name)) {
            $this->throwErrorTolerant(null, Messages::CATCH_VARIABLE_MAY_NOT_BE_EVAL_OR_ARGUMENTS_IN_STRICT_MODE);
        }

        $this->expect(')');
        $body = $this->parseBlock();
        return $node->finish($this, $param, $body);
    }

    private function parseVariableStatement(MutableNode $node)
    {
        $this->expectKeyword('var');

        $declarations = $this->parseVariableDeclarationList();

        $this->consumeSemicolon();

        return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_DECLARATION_VARIABLE_DECLARATION, $this, $declarations, 'var');
    }

    private function parseWhileStatement(MutableNode $node)
    {
        $this->expectKeyword('while');
        $this->expect('(');
        $test = $this->parseExpression();
        $this->expect(')');
        $oldInIteration = $this->state->inIteration;
        $this->state->inIteration = true;
        $body = $this->parseStatement();
        $this->state->inIteration = $oldInIteration;

        return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_WHILE_STATEMENT, $this, $test, $body);
    }

    private function parseWithStatement(MutableNode $node)
    {
        if ($this->strict) {
            // TODO(ikarienator): Should we update the test cases instead?
            $this->skipComment();
            $this->throwErrorTolerant(null, Messages::STRICT_MODE_CODE_MAY_NOT_INCLUDE_A_WITH_STATEMENT);
        }

        $this->expectKeyword('with');

        $this->expect('(');

        $object = $this->parseExpression();

        $this->expect(')');

        $body = $this->parseStatement();

        return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_STATEMENT_WITH_STATEMENT, $this, $object, $body);
    }

    private function matchAssign()
    {
        if ($this->lookahead->type !== Token::PUNCTUATOR) {
            return false;
        }
        $op = $this->lookahead->value;
        return $op == '=' ||
            $op == '*=' ||
            $op == '/=' ||
            $op == '%=' ||
            $op == '+=' ||
            $op == '-=' ||
            $op == '<<=' ||
            $op == '>>=' ||
            $op == '>>>=' ||
            $op == '&=' ||
            $op == '^=' ||
            $op == '|=';
    }

    private function parseArrayInitialiser()
    {
        $elements = new ArrayList();
        $node = new ArrayExpression($this);

        $this->expect('[');

        while (!$this->match(']')) {
            if ($this->match(',')) {
                $this->lex();
                $elements->push(null);
            } else {
                $elements->push($this->parseAssignmentExpression());

                if (!$this->match(']')) {
                    $this->expect(',');
                }
            }
        }

        $this->lex();

        return $node->finish($this, $elements);
    }

    private function parseObjectInitialiser()
    {
        $properties = new ArrayList();
        $map = new ArrayList();
        $node = new ObjectExpression($this);

        $this->expect('{');

        while (!$this->match('}')) {
            $property = $this->parseObjectProperty();

            if ($property->key->type == Syntax::IDENTIFIER) {
                $name = $property->key->name;
            } else {
                $name = (string)$property->key->value;
            }
            $kind = $property->kind == 'init' ? PropertyKind::DATA : ($property->kind == 'get' ? PropertyKind::GET : PropertyKind::SET);

            $key = '$' . $name;
            if (isset($map[$key])) {
                if ($map[$key] == PropertyKind::DATA) {
                    if ($this->strict && $kind == PropertyKind::DATA) {
                        $this->throwErrorTolerant(null, Messages::DUPLICATE_DATA_PROPERTY_IN_OBJECT_LITERAL_NOT_ALLOWED_IN_STRICT_MODE);
                    } else if ($kind != PropertyKind::DATA) {
                        $this->throwErrorTolerant(null, Messages::OBJECT_LITERAL_MAY_NOT_HAVE_DATA_AND_ACCESSOR_PROPERTY_WITH_THE_SAME_NAME);
                    }
                } else {
                    if ($kind == PropertyKind::DATA) {
                        $this->throwErrorTolerant(null, Messages::OBJECT_LITERAL_MAY_NOT_HAVE_DATA_AND_ACCESSOR_PROPERTY_WITH_THE_SAME_NAME);
                    } else if ($map[$key] & $kind) {
                        $this->throwErrorTolerant(null, Messages::OBJECT_LITERAL_MAY_NOT_HAVE_MULTIPLE_GET_SET_ACCESSORS_WITH_THE_SAME_NAME);
                    }
                }
                $map[$key] |= $kind;
            } else {
                $map[$key] = $kind;
            }

            $properties->push($property);

            if (!$this->match('}')) {
                $this->expectTolerant(',');
            }
        }

        $this->expect('}');

        return $node->finish($this, $properties);
    }

    private function parseObjectProperty()
    {
        $node = new Property($this);
        $token = $this->lookahead;

        if ($token->type == Token::IDENTIFIER) {

            $id = $this->parseObjectPropertyKey();

            // Property Assignment: Getter and Setter.

            if ($token->value == 'get' && !$this->match(':')) {
                $key = $this->parseObjectPropertyKey();
                $this->expect('(');
                $this->expect(')');
                $value = $this->parsePropertyFunction(new ArrayList());
                return $node->finish($this, 'get', $key, $value);
            }
            if ($token->value == 'set' && !$this->match(':')) {
                $key = $this->parseObjectPropertyKey();
                $this->expect('(');
                $token = $this->lookahead;
                if ($token->type !== Token::IDENTIFIER) {
                    $this->expect(')');
                    $this->throwErrorTolerant($token, Messages::UNEXPECTED_TOKEN_S, $token->value);
                    $value = $this->parsePropertyFunction(new ArrayList());
                } else {
                    $param = new ArrayList([$this->parseVariableIdentifier()]);
                    $this->expect(')');
                    $value = $this->parsePropertyFunction($param, $token);
                }
                return $node->finish($this, 'set', $key, $value);
            }
            $this->expect(':');
            $value = $this->parseAssignmentExpression();
            return $node->finish($this, 'init', $id, $value);
        }
        if ($token->type == Token::EOF || $token->type == Token::PUNCTUATOR) {
            $this->throwUnexpected($token);
        } else {
            $key = $this->parseObjectPropertyKey();
            $this->expect(':');
            $value = $this->parseAssignmentExpression();
            return $node->finish($this, 'init', $key, $value);
        }
    }

    private function parseObjectPropertyKey()
    {
        $node = new MutableNode($this);
        $token = $this->lex();
        // Note: This function is called only from parseObjectProperty(), where
        // EOF and Punctuator tokens are already filtered out.

        if ($token->type == Token::STRING_LITERAL || $token->type == Token::NUMERIC_LITERAL) {
            if ($this->strict && $token->octal) {
                $this->throwErrorTolerant($token, Messages::OCTAL_LITERALS_ARE_NOT_ALLOWED_IN_STRICT_MODE);
            }

            return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_EXPRESSION_LITERAL, $this, $token);
        }

        return $node->finish(ClassNameConstants::ESPRIMA_PHP_NODE_IDENTIFIER, $this, $token->value);
    }

    private function parsePropertyFunction($param, $first = false)
    {
        $node = new FunctionExpression($this);

        $previousStrict = $this->strict;
        $body = $this->parseFunctionSourceElements();
        if ($first && $this->strict && Helper::isRestrictedWord(isset($param[0]) ? $param[0]->name : '')) {
            $this->throwErrorTolerant($first, Messages::PARAMETER_NAME_EVAL_OR_ARGUMENTS_IS_NOT_ALLOWED_IN_STRICT_MODE);
        }
        $this->strict = $previousStrict;
        return $node->finish($this, null, $param, new ArrayList(), $body);
    }

    private function expectTolerant($value)
    {
        if ($this->extra->errors) {
            $token = $this->lookahead;
            if ($token->type !== Token::PUNCTUATOR && $token->value != $value) {
                $this->throwErrorTolerant($token, Messages::UNEXPECTED_TOKEN_S, $token->value);
            } else {
                $this->lex();
            }
        } else {
            $this->expect($value);
        }
    }

    private function parseFunctionExpression()
    {
        $firstRestricted = null;
        $message = '';
        $id = null;
        $node = new FunctionExpression($this);
        $this->expectKeyword('function');

        if (!$this->match('(')) {
            $token = $this->lookahead;
            $id = $this->parseVariableIdentifier();
            if ($this->strict) {
                if (Helper::isRestrictedWord($token->value)) {
                    $this->throwErrorTolerant($token, Messages::FUNCTION_NAME_MAY_NOT_BE_EVAL_OR_ARGUMENTS_IN_STRICT_MODE);
                }
            } else {
                if (Helper::isRestrictedWord($token->value)) {
                    $firstRestricted = $token;
                    $message = Messages::FUNCTION_NAME_MAY_NOT_BE_EVAL_OR_ARGUMENTS_IN_STRICT_MODE;
                } else if (Helper::isStrictModeReservedWord($token->value)) {
                    $firstRestricted = $token;
                    $message = Messages::USE_OF_FUTURE_RESERVED_WORD_IN_STRICT_MODE;
                }
            }
        }

        $tmp = $this->parseParams($firstRestricted);
        $params = $tmp->params;
        $defaults = $tmp->defaults;
        $stricted = $tmp->stricted;
        $firstRestricted = $tmp->firstRestricted;
        if ($tmp->message) {
            $message = $tmp->message;
        }

        $previousStrict = $this->strict;
        $body = $this->parseFunctionSourceElements();
        if ($this->strict && $firstRestricted) {
            $this->throwError($firstRestricted, $message);
        }
        if ($this->strict && $stricted) {
            $this->throwErrorTolerant($stricted, $message);
        }
        $this->strict = $previousStrict;

        return $node->finish($this, $id, $params, $defaults, $body);
    }

    private function peek()
    {
        $pos = $this->index;
        $line = $this->lineNumber;
        $start = $this->lineStart;
        $this->lookahead = $this->extra->tokens ? $this->collectToken() : $this->advance();
        $this->index = $pos;
        $this->lineNumber = $line;
        $this->lineStart = $start;
    }

    private function parseComputedMember()
    {
        $this->expect('[');

        $expr = $this->parseExpression();

        $this->expect(']');

        return $expr;
    }

    private function parseNonComputedMember()
    {
        $this->expect('.');

        return $this->parseNonComputedProperty();
    }

    private function parseNonComputedProperty()
    {
        $node = new Identifier($this);
        $token = $this->lex();

        if (!Helper::isIdentifierName($token)) {
            $this->throwUnexpected($token);
        }

        return $node->finish($this, $token->value);
    }

    private function parseArguments()
    {
        $args = new ArrayList();

        $this->expect('(');

        if (!$this->match(')')) {
            while ($this->index < $this->length) {
                $args->push($this->parseAssignmentExpression());
                if ($this->match(')')) {
                    break;
                }
                $this->expectTolerant(',');
            }
        }

        $this->expect(')');

        return $args;
    }

    private function initParserOptions($options)
    {
        if ($options !== null) {
            if (array_key_exists('range', $options) && is_bool($options['range'])) {
                $this->extra->range = $options['range'];
            }
            if (array_key_exists('loc', $options) && is_bool($options['loc'])) {
                $this->extra->loc = $options['loc'];
            }
            if (array_key_exists('attachComment', $options) && is_bool($options['attachComment'])) {
                $this->extra->attachComment = $options['attachComment'];
            }
            if ($this->extra->loc && array_key_exists('source', $options) && is_string($options['source'])) {
                $this->extra->source = $options['source'];
            }
            if (array_key_exists('tokens', $options) && is_bool($options['tokens']) && $options['tokens']) {
                $this->extra->tokens = new ArrayList();
            }
            if (array_key_exists('comment', $options) && is_bool($options['comment']) && $options['comment']) {
                $this->extra->comments = new ArrayList();
            }
            if (array_key_exists('tolerant', $options) && is_bool($options['tolerant']) && $options['tolerant']) {
                $this->extra->errors = new ArrayList();
            }

            if ($this->extra->attachComment) {
                $this->extra->range = true;
                $this->extra->comments = new ArrayList();
                $this->extra->bottomRightStack = new ArrayList();
                $this->extra->trailingComments = new ArrayList();
                $this->extra->leadingComments = new ArrayList();
            }
        }
    }

    private function initTokenizerOptions($options)
    {
        $options = $options ?: array();

        $options['tokens'] = true;
        $this->extra->tokens = new ArrayList();
        $this->extra->tokenize = true;
        // The following two fields are necessary to compute the Regex tokens.
        $this->extra->openParenToken = -1;
        $this->extra->openCurlyToken = -1;

        if (array_key_exists('range', $options) && is_bool($options['range'])) {
            $this->extra->range = $options['range'];
        }
        if (array_key_exists('loc', $options) && is_bool($options['loc'])) {
            $this->extra->loc = $options['loc'];
        }
        if (array_key_exists('comment', $options) && is_bool($options['comment']) && $options['comment']) {
            $this->extra->comments = new ArrayList();
        }
        if (array_key_exists('tolerant', $options) && is_bool($options['tolerant']) && $options['tolerant']) {
            $this->extra->errors = new ArrayList();
        }
    }

} 