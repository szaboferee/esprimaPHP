<?php
namespace test;
class RegularExpressionLiteralsTest extends BaseTestCase
 {
	 protected function getFixtures()
 {
	 return json_decode('
{"var x = /[a-z]/i":{"type":"Program","body":[{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"init":{"type":"Literal","value":"/[a-z]/i","raw":"/[a-z]/i","regex":{"pattern":"[a-z]","flags":"i"},"range":[8,16],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":16}}},"range":[4,16],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":16}}}],"kind":"var","range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}}}],"range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}},"tokens":[{"type":"Keyword","value":"var","range":[0,3],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":3}}},{"type":"Identifier","value":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},{"type":"Punctuator","value":"=","range":[6,7],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":7}}},{"type":"RegularExpression","value":"/[a-z]/i","regex":{"pattern":"[a-z]","flags":"i"},"range":[8,16],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":16}}}]},"var x = /[a-z]/y":{"type":"Program","body":[{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"init":{"type":"Literal","value":null,"raw":"/[a-z]/y","regex":{"pattern":"[a-z]","flags":"y"},"range":[8,16],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":16}}},"range":[4,16],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":16}}}],"kind":"var","range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}}}],"range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}},"tokens":[{"type":"Keyword","value":"var","range":[0,3],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":3}}},{"type":"Identifier","value":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},{"type":"Punctuator","value":"=","range":[6,7],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":7}}},{"type":"RegularExpression","value":"/[a-z]/y","regex":{"pattern":"[a-z]","flags":"y"},"range":[8,16],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":16}}}]},"var x = /[a-z]/u":{"type":"Program","body":[{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"init":{"type":"Literal","value":null,"raw":"/[a-z]/u","regex":{"pattern":"[a-z]","flags":"u"},"range":[8,16],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":16}}},"range":[4,16],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":16}}}],"kind":"var","range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}}}],"range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}},"tokens":[{"type":"Keyword","value":"var","range":[0,3],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":3}}},{"type":"Identifier","value":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},{"type":"Punctuator","value":"=","range":[6,7],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":7}}},{"type":"RegularExpression","value":"/[a-z]/u","regex":{"pattern":"[a-z]","flags":"u"},"range":[8,16],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":16}}}]},"var x = /[\\u{0000000000000061}-\\u{7A}]/u":{"type":"Program","body":[{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"init":{"type":"Literal","value":null,"raw":"/[\\u{0000000000000061}-\\u{7A}]/u","regex":{"pattern":"[\\u{0000000000000061}-\\u{7A}]","flags":"u"},"range":[8,40],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":40}}},"range":[4,40],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":40}}}],"kind":"var","range":[0,40],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":40}}}],"range":[0,40],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":40}},"tokens":[{"type":"Keyword","value":"var","range":[0,3],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":3}}},{"type":"Identifier","value":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},{"type":"Punctuator","value":"=","range":[6,7],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":7}}},{"type":"RegularExpression","value":"/[\\u{0000000000000061}-\\u{7A}]/u","regex":{"pattern":"[\\u{0000000000000061}-\\u{7A}]","flags":"u"},"range":[8,40],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":40}}}]},"var x = /\\u{110000}/u":{"index":21,"lineNumber":1,"column":22,"message":"Error: Line 1: Invalid regular expression"},"var x = /[x-z]/i":{"type":"Program","body":[{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[4,5]},"init":{"type":"Literal","value":"/[x-z]/i","raw":"/[x-z]/i","regex":{"pattern":"[x-z]","flags":"i"},"range":[8,16]},"range":[4,16]}],"kind":"var","range":[0,16]}],"range":[0,16],"tokens":[{"type":"Keyword","value":"var","range":[0,3]},{"type":"Identifier","value":"x","range":[4,5]},{"type":"Punctuator","value":"=","range":[6,7]},{"type":"RegularExpression","value":"/[x-z]/i","regex":{"pattern":"[x-z]","flags":"i"},"range":[8,16]}]},"var x = /[a-c]/i":{"type":"Program","body":[{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"init":{"type":"Literal","value":"/[a-c]/i","raw":"/[a-c]/i","regex":{"pattern":"[a-c]","flags":"i"},"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":16}}},"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":16}}}],"kind":"var","loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}}}],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}},"tokens":[{"type":"Keyword","value":"var","loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":3}}},{"type":"Identifier","value":"x","loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},{"type":"Punctuator","value":"=","loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":7}}},{"type":"RegularExpression","value":"/[a-c]/i","regex":{"pattern":"[a-c]","flags":"i"},"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":16}}}]},"var x = /[P QR]/i":{"type":"Program","body":[{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"init":{"type":"Literal","value":"/[P QR]/i","raw":"/[P QR]/i","regex":{"pattern":"[P QR]","flags":"i"},"range":[8,17],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":17}}},"range":[4,17],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":17}}}],"kind":"var","range":[0,17],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":17}}}],"range":[0,17],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":17}},"tokens":[{"type":"Keyword","value":"var","range":[0,3],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":3}}},{"type":"Identifier","value":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},{"type":"Punctuator","value":"=","range":[6,7],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":7}}},{"type":"RegularExpression","value":"/[P QR]/i","regex":{"pattern":"[P QR]","flags":"i"},"range":[8,17],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":17}}}]},"var x = /[\\]/]/":{"type":"Program","body":[{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"init":{"type":"Literal","value":"/[\\]/]/","raw":"/[\\]/]/","regex":{"pattern":"[\\]/]","flags":""},"range":[8,15],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":15}}},"range":[4,15],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":15}}}],"kind":"var","range":[0,15],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":15}}}],"range":[0,15],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":15}},"tokens":[{"type":"Keyword","value":"var","range":[0,3],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":3}}},{"type":"Identifier","value":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},{"type":"Punctuator","value":"=","range":[6,7],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":7}}},{"type":"RegularExpression","value":"/[\\]/]/","regex":{"pattern":"[\\]/]","flags":""},"range":[8,15],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":15}}}]},"var x = /foo\\/bar/":{"type":"Program","body":[{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"init":{"type":"Literal","value":"/foo\\/bar/","raw":"/foo\\/bar/","regex":{"pattern":"foo\\/bar","flags":""},"range":[8,18],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":18}}},"range":[4,18],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":18}}}],"kind":"var","range":[0,18],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":18}}}],"range":[0,18],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":18}},"tokens":[{"type":"Keyword","value":"var","range":[0,3],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":3}}},{"type":"Identifier","value":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},{"type":"Punctuator","value":"=","range":[6,7],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":7}}},{"type":"RegularExpression","value":"/foo\\/bar/","regex":{"pattern":"foo\\/bar","flags":""},"range":[8,18],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":18}}}]},"var x = /=([^=\\s])+/g":{"type":"Program","body":[{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"init":{"type":"Literal","value":"/=([^=\\s])+/g","raw":"/=([^=\\s])+/g","regex":{"pattern":"=([^=\\s])+","flags":"g"},"range":[8,21],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":21}}},"range":[4,21],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":21}}}],"kind":"var","range":[0,21],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":21}}}],"range":[0,21],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":21}},"tokens":[{"type":"Keyword","value":"var","range":[0,3],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":3}}},{"type":"Identifier","value":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},{"type":"Punctuator","value":"=","range":[6,7],"loc":{"start":{"line":1,"column":6},"end":{"line":1,"column":7}}},{"type":"RegularExpression","value":"/=([^=\\s])+/g","regex":{"pattern":"=([^=\\s])+","flags":"g"},"range":[8,21],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":21}}}]},"var x = /42/g.test":{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"init":{"type":"MemberExpression","computed":false,"object":{"type":"Literal","value":"/42/g","raw":"/42/g","regex":{"pattern":"42","flags":"g"},"range":[8,13],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":13}}},"property":{"type":"Identifier","name":"test","range":[14,18],"loc":{"start":{"line":1,"column":14},"end":{"line":1,"column":18}}},"range":[8,18],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":18}}},"range":[4,18],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":18}}}],"kind":"var","range":[0,18],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":18}}}}');
 }
 }