<?php

namespace test;
class APITest extends BaseTestCase
{
    protected function getFixtures()
    {
        return json_decode('{
    "parse(null)":{"call":"parse","args":[null],"result":{"type":"Program","body":[{"type":"ExpressionStatement","expression":{"type":"Literal","value":null,"raw":"null"}}]}},
    "parse(42)":{"call":"parse","args":[42],"result":{"type":"Program","body":[{"type":"ExpressionStatement","expression":{"type":"Literal","value":42,"raw":"42"}}]}},
    "parse(true)":{"call":"parse","args":[true],"result":{"type":"Program","body":[{"type":"ExpressionStatement","expression":{"type":"Literal","value":true,"raw":"true"}}]}},
    "parse(new String(\"test\"))":{"call":"parse","args":["test"],"result":{"type":"Program","body":[{"type":"ExpressionStatement","expression":{"type":"Identifier","name":"test"}}]}},
    "parse(new SplInt(42))":{"call":"parse","args":[42],"result":{"type":"Program","body":[{"type":"ExpressionStatement","expression":{"type":"Literal","value":42,"raw":"42"}}]}},
    "parse(new SplBool(true))":{"call":"parse","args":[true],"result":{"type":"Program","body":[{"type":"ExpressionStatement","expression":{"type":"Literal","value":true,"raw":"true"}}]}},
    "tokenize(null)":{"call":"tokenize","args":[null],"result":[{"type":"Null","value":"null"}]},
    "tokenize(42)":{"call":"tokenize","args":[42],"result":[{"type":"Numeric","value":"42"}]},
    "tokenize(true)":{"call":"tokenize","args":[true],"result":[{"type":"Boolean","value":"true"}]},
    "tokenize(new String(\"test\"))":{"call":"tokenize","args":["test"],"result":[{"type":"Identifier","value":"test"}]},
    "tokenize(new SplInt(42))":{"call":"tokenize","args":[42],"result":[{"type":"Numeric","value":"42"}]},
    "tokenize(new SplBool(true))":{"call":"tokenize","args":[true],"result":[{"type":"Boolean","value":"true"}]}
    }');
    }
}
