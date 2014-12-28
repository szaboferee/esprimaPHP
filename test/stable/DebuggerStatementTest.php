<?php 

 namespace test;
 class DebuggerStatementTest extends BaseTestCase
 {
protected function getFixtures()
{
	return json_decode('
{"debugger;":{"type":"DebuggerStatement","range":[0,9],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":9}}}}');
}
}
