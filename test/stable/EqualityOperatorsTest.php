<?php

namespace test;
class EqualityOperatorsTest extends BaseTestCase
{
    protected function getFixtures()
    {
        return json_decode('
{"x == y":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"==","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[5,6],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":6}}},"range":[0,6],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":6}}},"range":[0,6],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":6}}},"x != y":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"!=","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[5,6],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":6}}},"range":[0,6],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":6}}},"range":[0,6],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":6}}},"x === y":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"===","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[6,7],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"x !== y":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"!==","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[6,7],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}}}');
    }
}
