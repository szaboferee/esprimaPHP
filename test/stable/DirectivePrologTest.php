<?php

namespace test;
class DirectivePrologTest extends BaseTestCase
{
    protected function getFixtures()
    {
        return array(
            '(function () { \'use\\x20strict\'; with (i); }())' =>
                json_decode('{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"FunctionExpression","id":null,"params":[],"defaults":[],"body":{"type":"BlockStatement","body":[{"type":"ExpressionStatement","expression":{"type":"Literal","value":"use strict","raw":"\'use\\\\x20strict\'","range":[15,30],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":30}}},"range":[15,31],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":31}}},{"type":"WithStatement","object":{"type":"Identifier","name":"i","range":[38,39],"loc":{"start":{"line":1,"column":38},"end":{"line":1,"column":39}}},"body":{"type":"EmptyStatement","range":[40,41],"loc":{"start":{"line":1,"column":40},"end":{"line":1,"column":41}}},"range":[32,41],"loc":{"start":{"line":1,"column":32},"end":{"line":1,"column":41}}}],"range":[13,43],"loc":{"start":{"line":1,"column":13},"end":{"line":1,"column":43}}},"rest":null,"generator":false,"expression":false,"range":[1,43],"loc":{"start":{"line":1,"column":1},"end":{"line":1,"column":43}}},"arguments":[],"range":[1,45],"loc":{"start":{"line":1,"column":1},"end":{"line":1,"column":45}}},"range":[0,46],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":46}}}'),
            '(function () { \'use\nstrict\'; with (i); }())' =>
                json_decode('{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"FunctionExpression","id":null,"params":[],"defaults":[],"body":{"type":"BlockStatement","body":[{"type":"ExpressionStatement","expression":{"type":"Literal","value":"use' . "\n" . 'strict","raw":"\'use\\\\nstrict\'","range":[15,28],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":28}}},"range":[15,29],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":29}}},{"type":"WithStatement","object":{"type":"Identifier","name":"i","range":[36,37],"loc":{"start":{"line":1,"column":36},"end":{"line":1,"column":37}}},"body":{"type":"EmptyStatement","range":[38,39],"loc":{"start":{"line":1,"column":38},"end":{"line":1,"column":39}}},"range":[30,39],"loc":{"start":{"line":1,"column":30},"end":{"line":1,"column":39}}}],"range":[13,41],"loc":{"start":{"line":1,"column":13},"end":{"line":1,"column":41}}},"rest":null,"generator":false,"expression":false,"range":[1,41],"loc":{"start":{"line":1,"column":1},"end":{"line":1,"column":41}}},"arguments":[],"range":[1,43],"loc":{"start":{"line":1,"column":1},"end":{"line":1,"column":43}}},"range":[0,44],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":44}}}')
        );
    }
}
