<?php 

 namespace test;
 class WhitespaceTest extends BaseTestCase 
 {
protected function getFixtures()
{
	return json_decode('
{"new 	\u000b  ᠎             　﻿a":{"type":"ExpressionStatement","expression":{"type":"NewExpression","callee":{"type":"Identifier","name":"a","range":[25,26],"loc":{"start":{"line":1,"column":25},"end":{"line":1,"column":26}}},"arguments":[],"range":[0,26],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":26}}},"range":[0,26],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":26}}},"{0
1
}
}