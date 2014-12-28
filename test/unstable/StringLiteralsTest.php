<?php
/**
 * Created by PhpStorm.
 * User: szaboferee
 * Date: 12/20/14
 * Time: 12:59 AM
 */

namespace test;


class StringLiteralsTest extends BaseTestCase
{
	protected function getFixtures()
	{
		return array(
            "\"Hello\"" => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"Hello","raw":"\"Hello\"","range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}},"range":[0,7],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":7}}}'),
            '\"\\n\\r\\t\\v\\b\\f\\\\\\\'\\\"\\0\"' => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"\n\r\t\u000b\b\f\\\'\"\u0000","raw":"\"\\n\\r\\t\\v\\b\\f\\\\\'\\\"\\0\"","range":[0,22],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":22}}},"range":[0,22],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":22}}}'),
            "\"\\u0061\"" => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"a","raw":"\"\\\u0061\"","range":[0,8],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":8}}},"range":[0,8],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":8}}}'),
            '"\\x61"' => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"a","raw":"\"\\x61\"","range":[0,6],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":6}}},"range":[0,6],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":6}}}'),
            '"\\u00"' => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"u00","raw":"\"\\u00\"","range":[0,6],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":6}}},"range":[0,6],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":6}}}'),
            '"\\xt"' => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"xt","raw":"\"\\xt\"","range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},"range":[0,5],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":5}}},'),
            '"Hello\\nworld"' => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"Hello\nworld","raw":"\"Hello\\\nworld\"","range":[0,14],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":14}}},"range":[0,14],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":14}}}'),
//            '"Hello\\\nworld"' => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"Hello\nworld","raw":"\"Hello\\\\\\\nworld\"","range":[0,14],"loc":{"start":{"line":1,"column":0},"end":{"line":2,"column":6}}},"range":[0,14],"loc":{"start":{"line":1,"column":0},"end":{"line":2,"column":6}}}'),
            '"Hello\\02World"' => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"Hello\u0002World","raw":"\"Hello\\02World\"","range":[0,15],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":15}}},"range":[0,15],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":15}}}'),
            '"Hello\\012World"' => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"Hello\nWorld","raw":"\"Hello\\012World\"","range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}}},"range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}}}'),
            '"Hello\\122World"' => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"HelloRWorld","raw":"\"Hello\\122World\"","range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}}},"range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}}}'),
            '"Hello\\0122World"' => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"Hello\n2World","raw":"\"Hello\\0122World\"","range":[0,17],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":17}}},"range":[0,17],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":17}}}'),
            '"Hello\\312World"' => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"HelloÊWorld","raw":"\"Hello\\312World\"","range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}}},"range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}}}'),
            '"Hello\\412World"' => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"Hello!2World","raw":"\"Hello\\412World\"","range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}}},"range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}}}'),
            '"Hello\\812World"' => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"Hello812World","raw":"\"Hello\\812World\"","range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}}},"range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}}}'),
            '"Hello\\712World"' => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"Hello92World","raw":"\"Hello\\712World\"","range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}}},"range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}}}'),
            "\"Hello\\0World\"" => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"Hello\u0000World","raw":"\"Hello\\0World\"","range":[0,14],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":14}}},"range":[0,14],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":14}}}'),
            //"\"Hello\\\r\nworld\"" => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"Helloworld","raw":"\"Hello\r\nworld\"","range":[0,15],"loc":{"start":{"line":1,"column":0},"end":{"line":2,"column":6}}},"range":[0,15],"loc":{"start":{"line":1,"column":0},"end":{"line":2,"column":6}}}'),
            '"Hello\\1World"' => json_decode('{"type":"ExpressionStatement","expression":{"type":"Literal","value":"Hello\u0001World","raw":"\"Hello\\\1World\"","range":[0,14],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":14}}},"range":[0,14],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":14}}}')
        );
	}
} 