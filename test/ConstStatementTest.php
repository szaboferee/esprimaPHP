<?php 

 namespace test;
 class ConstStatementTest extends BaseTestCase 
 {
protected function getFixtures()
{
	return json_decode('
{"const x = 42":{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[6,7],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":7}}},"init":{"type":"Literal","value":42,"raw":"42","range":[10,12],"loc":{"start":{"line":1,"column":10},"end":{"line":1,"column":12}}},"range":[6,12],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":12}}}],"kind":"const","range":[0,12],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":12}}},"{ const x = 42 }":{"type":"BlockStatement","body":[{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"init":{"type":"Literal","value":42,"raw":"42","range":[12,14],"loc":{"start":{"line":1,"column":12},"end":{"line":1,"column":14}}},"range":[8,14],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":14}}}],"kind":"const","range":[2,15],"loc":{"start":{"line":1,"column":2},"end":{"line":1,"column":15}}}],"range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}}},"{ const x = 14, y = 3, z = 1977 }":{"type":"BlockStatement","body":[{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"init":{"type":"Literal","value":14,"raw":"14","range":[12,14],"loc":{"start":{"line":1,"column":12},"end":{"line":1,"column":14}}},"range":[8,14],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":14}}},{"type":"VariableDeclarator","id":{"type":"Identifier","name":"y","range":[16,17],"loc":{"start":{"line":1,"column":16},"end":{"line":1,"column":17}}},"init":{"type":"Literal","value":3,"raw":"3","range":[20,21],"loc":{"start":{"line":1,"column":20},"end":{"line":1,"column":21}}},"range":[16,21],"loc":{"start":{"line":1,"column":16},"end":{"line":1,"column":21}}},{"type":"VariableDeclarator","id":{"type":"Identifier","name":"z","range":[23,24],"loc":{"start":{"line":1,"column":23},"end":{"line":1,"column":24}}},"init":{"type":"Literal","value":1977,"raw":"1977","range":[27,31],"loc":{"start":{"line":1,"column":27},"end":{"line":1,"column":31}}},"range":[23,31],"loc":{"start":{"line":1,"column":23},"end":{"line":1,"column":31}}}],"kind":"const","range":[2,32],"loc":{"start":{"line":1,"column":2},"end":{"line":1,"column":32}}}],"range":[0,33],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":33}}}}');
}
}
