<?php
namespace EsprimaPhp\Util;

use EsprimaPhp\Parser\Syntax;
use EsprimaPhp\Parser\Token;
use EsprimaPhp\Regex;

class Helper {
	public static function isWhiteSpace($ch) {
		return ($ch === 0x20) || ($ch === 0x09) || ($ch === 0x0B) || ($ch === 0x0C) || ($ch === 0xA0)
		|| ($ch >= 0x1680 && in_array($ch, [0x1680, 0x180E, 0x2000, 0x2001, 0x2002, 0x2003, 0x2004, 0x2005, 0x2006, 0x2007, 0x2008, 0x2009, 0x200A, 0x202F, 0x205F, 0x3000, 0xFEFF]));
	}
	public static function isLineTerminator($ch) {
		return ($ch === 0x0A) || ($ch === 0x0D) || ($ch === 0x2028) || ($ch === 0x2029);
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

		switch (strlen($id)) {
			case 2:
				return ($id === 'if') || ($id === 'in') || ($id === 'do');
			case 3:
				return ($id === 'var') || ($id === 'for') || ($id === 'new') ||
				($id === 'try') || ($id === 'let');
			case 4:
				return ($id === 'this') || ($id === 'else') || ($id === 'case') ||
				($id === 'void') || ($id === 'with') || ($id === 'enum');
			case 5:
				return ($id === 'while') || ($id === 'break') || ($id === 'catch') ||
				($id === 'throw') || ($id === 'const') || ($id === 'yield') ||
				($id === 'class') || ($id === 'super');
			case 6:
				return ($id === 'return') || ($id === 'typeof') || ($id === 'delete') ||
				($id === 'switch') || ($id === 'export') || ($id === 'import');
			case 7:
				return ($id === 'default') || ($id === 'finally') || ($id === 'extends');
			case 8:
				return ($id === 'function') || ($id === 'continue') || ($id === 'debugger');
			case 10:
				return ($id === 'instanceof');
			default:
				return false;
		}
	}
	public static function isStrictModeReservedWord($id) {
		switch ($id) {
			case 'implements':
			case 'interface':
			case 'package':
			case 'private':
			case 'protected':
			case 'public':
			case 'static':
			case 'yield':
			case 'let':
				return true;
			default:
				return false;
		}
	}

	public static function isFutureReservedWord($id)
	{
		switch ($id) {
			case 'class':
			case 'enum':
			case 'export':
			case 'extends':
			case 'import':
			case 'super':
				return true;
			default:
				return false;
		}
	}

	public static function isRestrictedWord($id)
	{
		return $id === 'eval' || $id === 'arguments';
	}
	public static function isLeftHandSide($expr) {
		return $expr->type === Syntax::Identifier || $expr->type === Syntax::MemberExpression;
	}

	public static function isIdentifierName($token) {
		return $token->type === Token::Identifier ||
		$token->type === Token::Keyword ||
		$token->type === Token::BooleanLiteral ||
		$token->type === Token::NullLiteral;
	}

	public static function binaryPrecedence($token, $allowIn) {
		$prec = 0;

		if ($token->type !== Token::Punctuator && $token->type !== Token::Keyword) {
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