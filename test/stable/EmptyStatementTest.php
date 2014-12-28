<?php 

 namespace test;
 class EmptyStatementTest extends BaseTestCase 
 {
protected function getFixtures()
{
	return json_decode('
{";":{"type":"EmptyStatement","range":[0,1],"loc":{"start":{"line":1,"column":0},"end":{"line":1,"column":1}}}}');
}
}
