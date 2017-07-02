<?php

namespace test;
class TryStatementTest extends BaseTestCase
{
    protected function getFixtures()
    {
        return json_decode('
{"try { } catch (e) { }":{"type":"TryStatement","block":{"type":"BlockStatement","body":[],"range":[4,7],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":7}}},"guardedHandlers":[],"handlers":[{"type":"CatchClause","param":{"type":"Identifier","name":"e","range":[15,16],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":16}}},"body":{"type":"BlockStatement","body":[],"range":[18,21],"loc":{"start":{"line":1,"column":18},"end":{"line":1,"column":21}}},"range":[8,21],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":21}}}],"finalizer":null,"range":[0,21],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":21}}},"try { } catch (eval) { }":{"type":"TryStatement","block":{"type":"BlockStatement","body":[],"range":[4,7],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":7}}},"guardedHandlers":[],"handlers":[{"type":"CatchClause","param":{"type":"Identifier","name":"eval","range":[15,19],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":19}}},"body":{"type":"BlockStatement","body":[],"range":[21,24],"loc":{"start":{"line":1,"column":21},"end":{"line":1,"column":24}}},"range":[8,24],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":24}}}],"finalizer":null,"range":[0,24],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":24}}},"try { } catch (arguments) { }":{"type":"TryStatement","block":{"type":"BlockStatement","body":[],"range":[4,7],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":7}}},"guardedHandlers":[],"handlers":[{"type":"CatchClause","param":{"type":"Identifier","name":"arguments","range":[15,24],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":24}}},"body":{"type":"BlockStatement","body":[],"range":[26,29],"loc":{"start":{"line":1,"column":26},"end":{"line":1,"column":29}}},"range":[8,29],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":29}}}],"finalizer":null,"range":[0,29],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":29}}},"try { } catch (e) { say(e) }":{"type":"TryStatement","block":{"type":"BlockStatement","body":[],"range":[4,7],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":7}}},"guardedHandlers":[],"handlers":[{"type":"CatchClause","param":{"type":"Identifier","name":"e","range":[15,16],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":16}}},"body":{"type":"BlockStatement","body":[{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"say","range":[20,23],"loc":{"start":{"line":1,"column":20},"end":{"line":1,"column":23}}},"arguments":[{"type":"Identifier","name":"e","range":[24,25],"loc":{"start":{"line":1,"column":24},"end":{"line":1,"column":25}}}],"range":[20,26],"loc":{"start":{"line":1,"column":20},"end":{"line":1,"column":26}}},"range":[20,27],"loc":{"start":{"line":1,"column":20},"end":{"line":1,"column":27}}}],"range":[18,28],"loc":{"start":{"line":1,"column":18},"end":{"line":1,"column":28}}},"range":[8,28],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":28}}}],"finalizer":null,"range":[0,28],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":28}}},"try { } finally { cleanup(stuff) }":{"type":"TryStatement","block":{"type":"BlockStatement","body":[],"range":[4,7],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":7}}},"guardedHandlers":[],"handlers":[],"finalizer":{"type":"BlockStatement","body":[{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"cleanup","range":[18,25],"loc":{"start":{"line":1,"column":18},"end":{"line":1,"column":25}}},"arguments":[{"type":"Identifier","name":"stuff","range":[26,31],"loc":{"start":{"line":1,"column":26},"end":{"line":1,"column":31}}}],"range":[18,32],"loc":{"start":{"line":1,"column":18},"end":{"line":1,"column":32}}},"range":[18,33],"loc":{"start":{"line":1,"column":18},"end":{"line":1,"column":33}}}],"range":[16,34],"loc":{"start":{"line":1,"column":16},"end":{"line":1,"column":34}}},"range":[0,34],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":34}}},"try { doThat(); } catch (e) { say(e) }":{"type":"TryStatement","block":{"type":"BlockStatement","body":[{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"doThat","range":[6,12],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":12}}},"arguments":[],"range":[6,14],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":14}}},"range":[6,15],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":15}}}],"range":[4,17],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":17}}},"guardedHandlers":[],"handlers":[{"type":"CatchClause","param":{"type":"Identifier","name":"e","range":[25,26],"loc":{"start":{"line":1,"column":25},"end":{"line":1,"column":26}}},"body":{"type":"BlockStatement","body":[{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"say","range":[30,33],"loc":{"start":{"line":1,"column":30},"end":{"line":1,"column":33}}},"arguments":[{"type":"Identifier","name":"e","range":[34,35],"loc":{"start":{"line":1,"column":34},"end":{"line":1,"column":35}}}],"range":[30,36],"loc":{"start":{"line":1,"column":30},"end":{"line":1,"column":36}}},"range":[30,37],"loc":{"start":{"line":1,"column":30},"end":{"line":1,"column":37}}}],"range":[28,38],"loc":{"start":{"line":1,"column":28},"end":{"line":1,"column":38}}},"range":[18,38],"loc":{"start":{"line":1,"column":18},"end":{"line":1,"column":38}}}],"finalizer":null,"range":[0,38],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":38}}},"try { doThat(); } catch (e) { say(e) } finally { cleanup(stuff) }":{"type":"TryStatement","block":{"type":"BlockStatement","body":[{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"doThat","range":[6,12],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":12}}},"arguments":[],"range":[6,14],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":14}}},"range":[6,15],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":15}}}],"range":[4,17],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":17}}},"guardedHandlers":[],"handlers":[{"type":"CatchClause","param":{"type":"Identifier","name":"e","range":[25,26],"loc":{"start":{"line":1,"column":25},"end":{"line":1,"column":26}}},"body":{"type":"BlockStatement","body":[{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"say","range":[30,33],"loc":{"start":{"line":1,"column":30},"end":{"line":1,"column":33}}},"arguments":[{"type":"Identifier","name":"e","range":[34,35],"loc":{"start":{"line":1,"column":34},"end":{"line":1,"column":35}}}],"range":[30,36],"loc":{"start":{"line":1,"column":30},"end":{"line":1,"column":36}}},"range":[30,37],"loc":{"start":{"line":1,"column":30},"end":{"line":1,"column":37}}}],"range":[28,38],"loc":{"start":{"line":1,"column":28},"end":{"line":1,"column":38}}},"range":[18,38],"loc":{"start":{"line":1,"column":18},"end":{"line":1,"column":38}}}],"finalizer":{"type":"BlockStatement","body":[{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"cleanup","range":[49,56],"loc":{"start":{"line":1,"column":49},"end":{"line":1,"column":56}}},"arguments":[{"type":"Identifier","name":"stuff","range":[57,62],"loc":{"start":{"line":1,"column":57},"end":{"line":1,"column":62}}}],"range":[49,63],"loc":{"start":{"line":1,"column":49},"end":{"line":1,"column":63}}},"range":[49,64],"loc":{"start":{"line":1,"column":49},"end":{"line":1,"column":64}}}],"range":[47,65],"loc":{"start":{"line":1,"column":47},"end":{"line":1,"column":65}}},"range":[0,65],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":65}}}}');
    }
}
