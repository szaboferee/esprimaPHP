<?php 

 namespace test;
 class WhitespaceTest extends BaseTestCase 
 {
protected function getFixtures()
{
	return array();
	return json_decode($this->fixBadUnicodeForJson('{
		"new\x20\x09\x0B\x0C\xA0\u1680\u180E\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200A\u202F\u205F\u3000\uFEFFa":{"type":"ExpressionStatement","expression":{"type":"NewExpression","callee":{"type":"Identifier","name":"a","range":[25,26],"loc":{"start":{"line":1,"column":25},"end":{"line":1,"column":26}}},"arguments":[],"range":[0,26],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":26}}},"range":[0,26],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":26}}},
		"{0\x0A1\x0D2\u20283\u20294}":{"type":"BlockStatement","body":[{"type":"ExpressionStatement","expression":{"type":"Literal","value":0,"raw":"0","range":[1,2],"loc":{"start":{"line":1,"column":1},"end":{"line":1,"column":2}}},"range":[1,3],"loc":{"start":{"line":1,"column":1},"end":{"line":2,"column":0}}},{"type":"ExpressionStatement","expression":{"type":"Literal","value":1,"raw":"1","range":[3,4],"loc":{"start":{"line":2,"column":0},"end":{"line":2,"column":1}}},"range":[3,5],"loc":{"start":{"line":2,"column":0},"end":{"line":3,"column":0}}},{"type":"ExpressionStatement","expression":{"type":"Literal","value":2,"raw":"2","range":[5,6],"loc":{"start":{"line":3,"column":0},"end":{"line":3,"column":1}}},"range":[5,7],"loc":{"start":{"line":3,"column":0},"end":{"line":4,"column":0}}},{"type":"ExpressionStatement","expression":{"type":"Literal","value":3,"raw":"3","range":[7,8],"loc":{"start":{"line":4,"column":0},"end":{"line":4,"column":1}}},"range":[7,9],"loc":{"start":{"line":4,"column":0},"end":{"line":5,"column":0}}},{"type":"ExpressionStatement","expression":{"type":"Literal","value":4,"raw":"4","range":[9,10],"loc":{"start":{"line":5,"column":0},"end":{"line":5,"column":1}}},"range":[9,10],"loc":{"start":{"line":5,"column":0},"end":{"line":5,"column":1}}}],"range":[0,11],"loc":{"start":{"line":1,"column":0},"end":{"line":5,"column":2}}}
	}'));
}
}
