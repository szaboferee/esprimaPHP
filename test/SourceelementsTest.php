<?php 

 namespace test;
 class SourceelementsTest extends BaseTestCase 
 {
protected function getFixtures()
{
	return json_decode('
{"":{"type":"Program","body":[],"range":[0,0],"loc":{"start":{"line":0,"column":0},"end":{"line":0,"column":0}},"tokens":[]}}');
}
}
