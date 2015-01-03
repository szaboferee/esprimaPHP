<?php

namespace EsprimaPhp\Node\Expression;
use EsprimaPhp\Node\Expression;
use EsprimaPhp\Parser\Syntax;
use EsprimaPhp\Parser\Token;
use EsprimaPhp\Parser;

/**
 * Class Literal
 */
class Literal extends Expression
{
    /**
     * @var string
     */
    public $type = Syntax::LITERAL;

    /**
     * @var mixed
     */
    public $value;

    /**
     * @var string
     */
    public $raw;

    /**
     * @param Parser $esprima
     * @param $token
     *
     * @return Literal
     */
    public function finish($esprima, $token) 
    {

        switch($token->type) {
        case Token::BOOLEAN_LITERAL:
            $this->value = (boolean) $token->value;
            break;
        case Token::STRING_LITERAL:
            $this->value = stripcslashes((string)$token->value);
            break;
        case Token::NUMERIC_LITERAL:
        default:
            $this->value = $token->value;
            break;
        }

        $this->raw = $esprima->source->slice($token->start, $token->end);
        if ($token->regex) {
            $this->regex = $token->regex;
        }
        return $this->finishNode($esprima);
    }
}