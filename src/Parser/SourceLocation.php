<?php
namespace EsprimaPhp\Parser;

class SourceLocation {
	/**
	 * @var Position
	 */
	public $start;
	/**
	 * @var Position
	 */
	public $end;

	/**
	 * @param Position $start
	 * @param Position $end
	 */
	function __construct($start, $end) {
		$this->start = $start;
		$this->end = $end;
	}

	/**
	 * @param EsprimaPHP $parser
	 *
	 * @return SourceLocation
	 */
	public static function createFromParser($parser, $startToken = null) {
		if($startToken) {
			return self::wrappingSourceLocation($startToken);
		} else {
			return self::sourceLocation($parser);
		}
	}

	/**
	 * @param $parser
	 * @return SourceLocation
	 */
	protected static function sourceLocation($parser)
	{
		return new self(
			Position::createFromParser($parser),
			null
		);
	}

	/**
	 * @param $startToken
	 * @return SourceLocation
	 */
	protected static function wrappingSourceLocation($startToken)
	{
		if (property_exists($startToken, 'type') && $startToken->type === Token::STRING_LITERAL) {
			return new self(
				new Position(
					$startToken->startLineNumber,
					$startToken->start - $startToken->startLineStart
				),
				null
			);
		} else {
			return new self(
				new Position(
					property_exists($startToken, 'lineNumber') ? $startToken->lineNumber : 0,
					property_exists($startToken, 'start') ? ($startToken->start - $startToken->lineStart) : 0
				),
				null
			);

		}
	}
}