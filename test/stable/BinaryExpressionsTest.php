<?php

namespace test;
class BinaryExpressionsTest extends BaseTestCase
{
    protected function getFixtures()
    {
        return json_decode('
{"x + y + z":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"+","left":{"type":"BinaryExpression","operator":"+","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},"right":{"type":"Identifier","name":"z","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"x - y + z":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"+","left":{"type":"BinaryExpression","operator":"-","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},"right":{"type":"Identifier","name":"z","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"x + y - z":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"-","left":{"type":"BinaryExpression","operator":"+","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},"right":{"type":"Identifier","name":"z","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"x - y - z":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"-","left":{"type":"BinaryExpression","operator":"-","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},"right":{"type":"Identifier","name":"z","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"x + y * z":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"+","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"BinaryExpression","operator":"*","left":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"right":{"type":"Identifier","name":"z","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[4,9],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"x + y / z":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"+","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"BinaryExpression","operator":"/","left":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"right":{"type":"Identifier","name":"z","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[4,9],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"x - y % z":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"-","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"BinaryExpression","operator":"%","left":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"right":{"type":"Identifier","name":"z","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[4,9],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"x * y * z":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"*","left":{"type":"BinaryExpression","operator":"*","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},"right":{"type":"Identifier","name":"z","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"x * y / z":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"/","left":{"type":"BinaryExpression","operator":"*","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},"right":{"type":"Identifier","name":"z","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"x * y % z":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"%","left":{"type":"BinaryExpression","operator":"*","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},"right":{"type":"Identifier","name":"z","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"x % y * z":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"*","left":{"type":"BinaryExpression","operator":"%","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},"right":{"type":"Identifier","name":"z","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"x << y << z":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"<<","left":{"type":"BinaryExpression","operator":"<<","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[5,6],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":6}}},"range":[0,6],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":6}}},"right":{"type":"Identifier","name":"z","range":[10,11],"loc":{"start":{"line":1,"column":10},"end":{"line":1,"column":11}}},"range":[0,11],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":11}}},"range":[0,11],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":11}}},"x | y | z":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"|","left":{"type":"BinaryExpression","operator":"|","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},"right":{"type":"Identifier","name":"z","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"x & y & z":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"&","left":{"type":"BinaryExpression","operator":"&","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},"right":{"type":"Identifier","name":"z","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"x ^ y ^ z":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"^","left":{"type":"BinaryExpression","operator":"^","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},"right":{"type":"Identifier","name":"z","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"x & y | z":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"|","left":{"type":"BinaryExpression","operator":"&","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},"right":{"type":"Identifier","name":"z","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"x | y ^ z":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"|","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"BinaryExpression","operator":"^","left":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"right":{"type":"Identifier","name":"z","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[4,9],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"x | y & z":{"type":"ExpressionStatement","expression":{"type":"BinaryExpression","operator":"|","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"BinaryExpression","operator":"&","left":{"type":"Identifier","name":"y","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"right":{"type":"Identifier","name":"z","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[4,9],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}}}');
    }
}
