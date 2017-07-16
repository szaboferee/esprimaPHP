<?php

namespace test;
class IterationStatementsTest extends BaseTestCase
{
    protected function getFixtures()
    {
        return json_decode('{
        "do keep(); while (true)":{"type":"DoWhileStatement","body":{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"keep","range":[3,7],"loc":{"start":{"line":1,"column":3},"end":{"line":1,"column":7}}},"arguments":[],"range":[3,9],"loc":{"start":{"line":1,"column":3},"end":{"line":1,"column":9}}},"range":[3,10],"loc":{"start":{"line":1,"column":3},"end":{"line":1,"column":10}}},"test":{"type":"Literal","value":true,"raw":"true","range":[18,22],"loc":{"start":{"line":1,"column":18},"end":{"line":1,"column":22}}},"range":[0,23],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":23}}},"do keep(); while (true);":{"type":"DoWhileStatement","body":{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"keep","range":[3,7],"loc":{"start":{"line":1,"column":3},"end":{"line":1,"column":7}}},"arguments":[],"range":[3,9],"loc":{"start":{"line":1,"column":3},"end":{"line":1,"column":9}}},"range":[3,10],"loc":{"start":{"line":1,"column":3},"end":{"line":1,"column":10}}},"test":{"type":"Literal","value":true,"raw":"true","range":[18,22],"loc":{"start":{"line":1,"column":18},"end":{"line":1,"column":22}}},"range":[0,24],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":24}}},"do { x++; y--; } while (x < 10)":{"type":"DoWhileStatement","body":{"type":"BlockStatement","body":[{"type":"ExpressionStatement","expression":{"type":"UpdateExpression","operator":"++","argument":{"type":"Identifier","name":"x","range":[5,6],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":6}}},"prefix":false,"range":[5,8],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":8}}},"range":[5,9],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":9}}},{"type":"ExpressionStatement","expression":{"type":"UpdateExpression","operator":"--","argument":{"type":"Identifier","name":"y","range":[10,11],"loc":{"start":{"line":1,"column":10},"end":{"line":1,"column":11}}},"prefix":false,"range":[10,13],"loc":{"start":{"line":1,"column":10},"end":{"line":1,"column":13}}},"range":[10,14],"loc":{"start":{"line":1,"column":10},"end":{"line":1,"column":14}}}],"range":[3,16],"loc":{"start":{"line":1,"column":3},"end":{"line":1,"column":16}}},"test":{"type":"BinaryExpression","operator":"<","left":{"type":"Identifier","name":"x","range":[24,25],"loc":{"start":{"line":1,"column":24},"end":{"line":1,"column":25}}},"right":{"type":"Literal","value":10,"raw":"10","range":[28,30],"loc":{"start":{"line":1,"column":28},"end":{"line":1,"column":30}}},"range":[24,30],"loc":{"start":{"line":1,"column":24},"end":{"line":1,"column":30}}},"range":[0,31],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":31}}},"{ do { } while (false) false }":{"type":"BlockStatement","body":[{"type":"DoWhileStatement","body":{"type":"BlockStatement","body":[],"range":[5,8],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":8}}},"test":{"type":"Literal","value":false,"raw":"false","range":[16,21],"loc":{"start":{"line":1,"column":16},"end":{"line":1,"column":21}}},"range":[2,22],"loc":{"start":{"line":1,"column":2},"end":{"line":1,"column":22}}},{"type":"ExpressionStatement","expression":{"type":"Literal","value":false,"raw":"false","range":[23,28],"loc":{"start":{"line":1,"column":23},"end":{"line":1,"column":28}}},"range":[23,29],"loc":{"start":{"line":1,"column":23},"end":{"line":1,"column":29}}}],"range":[0,30],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":30}}},
        "do that();while (true)":{"type":"DoWhileStatement","body":{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"that","range":[3,7],"loc":{"start":{"line":1,"column":3},"end":{"line":1,"column":7}}},"arguments":[],"range":[3,9],"loc":{"start":{"line":1,"column":3},"end":{"line":1,"column":9}}},"range":[3,10],"loc":{"start":{"line":1,"column":3},"end":{"line":1,"column":10}}},"test":{"type":"Literal","value":true,"raw":"true","range":[17,21],"loc":{"start":{"line":1,"column":17},"end":{"line":1,"column":21}}},"range":[0,22],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":22}}},
        "do that()\n;while (true)":{"type":"DoWhileStatement","body":{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"that","range":[3,7],"loc":{"start":{"line":1,"column":3},"end":{"line":1,"column":7}}},"arguments":[],"range":[3,9],"loc":{"start":{"line":1,"column":3},"end":{"line":1,"column":9}}},"range":[3,11],"loc":{"start":{"line":1,"column":3},"end":{"line":2,"column":1}}},"test":{"type":"Literal","value":true,"raw":"true","range":[18,22],"loc":{"start":{"line":2,"column":8},"end":{"line":2,"column":12}}},"range":[0,23],"loc":{"start":{"line":1,"column":0},"end":{"line":2,"column":13}}},"while (true) doSomething()":{"type":"WhileStatement","test":{"type":"Literal","value":true,"raw":"true","range":[7,11],"loc":{"start":{"line":1,"column":7},"end":{"line":1,"column":11}}},"body":{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"doSomething","range":[13,24],"loc":{"start":{"line":1,"column":13},"end":{"line":1,"column":24}}},"arguments":[],"range":[13,26],"loc":{"start":{"line":1,"column":13},"end":{"line":1,"column":26}}},"range":[13,26],"loc":{"start":{"line":1,"column":13},"end":{"line":1,"column":26}}},"range":[0,26],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":26}}},"while (x < 10) { x++; y--; }":{"type":"WhileStatement","test":{"type":"BinaryExpression","operator":"<","left":{"type":"Identifier","name":"x","range":[7,8],"loc":{"start":{"line":1,"column":7},"end":{"line":1,"column":8}}},"right":{"type":"Literal","value":10,"raw":"10","range":[11,13],"loc":{"start":{"line":1,"column":11},"end":{"line":1,"column":13}}},"range":[7,13],"loc":{"start":{"line":1,"column":7},"end":{"line":1,"column":13}}},"body":{"type":"BlockStatement","body":[{"type":"ExpressionStatement","expression":{"type":"UpdateExpression","operator":"++","argument":{"type":"Identifier","name":"x","range":[17,18],"loc":{"start":{"line":1,"column":17},"end":{"line":1,"column":18}}},"prefix":false,"range":[17,20],"loc":{"start":{"line":1,"column":17},"end":{"line":1,"column":20}}},"range":[17,21],"loc":{"start":{"line":1,"column":17},"end":{"line":1,"column":21}}},{"type":"ExpressionStatement","expression":{"type":"UpdateExpression","operator":"--","argument":{"type":"Identifier","name":"y","range":[22,23],"loc":{"start":{"line":1,"column":22},"end":{"line":1,"column":23}}},"prefix":false,"range":[22,25],"loc":{"start":{"line":1,"column":22},"end":{"line":1,"column":25}}},"range":[22,26],"loc":{"start":{"line":1,"column":22},"end":{"line":1,"column":26}}}],"range":[15,28],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":28}}},"range":[0,28],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":28}}},"for(;;);":{"type":"ForStatement","init":null,"test":null,"update":null,"body":{"type":"EmptyStatement","range":[7,8],"loc":{"start":{"line":1,"column":7},"end":{"line":1,"column":8}}},"range":[0,8],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":8}}},"for(;;){}":{"type":"ForStatement","init":null,"test":null,"update":null,"body":{"type":"BlockStatement","body":[],"range":[7,9],"loc":{"start":{"line":1,"column":7},"end":{"line":1,"column":9}}},"range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}},"for(x = 0;;);":{"type":"ForStatement","init":{"type":"AssignmentExpression","operator":"=","left":{"type":"Identifier","name":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"right":{"type":"Literal","value":0,"raw":"0","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[4,9],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":9}}},"test":null,"update":null,"body":{"type":"EmptyStatement","range":[12,13],"loc":{"start":{"line":1,"column":12},"end":{"line":1,"column":13}}},"range":[0,13],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":13}}},"for(var x = 0;;);":{"type":"ForStatement","init":{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"init":{"type":"Literal","value":0,"raw":"0","range":[12,13],"loc":{"start":{"line":1,"column":12},"end":{"line":1,"column":13}}},"range":[8,13],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":13}}}],"kind":"var","range":[4,13],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":13}}},"test":null,"update":null,"body":{"type":"EmptyStatement","range":[16,17],"loc":{"start":{"line":1,"column":16},"end":{"line":1,"column":17}}},"range":[0,17],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":17}}},"for(let x = 0;;);":{"type":"ForStatement","init":{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"init":{"type":"Literal","value":0,"raw":"0","range":[12,13],"loc":{"start":{"line":1,"column":12},"end":{"line":1,"column":13}}},"range":[8,13],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":13}}}],"kind":"let","range":[4,13],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":13}}},"test":null,"update":null,"body":{"type":"EmptyStatement","range":[16,17],"loc":{"start":{"line":1,"column":16},"end":{"line":1,"column":17}}},"range":[0,17],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":17}}},"for(var x = 0, y = 1;;);":{"type":"ForStatement","init":{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"init":{"type":"Literal","value":0,"raw":"0","range":[12,13],"loc":{"start":{"line":1,"column":12},"end":{"line":1,"column":13}}},"range":[8,13],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":13}}},{"type":"VariableDeclarator","id":{"type":"Identifier","name":"y","range":[15,16],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":16}}},"init":{"type":"Literal","value":1,"raw":"1","range":[19,20],"loc":{"start":{"line":1,"column":19},"end":{"line":1,"column":20}}},"range":[15,20],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":20}}}],"kind":"var","range":[4,20],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":20}}},"test":null,"update":null,"body":{"type":"EmptyStatement","range":[23,24],"loc":{"start":{"line":1,"column":23},"end":{"line":1,"column":24}}},"range":[0,24],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":24}}},"for(x = 0; x < 42;);":{"type":"ForStatement","init":{"type":"AssignmentExpression","operator":"=","left":{"type":"Identifier","name":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"right":{"type":"Literal","value":0,"raw":"0","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[4,9],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":9}}},"test":{"type":"BinaryExpression","operator":"<","left":{"type":"Identifier","name":"x","range":[11,12],"loc":{"start":{"line":1,"column":11},"end":{"line":1,"column":12}}},"right":{"type":"Literal","value":42,"raw":"42","range":[15,17],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":17}}},"range":[11,17],"loc":{"start":{"line":1,"column":11},"end":{"line":1,"column":17}}},"update":null,"body":{"type":"EmptyStatement","range":[19,20],"loc":{"start":{"line":1,"column":19},"end":{"line":1,"column":20}}},"range":[0,20],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":20}}},"for(x = 0; x < 42; x++);":{"type":"ForStatement","init":{"type":"AssignmentExpression","operator":"=","left":{"type":"Identifier","name":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"right":{"type":"Literal","value":0,"raw":"0","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[4,9],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":9}}},"test":{"type":"BinaryExpression","operator":"<","left":{"type":"Identifier","name":"x","range":[11,12],"loc":{"start":{"line":1,"column":11},"end":{"line":1,"column":12}}},"right":{"type":"Literal","value":42,"raw":"42","range":[15,17],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":17}}},"range":[11,17],"loc":{"start":{"line":1,"column":11},"end":{"line":1,"column":17}}},"update":{"type":"UpdateExpression","operator":"++","argument":{"type":"Identifier","name":"x","range":[19,20],"loc":{"start":{"line":1,"column":19},"end":{"line":1,"column":20}}},"prefix":false,"range":[19,22],"loc":{"start":{"line":1,"column":19},"end":{"line":1,"column":22}}},"body":{"type":"EmptyStatement","range":[23,24],"loc":{"start":{"line":1,"column":23},"end":{"line":1,"column":24}}},"range":[0,24],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":24}}},"for(x = 0; x < 42; x++) process(x);":{"type":"ForStatement","init":{"type":"AssignmentExpression","operator":"=","left":{"type":"Identifier","name":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"right":{"type":"Literal","value":0,"raw":"0","range":[8,9],"loc":{"start":{"line":1,"column":8},"end":{"line":1,"column":9}}},"range":[4,9],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":9}}},"test":{"type":"BinaryExpression","operator":"<","left":{"type":"Identifier","name":"x","range":[11,12],"loc":{"start":{"line":1,"column":11},"end":{"line":1,"column":12}}},"right":{"type":"Literal","value":42,"raw":"42","range":[15,17],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":17}}},"range":[11,17],"loc":{"start":{"line":1,"column":11},"end":{"line":1,"column":17}}},"update":{"type":"UpdateExpression","operator":"++","argument":{"type":"Identifier","name":"x","range":[19,20],"loc":{"start":{"line":1,"column":19},"end":{"line":1,"column":20}}},"prefix":false,"range":[19,22],"loc":{"start":{"line":1,"column":19},"end":{"line":1,"column":22}}},"body":{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"process","range":[24,31],"loc":{"start":{"line":1,"column":24},"end":{"line":1,"column":31}}},"arguments":[{"type":"Identifier","name":"x","range":[32,33],"loc":{"start":{"line":1,"column":32},"end":{"line":1,"column":33}}}],"range":[24,34],"loc":{"start":{"line":1,"column":24},"end":{"line":1,"column":34}}},"range":[24,35],"loc":{"start":{"line":1,"column":24},"end":{"line":1,"column":35}}},"range":[0,35],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":35}}},"for(x in list) process(x);":{"type":"ForInStatement","left":{"type":"Identifier","name":"x","range":[4,5],"loc":{"start":{"line":1,"column":4},"end":{"line":1,"column":5}}},"right":{"type":"Identifier","name":"list","range":[9,13],"loc":{"start":{"line":1,"column":9},"end":{"line":1,"column":13}}},"body":{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"process","range":[15,22],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":22}}},"arguments":[{"type":"Identifier","name":"x","range":[23,24],"loc":{"start":{"line":1,"column":23},"end":{"line":1,"column":24}}}],"range":[15,25],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":25}}},"range":[15,26],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":26}}},"each":false,"range":[0,26],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":26}}},"for (var x in list) process(x);":{"type":"ForInStatement","left":{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[9,10],"loc":{"start":{"line":1,"column":9},"end":{"line":1,"column":10}}},"init":null,"range":[9,10],"loc":{"start":{"line":1,"column":9},"end":{"line":1,"column":10}}}],"kind":"var","range":[5,10],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":10}}},"right":{"type":"Identifier","name":"list","range":[14,18],"loc":{"start":{"line":1,"column":14},"end":{"line":1,"column":18}}},"body":{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"process","range":[20,27],"loc":{"start":{"line":1,"column":20},"end":{"line":1,"column":27}}},"arguments":[{"type":"Identifier","name":"x","range":[28,29],"loc":{"start":{"line":1,"column":28},"end":{"line":1,"column":29}}}],"range":[20,30],"loc":{"start":{"line":1,"column":20},"end":{"line":1,"column":30}}},"range":[20,31],"loc":{"start":{"line":1,"column":20},"end":{"line":1,"column":31}}},"each":false,"range":[0,31],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":31}}},"for (var x = 42 in list) process(x);":{"type":"ForInStatement","left":{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[9,10],"loc":{"start":{"line":1,"column":9},"end":{"line":1,"column":10}}},"init":{"type":"Literal","value":42,"raw":"42","range":[13,15],"loc":{"start":{"line":1,"column":13},"end":{"line":1,"column":15}}},"range":[9,15],"loc":{"start":{"line":1,"column":9},"end":{"line":1,"column":15}}}],"kind":"var","range":[5,15],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":15}}},"right":{"type":"Identifier","name":"list","range":[19,23],"loc":{"start":{"line":1,"column":19},"end":{"line":1,"column":23}}},"body":{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"process","range":[25,32],"loc":{"start":{"line":1,"column":25},"end":{"line":1,"column":32}}},"arguments":[{"type":"Identifier","name":"x","range":[33,34],"loc":{"start":{"line":1,"column":33},"end":{"line":1,"column":34}}}],"range":[25,35],"loc":{"start":{"line":1,"column":25},"end":{"line":1,"column":35}}},"range":[25,36],"loc":{"start":{"line":1,"column":25},"end":{"line":1,"column":36}}},"each":false,"range":[0,36],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":36}}},"for (let x in list) process(x);":{"type":"ForInStatement","left":{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[9,10],"loc":{"start":{"line":1,"column":9},"end":{"line":1,"column":10}}},"init":null,"range":[9,10],"loc":{"start":{"line":1,"column":9},"end":{"line":1,"column":10}}}],"kind":"let","range":[5,10],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":10}}},"right":{"type":"Identifier","name":"list","range":[14,18],"loc":{"start":{"line":1,"column":14},"end":{"line":1,"column":18}}},"body":{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"process","range":[20,27],"loc":{"start":{"line":1,"column":20},"end":{"line":1,"column":27}}},"arguments":[{"type":"Identifier","name":"x","range":[28,29],"loc":{"start":{"line":1,"column":28},"end":{"line":1,"column":29}}}],"range":[20,30],"loc":{"start":{"line":1,"column":20},"end":{"line":1,"column":30}}},"range":[20,31],"loc":{"start":{"line":1,"column":20},"end":{"line":1,"column":31}}},"each":false,"range":[0,31],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":31}}},"for (var x = y = z in q);":{"type":"ForInStatement","left":{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"x","range":[9,10],"loc":{"start":{"line":1,"column":9},"end":{"line":1,"column":10}}},"init":{"type":"AssignmentExpression","operator":"=","left":{"type":"Identifier","name":"y","range":[13,14],"loc":{"start":{"line":1,"column":13},"end":{"line":1,"column":14}}},"right":{"type":"Identifier","name":"z","range":[17,18],"loc":{"start":{"line":1,"column":17},"end":{"line":1,"column":18}}},"range":[13,18],"loc":{"start":{"line":1,"column":13},"end":{"line":1,"column":18}}},"range":[9,18],"loc":{"start":{"line":1,"column":9},"end":{"line":1,"column":18}}}],"kind":"var","range":[5,18],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":18}}},"right":{"type":"Identifier","name":"q","range":[22,23],"loc":{"start":{"line":1,"column":22},"end":{"line":1,"column":23}}},"body":{"type":"EmptyStatement","range":[24,25],"loc":{"start":{"line":1,"column":24},"end":{"line":1,"column":25}}},"each":false,"range":[0,25],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":25}}},"for (var a = b = c = (d in e) in z);":{"type":"ForInStatement","left":{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"a","range":[9,10],"loc":{"start":{"line":1,"column":9},"end":{"line":1,"column":10}}},"init":{"type":"AssignmentExpression","operator":"=","left":{"type":"Identifier","name":"b","range":[13,14],"loc":{"start":{"line":1,"column":13},"end":{"line":1,"column":14}}},"right":{"type":"AssignmentExpression","operator":"=","left":{"type":"Identifier","name":"c","range":[17,18],"loc":{"start":{"line":1,"column":17},"end":{"line":1,"column":18}}},"right":{"type":"BinaryExpression","operator":"in","left":{"type":"Identifier","name":"d","range":[22,23],"loc":{"start":{"line":1,"column":22},"end":{"line":1,"column":23}}},"right":{"type":"Identifier","name":"e","range":[27,28],"loc":{"start":{"line":1,"column":27},"end":{"line":1,"column":28}}},"range":[22,28],"loc":{"start":{"line":1,"column":22},"end":{"line":1,"column":28}}},"range":[17,29],"loc":{"start":{"line":1,"column":17},"end":{"line":1,"column":29}}},"range":[13,29],"loc":{"start":{"line":1,"column":13},"end":{"line":1,"column":29}}},"range":[9,29],"loc":{"start":{"line":1,"column":9},"end":{"line":1,"column":29}}}],"kind":"var","range":[5,29],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":29}}},"right":{"type":"Identifier","name":"z","range":[33,34],"loc":{"start":{"line":1,"column":33},"end":{"line":1,"column":34}}},"body":{"type":"EmptyStatement","range":[35,36],"loc":{"start":{"line":1,"column":35},"end":{"line":1,"column":36}}},"each":false,"range":[0,36],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":36}}},"for (var i = function() { return 10 in [] } in list) process(x);":{"type":"ForInStatement","left":{"type":"VariableDeclaration","declarations":[{"type":"VariableDeclarator","id":{"type":"Identifier","name":"i","range":[9,10],"loc":{"start":{"line":1,"column":9},"end":{"line":1,"column":10}}},"init":{"type":"FunctionExpression","id":null,"params":[],"defaults":[],"body":{"type":"BlockStatement","body":[{"type":"ReturnStatement","argument":{"type":"BinaryExpression","operator":"in","left":{"type":"Literal","value":10,"raw":"10","range":[33,35],"loc":{"start":{"line":1,"column":33},"end":{"line":1,"column":35}}},"right":{"type":"ArrayExpression","elements":[],"range":[39,41],"loc":{"start":{"line":1,"column":39},"end":{"line":1,"column":41}}},"range":[33,41],"loc":{"start":{"line":1,"column":33},"end":{"line":1,"column":41}}},"range":[26,42],"loc":{"start":{"line":1,"column":26},"end":{"line":1,"column":42}}}],"range":[24,43],"loc":{"start":{"line":1,"column":24},"end":{"line":1,"column":43}}},"rest":null,"generator":false,"expression":false,"range":[13,43],"loc":{"start":{"line":1,"column":13},"end":{"line":1,"column":43}}},"range":[9,43],"loc":{"start":{"line":1,"column":9},"end":{"line":1,"column":43}}}],"kind":"var","range":[5,43],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":43}}},"right":{"type":"Identifier","name":"list","range":[47,51],"loc":{"start":{"line":1,"column":47},"end":{"line":1,"column":51}}},"body":{"type":"ExpressionStatement","expression":{"type":"CallExpression","callee":{"type":"Identifier","name":"process","range":[53,60],"loc":{"start":{"line":1,"column":53},"end":{"line":1,"column":60}}},"arguments":[{"type":"Identifier","name":"x","range":[61,62],"loc":{"start":{"line":1,"column":61},"end":{"line":1,"column":62}}}],"range":[53,63],"loc":{"start":{"line":1,"column":53},"end":{"line":1,"column":63}}},"range":[53,64],"loc":{"start":{"line":1,"column":53},"end":{"line":1,"column":64}}},"each":false,"range":[0,64],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":64}}},"for (a[b in c] in d);":{"type":"ForInStatement","left":{"type":"MemberExpression","computed":true,"object":{"type":"Identifier","name":"a","range":[5,6],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":6}}},"property":{"type":"BinaryExpression","operator":"in","left":{"type":"Identifier","name":"b","range":[7,8],"loc":{"start":{"line":1,"column":7},"end":{"line":1,"column":8}}},"right":{"type":"Identifier","name":"c","range":[12,13],"loc":{"start":{"line":1,"column":12},"end":{"line":1,"column":13}}},"range":[7,13],"loc":{"start":{"line":1,"column":7},"end":{"line":1,"column":13}}},"range":[5,14],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":14}}},"right":{"type":"Identifier","name":"d","range":[18,19],"loc":{"start":{"line":1,"column":18},"end":{"line":1,"column":19}}},"body":{"type":"EmptyStatement","range":[20,21],"loc":{"start":{"line":1,"column":20},"end":{"line":1,"column":21}}},"each":false,"range":[0,21],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":21}}},"for (a(b in c)[0] in d);":{"type":"ForInStatement","left":{"type":"MemberExpression","computed":true,"object":{"type":"CallExpression","callee":{"type":"Identifier","name":"a","range":[5,6],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":6}}},"arguments":[{"type":"BinaryExpression","operator":"in","left":{"type":"Identifier","name":"b","range":[7,8],"loc":{"start":{"line":1,"column":7},"end":{"line":1,"column":8}}},"right":{"type":"Identifier","name":"c","range":[12,13],"loc":{"start":{"line":1,"column":12},"end":{"line":1,"column":13}}},"range":[7,13],"loc":{"start":{"line":1,"column":7},"end":{"line":1,"column":13}}}],"range":[5,14],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":14}}},"property":{"type":"Literal","value":0,"raw":"0","range":[15,16],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":16}}},"range":[5,17],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":17}}},"right":{"type":"Identifier","name":"d","range":[21,22],"loc":{"start":{"line":1,"column":21},"end":{"line":1,"column":22}}},"body":{"type":"EmptyStatement","range":[23,24],"loc":{"start":{"line":1,"column":23},"end":{"line":1,"column":24}}},"each":false,"range":[0,24],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":24}}},"for (a.in in a);":{"type":"ForInStatement","left":{"type":"MemberExpression","computed":false,"object":{"type":"Identifier","name":"a","range":[5,6],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":6}}},"property":{"type":"Identifier","name":"in","range":[7,9],"loc":{"start":{"line":1,"column":7},"end":{"line":1,"column":9}}},"range":[5,9],"loc":{"start":{"line":1,"column":5},"end":{"line":1,"column":9}}},"right":{"type":"Identifier","name":"a","range":[13,14],"loc":{"start":{"line":1,"column":13},"end":{"line":1,"column":14}}},"body":{"type":"EmptyStatement","range":[15,16],"loc":{"start":{"line":1,"column":15},"end":{"line":1,"column":16}}},"each":false,"range":[0,16],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":16}}}}');
    }
}
