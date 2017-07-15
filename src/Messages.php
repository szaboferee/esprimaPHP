<?php

namespace EsprimaPhp;

class Messages
{
    const UNEXPECTED_TOKEN_S = 'Unexpected token %s';
    const UNEXPECTED_NUMBER = 'Unexpected number';
    const UNEXPECTED_STRING = 'Unexpected string';
    const UNEXPECTED_IDENTIFIER = 'Unexpected identifier';
    const UNEXPECTED_RESERVED_WORD = 'Unexpected reserved word';
    const UNEXPECTED_END_OF_INPUT = 'Unexpected end of input';
    const ILLEGAL_NEWLINE_AFTER_THROW = 'Illegal newline after throw';
    const INVALID_REGULAR_EXPRESSION = 'Invalid regular expression';
    const INVALID_REGULAR_EXPRESSION_MISSING = 'Invalid regular expression: missing /';
    const INVALID_LEFT_HAND_SIDE_IN_ASSIGNMENT = 'Invalid left-hand side in assignment';
    const INVALID_LEFT_HAND_SIDE_IN_FOR_IN = 'Invalid left-hand side in for-in';
    const MORE_THAN_ONE_DEFAULT_CLAUSE_IN_SWITCH_STATEMENT = 'More than one default clause in switch statement';
    const MISSING_CATCH_OR_FINALLY_AFTER_TRY = 'Missing catch or finally after try';
    const UNDEFINED_LABEL_S = 'Undefined label \'%s\'';
    const S_S_HAS_ALREADY_BEEN_DECLARED = '%s \'%s\' has already been declared';
    const ILLEGAL_CONTINUE_STATEMENT = 'Illegal continue statement';
    const ILLEGAL_BREAK_STATEMENT = 'Illegal break statement';
    const ILLEGAL_RETURN_STATEMENT = 'Illegal return statement';
    const STRICT_MODE_CODE_MAY_NOT_INCLUDE_A_WITH_STATEMENT = 'Strict mode code may not include a with statement';
    const CATCH_VARIABLE_MAY_NOT_BE_EVAL_OR_ARGUMENTS_IN_STRICT_MODE = 'Catch variable may not be eval or arguments in strict mode';
    const VARIABLE_NAME_MAY_NOT_BE_EVAL_OR_ARGUMENTS_IN_STRICT_MODE = 'Variable name may not be eval or arguments in strict mode';
    const PARAMETER_NAME_EVAL_OR_ARGUMENTS_IS_NOT_ALLOWED_IN_STRICT_MODE = 'Parameter name eval or arguments is not allowed in strict mode';
    const STRICT_MODE_FUNCTION_MAY_NOT_HAVE_DUPLICATE_PARAMETER_NAMES = 'Strict mode function may not have duplicate parameter names';
    const FUNCTION_NAME_MAY_NOT_BE_EVAL_OR_ARGUMENTS_IN_STRICT_MODE = 'Function name may not be eval or arguments in strict mode';
    const OCTAL_LITERALS_ARE_NOT_ALLOWED_IN_STRICT_MODE = 'Octal literals are not allowed in strict mode.';
    const DELETE_OF_AN_UNQUALIFIED_IDENTIFIER_IN_STRICT_MODE = 'Delete of an unqualified identifier in strict mode.';
    const DUPLICATE_DATA_PROPERTY_IN_OBJECT_LITERAL_NOT_ALLOWED_IN_STRICT_MODE = 'Duplicate data property in object literal not allowed in strict mode';
    const OBJECT_LITERAL_MAY_NOT_HAVE_DATA_AND_ACCESSOR_PROPERTY_WITH_THE_SAME_NAME = 'Object literal may not have data and accessor property with the same name';
    const OBJECT_LITERAL_MAY_NOT_HAVE_MULTIPLE_GET_SET_ACCESSORS_WITH_THE_SAME_NAME = 'Object literal may not have multiple get/set accessors with the same name';
    const ASSIGNMENT_TO_EVAL_OR_ARGUMENTS_IS_NOT_ALLOWED_IN_STRICT_MODE = 'Assignment to eval or arguments is not allowed in strict mode';
    const POSTFIX_INCREMENT_DECREMENT_MAY_NOT_HAVE_EVAL_OR_ARGUMENTS_OPERAND_IN_STRICT_MODE = 'Postfix increment/decrement may not have eval or arguments operand in strict mode';
    const PREFIX_INCREMENT_DECREMENT_MAY_NOT_HAVE_EVAL_OR_ARGUMENTS_OPERAND_IN_STRICT_MODE = 'Prefix increment/decrement may not have eval or arguments operand in strict mode';
    const USE_OF_FUTURE_RESERVED_WORD_IN_STRICT_MODE = 'Use of future reserved word in strict mode';
} 