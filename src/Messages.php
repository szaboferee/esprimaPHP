<?php

namespace EsprimaPhp;

class Messages
{
    const UnexpectedToken = 'Unexpected token %s';
    const UnexpectedNumber = 'Unexpected number';
    const UnexpectedString = 'Unexpected string';
    const UnexpectedIdentifier = 'Unexpected identifier';
    const UnexpectedReserved = 'Unexpected reserved word';
    const UnexpectedEOS = 'Unexpected end of input';
    const NewlineAfterThrow = 'Illegal newline after throw';
    const InvalidRegExp = 'Invalid regular expression';
    const UnterminatedRegExp = 'Invalid regular expression: missing /';
    const InvalidLHSInAssignment = 'Invalid left-hand side in assignment';
    const InvalidLHSInForIn = 'Invalid left-hand side in for-in';
    const MultipleDefaultsInSwitch = 'More than one default clause in switch statement';
    const NoCatchOrFinally = 'Missing catch or finally after try';
    const UnknownLabel = 'Undefined label \'%s\'';
    const Redeclaration = '%s \'%s\' has already been declared';
    const IllegalContinue = 'Illegal continue statement';
    const IllegalBreak = 'Illegal break statement';
    const IllegalReturn = 'Illegal return statement';
    const StrictModeWith = 'Strict mode code may not include a with statement';
    const StrictCatchVariable = 'Catch variable may not be eval or arguments in strict mode';
    const StrictVarName = 'Variable name may not be eval or arguments in strict mode';
    const StrictParamName = 'Parameter name eval or arguments is not allowed in strict mode';
    const StrictParamDupe = 'Strict mode function may not have duplicate parameter names';
    const StrictFunctionName = 'Function name may not be eval or arguments in strict mode';
    const StrictOctalLiteral = 'Octal literals are not allowed in strict mode.';
    const StrictDelete = 'Delete of an unqualified identifier in strict mode.';
    const StrictDuplicateProperty = 'Duplicate data property in object literal not allowed in strict mode';
    const AccessorDataProperty = 'Object literal may not have data and accessor property with the same name';
    const AccessorGetSet = 'Object literal may not have multiple get/set accessors with the same name';
    const StrictLHSAssignment = 'Assignment to eval or arguments is not allowed in strict mode';
    const StrictLHSPostfix = 'Postfix increment/decrement may not have eval or arguments operand in strict mode';
    const StrictLHSPrefix = 'Prefix increment/decrement may not have eval or arguments operand in strict mode';
    const StrictReservedWord = 'Use of future reserved word in strict mode';
} 