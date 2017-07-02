<?php

namespace test;
class BlockTest extends BaseTestCase
{
    protected function getFixtures()
    {
        return json_decode('
{"{ foo }":{"type":"BlockStatement","body":[{"type":"ExpressionStatement","expression":{"type":"Identifier","name":"foo","range":[2,5],"loc":{"start":{"line":1,"column":2},"end":{"line":1,"column":5}}},"range":[2,6],"loc":{"start":{"line":1,"column":2},"end":{"line":1,"column":6}}}],"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"{ doThis(); doThat(); }":{"type":"BlockStatement","body":[{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"doThis","range":[2,8],"loc":{"start":{"line":1,"column":2},"end":{"line":1,"column":8}}},"arguments":[],"range":[2,10],"loc":{"start":{"line":1,"column":2},"end":{"line":1,"column":10}}},"range":[2,11],"loc":{"start":{"line":1,"column":2},"end":{"line":1,"column":11}}},{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"doThat","range":[12,18],"loc":{"start":{"line":1,"column":12},"end":{"line":1,"column":18}}},"arguments":[],"range":[12,20],"loc":{"start":{"line":1,"column":12},"end":{"line":1,"column":20}}},"range":[12,21],"loc":{"start":{"line":1,"column":12},"end":{"line":1,"column":21}}}],"range":[0,23],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":23}}},"{}":{"type":"BlockStatement","body":[],"range":[0,2],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":2}}}}');
    }
}
