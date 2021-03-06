<?php

namespace test;
class ThrowStatementTest extends BaseTestCase
{
    protected function getFixtures()
    {
        return json_decode('
{"throw x;":{"type":"ThrowStatement","argument":{"type":"Identifier","name":"x","range":[6,7],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":7}}},"range":[0,8],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":8}}},"throw x * y":{"type":"ThrowStatement","argument":{"type":"BinaryExpression","operator":"*","left":{"type":"Identifier","name":"x","range":[6,7],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":7}}},"right":{"type":"Identifier","name":"y","range":[10,11],"loc":{"start":{"line":1,"column":10},"end":{"line":1,"column":11}}},"range":[6,11],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":11}}},"range":[0,11],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":11}}},"throw { message: \"Error\" }":{"type":"ThrowStatement","argument":{"type":"ObjectExpression","properties":[{"type":"Property","key":{"type":"Identifier","name":"message","range":[8,15],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":15}}},"value":{"type":"Literal","value":"Error","raw":"\"Error\"","range":[17,24],"loc":{"start":{"line":1,"column":17},"end":{"line":1,"column":24}}},"kind":"init","range":[8,24],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":24}}}],"range":[6,26],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":26}}},"range":[0,26],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":26}}}}');
    }
}
