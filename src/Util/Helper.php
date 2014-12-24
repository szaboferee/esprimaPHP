<?php
namespace EsprimaPhp\Util;

use EsprimaPhp\Parser\Syntax;
use EsprimaPhp\Parser\Token;
use EsprimaPhp\Regex;

class Helper {
	public static function isWhiteSpace($ch) {
        $whitespaces = [ 0x20,0x09,0x0B,0x0C,0xA0,
            0x1680,0x180E,0x2000,0x2001,0x2002,0x2003,
            0x2004,0x2005,0x2006,0x2007,0x2008,0x2009,
            0x200A,0x202F,0x205F,0x3000,0xFEFF
        ];
        return in_array($ch, $whitespaces);
	}
	public static function isLineTerminator($ch) {
		return in_array($ch, [0x0A,  0x0D, 0x2028, 0x2029]);
	}
	public static function isDecimalDigit($ch) {
		return ($ch >= 0x30 && $ch <= 0x39);   // 0..9
	}
	public static function isHexDigit($ch) {
		return strpos('0123456789abcdefABCDEF', (string)$ch) !== false;
	}
	public static function isOctalDigit($ch) {
		return strlen($ch) && strpos('01234567', (string)$ch) !== false;
	}
	public static function isIdentifierStart($ch) {
		return ($ch === 0x24) || ($ch === 0x5F) ||  // $ (dollar) and _ (underscore)
		($ch >= 0x41 && $ch <= 0x5A) ||         // A..Z
		($ch >= 0x61 && $ch <= 0x7A) ||         // a..z
		($ch === 0x5C) ||                      // \ (backslash)
		(($ch >= 0x80) && preg_match(Regex::NonAsciiIdentifierStart, chr($ch))
		);
	}
	public static function isIdentifierPart($ch) {
		return ($ch === 0x24) || ($ch === 0x5F) ||  // $ (dollar) and _ (underscore)
		($ch >= 0x41 && $ch <= 0x5A) ||         // A..Z
		($ch >= 0x61 && $ch <= 0x7A) ||         // a..z
		($ch >= 0x30 && $ch <= 0x39) ||         // 0..9
		($ch === 0x5C) ||                      // \ (backslash)
		(($ch >= 0x80) && preg_match(Regex::NonAsciiIdentifierPart, chr($ch)));
	}
	public static function isKeyword($id, $strict)
	{
        if ($strict && self::isStrictModeReservedWord($id)) {
            return true;
        }

        // 'const' is specialized as Keyword in V8.
        // 'yield' and 'let' are for compatiblity with SpiderMonkey and ES.next.
        // Some others are from future reserved words.

        return in_array($id, [
                'if', 'in', 'do', 'var', 'for', 'new',  'try',  'let',
                'this',  'else',  'case','void',  'with',  'enum',
                'while',  'break',  'catch','throw',  'const',  'yield',
                'class',  'super', 'return',  'typeof',  'delete',
                'switch',  'export',  'import', 'default',  'finally',
                'extends', 'function',  'continue',  'debugger',  'instanceof'
            ]);
    }
	public static function isStrictModeReservedWord($id) {
        return in_array($id, [
            'implements','interface','package','private',
			 'protected','public','static','yield','let'
            ]);
	}

	public static function isFutureReservedWord($id)
	{
        return in_array($id, [
			 'class', 'enum', 'export', 'extends','import', 'super'
            ]);
	}

	public static function isRestrictedWord($id)
	{
		return $id === 'eval' || $id === 'arguments';
	}
	public static function isLeftHandSide($expr) {
		return $expr->type === Syntax::IDENTIFIER || $expr->type === Syntax::MEMBER_EXPRESSION;
	}

	public static function isIdentifierName($token) {
		return $token->type === Token::IDENTIFIER ||
		$token->type === Token::KEYWORD ||
		$token->type === Token::BOOLEAN_LITERAL ||
		$token->type === Token::NULL_LITERAL;
	}

	public static function binaryPrecedence($token, $allowIn) {
		$prec = 0;

		if ($token->type !== Token::PUNCTUATOR && $token->type !== Token::KEYWORD) {
			return 0;
		}

		switch ($token->value) {
			case '||':
				$prec = 1;
				break;

			case '&&':
				$prec = 2;
				break;

			case '|':
				$prec = 3;
				break;

			case '^':
				$prec = 4;
				break;

			case '&':
				$prec = 5;
				break;

			case '==':
			case '!=':
			case '===':
			case '!==':
				$prec = 6;
				break;

			case '<':
			case '>':
			case '<=':
			case '>=':
			case 'instanceof':
				$prec = 7;
				break;

			case 'in':
				$prec = $allowIn ? 7 : 0;
				break;

			case '<<':
			case '>>':
			case '>>>':
				$prec = 8;
				break;

			case '+':
			case '-':
				$prec = 9;
				break;

			case '*':
			case '/':
			case '%':
				$prec = 11;
				break;

			default:
				break;
		}

		return $prec;
	}
	public static function isFnExprToken($value) {
		$FnExprTokens = ['(', '{', '[', 'in', 'typeof', 'instanceof', 'new',
			'return', 'case', 'delete', 'throw', 'void',
			// assignment operators
			'=', '+=', '-=', '*=', '/=', '%=', '<<=', '>>=', '>>>=',
			'&=', '|=', '^=', ',',
			// binary/unary operators
			'+', '-', '*', '/', '%', '++', '--', '<<', '>>', '>>>', '&',
			'|', '^', '!', '~', '&&', '||', '?', ':', '===', '==', '>=',
			'<=', '<', '>', '!=', '!=='];

		return in_array($value, $FnExprTokens);
	}
}