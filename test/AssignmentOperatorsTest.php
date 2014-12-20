<?php 

 namespace test;
 class AssignmentOperatorsTest extends BaseTestCase 
 {
protected function getFixtures()
{
	return json_decode('
{"x = 42":{"type":"ExpressionStatement","expression":{"type":"AssignmentExpression","operator":"=","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Literal","value":42,"raw":"42","range":[4,6],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":6}}},"range":[0,6],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":6}}},"range":[0,6],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":6}}},"eval = 42":{"type":"ExpressionStatement","expression":{"type":"AssignmentExpression","operator":"=","left":{"type":"Identifier","name":"eval","range":[0,4],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":4}}},"right":{"type":"Literal","value":42,"raw":"42","range":[7,9],"loc":{"start":{"line":1,"column":7},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"arguments = 42":{"type":"ExpressionStatement","expression":{"type":"AssignmentExpression","operator":"=","left":{"type":"Identifier","name":"arguments","range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"right":{"type":"Literal","value":42,"raw":"42","range":[12,14],"loc":{"start":{"line":1,"column":12},"end":{"line":1,"column":14}}},"range":[0,14],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":14}}},"range":[0,14],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":14}}},"x *= 42":{"type":"ExpressionStatement","expression":{"type":"AssignmentExpression","operator":"*=","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Literal","value":42,"raw":"42","range":[5,7],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"x /= 42":{"type":"ExpressionStatement","expression":{"type":"AssignmentExpression","operator":"/=","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Literal","value":42,"raw":"42","range":[5,7],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"x %= 42":{"type":"ExpressionStatement","expression":{"type":"AssignmentExpression","operator":"%=","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Literal","value":42,"raw":"42","range":[5,7],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"x += 42":{"type":"ExpressionStatement","expression":{"type":"AssignmentExpression","operator":"+=","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Literal","value":42,"raw":"42","range":[5,7],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"x -= 42":{"type":"ExpressionStatement","expression":{"type":"AssignmentExpression","operator":"-=","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Literal","value":42,"raw":"42","range":[5,7],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"x <<= 42":{"type":"ExpressionStatement","expression":{"type":"AssignmentExpression","operator":"<<=","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Literal","value":42,"raw":"42","range":[6,8],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":8}}},"range":[0,8],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":8}}},"range":[0,8],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":8}}},"x >>= 42":{"type":"ExpressionStatement","expression":{"type":"AssignmentExpression","operator":">>=","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Literal","value":42,"raw":"42","range":[6,8],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":8}}},"range":[0,8],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":8}}},"range":[0,8],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":8}}},"x >>>= 42":{"type":"ExpressionStatement","expression":{"type":"AssignmentExpression","operator":">>>=","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Literal","value":42,"raw":"42","range":[7,9],"loc":{"start":{"line":1,"column":7},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"x &= 42":{"type":"ExpressionStatement","expression":{"type":"AssignmentExpression","operator":"&=","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Literal","value":42,"raw":"42","range":[5,7],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"x ^= 42":{"type":"ExpressionStatement","expression":{"type":"AssignmentExpression","operator":"^=","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Literal","value":42,"raw":"42","range":[5,7],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"x |= 42":{"type":"ExpressionStatement","expression":{"type":"AssignmentExpression","operator":"|=","left":{"type":"Identifier","name":"x","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}},"right":{"type":"Literal","value":42,"raw":"42","range":[5,7],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}}}');
}
}
