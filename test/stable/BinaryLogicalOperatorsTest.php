<?php

namespace test;
class BinaryLogicalOperatorsTest extends BaseTestCase
{
    protected function getFixtures()
    {
        return json_decode('
{"x || y":{"type":"ExpressionStatement","expression":{"type":"LogicalExpression","operator":"||","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[5,6],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":6}}},"range":[0,6],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":6}}},"range":[0,6],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":6}}},"x && y":{"type":"ExpressionStatement","expression":{"type":"LogicalExpression","operator":"&&","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[5,6],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":6}}},"range":[0,6],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":6}}},"range":[0,6],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":6}}},"x || y || z":{"type":"ExpressionStatement","expression":{"type":"LogicalExpression","operator":"||","left":{"type":"LogicalExpression","operator":"||","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[5,6],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":6}}},"range":[0,6],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":6}}},"right":{"type":"Identifier","name":"z","range":[10,11],"loc":{"start":{"line":1,"column":10},"end":{"line":1,"column":11}}},"range":[0,11],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":11}}},"range":[0,11],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":11}}},"x && y && z":{"type":"ExpressionStatement","expression":{"type":"LogicalExpression","operator":"&&","left":{"type":"LogicalExpression","operator":"&&","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[5,6],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":6}}},"range":[0,6],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":6}}},"right":{"type":"Identifier","name":"z","range":[10,11],"loc":{"start":{"line":1,"column":10},"end":{"line":1,"column":11}}},"range":[0,11],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":11}}},"range":[0,11],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":11}}},"x || y && z":{"type":"ExpressionStatement","expression":{"type":"LogicalExpression","operator":"||","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"LogicalExpression","operator":"&&","left":{"type":"Identifier","name":"y","range":[5,6],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":6}}},"right":{"type":"Identifier","name":"z","range":[10,11],"loc":{"start":{"line":1,"column":10},"end":{"line":1,"column":11}}},"range":[5,11],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":11}}},"range":[0,11],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":11}}},"range":[0,11],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":11}}},"x || y ^ z":{"type":"ExpressionStatement","expression":{"type":"LogicalExpression","operator":"||","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"BinaryExpression","operator":"^","left":{"type":"Identifier","name":"y","range":[5,6],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":6}}},"right":{"type":"Identifier","name":"z","range":[9,10],"loc":{"start":{"line":1,"column":9},"end":{"line":1,"column":10}}},"range":[5,10],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":10}}},"range":[0,10],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":10}}},"range":[0,10],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":10}}}}');
    }
}
