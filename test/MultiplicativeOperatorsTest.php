<?php
namespace test;
class MultiplicativeOperatorsTest extends BaseTestCase
{
	protected function getFixtures()
	{
		return json_decode('
{"x * y":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"*","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},"x / y":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"/","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},"x % y":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"%","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}}}');
	}
}