<?php
namespace test;

class ES6UnicodeTest extends BaseTestCase
{
	protected function getFixtures()
{
	return json_decode('
{"\"\\u{714E}\\u{8336}\"":{"type":"ExpressionStatement","expression":{"type":"Literal","value":"煎茶","raw":"\"\\u{714E}\\u{8336}\"","range":[0,18],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":18}}},"range":[0,18],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":18}}},"\"\\u{20BB7}\\u{91CE}\\u{5BB6}\"":{"type":"ExpressionStatement","expression":{"type":"Literal","value":"𠮷野家","raw":"\"\\u{20BB7}\\u{91CE}\\u{5BB6}\"","range":[0,27],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":27}}},"range":[0,27],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":27}}},"\"\\u{00000000034}\"":{"type":"ExpressionStatement","expression":{"range":[0,17],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":17}},"type":"Literal","value":"4","raw":"\"\\u{00000000034}\""},"range":[0,17],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":17}}}}');
}
}
