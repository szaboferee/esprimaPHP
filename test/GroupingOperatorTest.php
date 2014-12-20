<?php
/**
 * Created by PhpStorm.
 * User: szaboferee
 * Date: 12/19/14
 * Time: 7:51 PM
 */
namespace test;

class GroupingOperatorTest extends BaseTestCase
{

	protected function getFixtures()
	{
		return json_decode('{"(1) + (2  ) + 3": {"type": "ExpressionStatement","expression": {"type": "BinaryExpression","operator": "+","left": {"type": "BinaryExpression","operator": "+","left": {"type": "Literal","value": 1,"raw": "1","range": [1,2],"loc": {"start": {"line": 1,"column": 1},"end": {"line": 1,"column": 2}}},"right": {"type": "Literal","value": 2,"raw": "2","range": [7,8],"loc": {"start": {"line": 1,"column": 7},"end": {"line": 1,"column": 8}}},"range": [0,11],"loc": {"start": {"line": 1,"column": 0},"end": {"line": 1,"column": 11}}},"right": {"type": "Literal","value": 3,"raw": "3","range": [14,15],"loc": {"start": {"line": 1,"column": 14},"end": {"line": 1,"column": 15}}},"range": [0,15],"loc": {"start": {"line": 1,"column": 0},"end": {"line": 1,"column": 15}}},"range": [0,15],"loc": {"start": {"line": 1,"column": 0},"end": {"line": 1,"column": 15}}},"4 + 5 << (6)": {"type": "ExpressionStatement","expression": {"type": "BinaryExpression","operator": "<<","left": {"type": "BinaryExpression","operator": "+","left": {"type": "Literal","value": 4,"raw": "4","range": [0,1],"loc": {"start": {"line": 1,"column": 0},"end": {"line": 1,"column": 1}}},"right": {"type": "Literal","value": 5,"raw": "5","range": [4,5],"loc": {"start": {"line": 1,"column": 4},"end": {"line": 1,"column": 5}}},"range": [0,5],"loc": {"start": {"line": 1,"column": 0},"end": {"line": 1,"column": 5}}},"right": {"type": "Literal","value": 6,"raw": "6","range": [10,11],"loc": {"start": {"line": 1,"column": 10},"end": {"line": 1,"column": 11}}},"range": [0,12],"loc": {"start": {"line": 1,"column": 0},"end": {"line": 1,"column": 12}}},"range": [0,12],"loc": {"start": {"line": 1,"column": 0},"end": {"line": 1,"column": 12}}}}');
	}
}