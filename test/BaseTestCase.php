<?php
/**
 * Created by PhpStorm.
 * User: szaboferee
 * Date: 12/19/14
 * Time: 7:50 PM
 */

namespace test;

use EsprimaPhp\Parser;

error_reporting(E_ALL);
ini_set('display_errors', 'on');

abstract class BaseTestCase extends \PHPUnit_Framework_TestCase
{
	abstract protected function getFixtures();

	/**
	 * @var Parser
	 */
	protected $esprima;

	protected function setUp()
	{
		$this->esprima = new Parser();
	}


	/**
	 * @param $code
	 * @param $expectedTree
	 * @dataProvider getTestFixtures
	 */
	public function testFixture($code, $expectedTree) {

		if (property_exists($expectedTree, 'lineNumber')) {
			$this->_testError($code, $expectedTree);
		} else if (property_exists($expectedTree, 'result')) {
			$this->_testAPI($code, $expectedTree);
		} else if (is_array($expectedTree)) {
			$this->_testTokenize($code, $expectedTree);
		} else {
			$this->_testParse($code, $expectedTree);
		}
	}

	public function getTestFixtures() {
		$ret = array();

		$fixtures = $this->getFixtures();
		foreach($fixtures as $code => $expectedTree) {
			$ret[] = array($code, $expectedTree);
		}

		return $ret;
		return array_slice($ret, 0, 1);
	}

	private function hasAttachedComment($syntax) {

	foreach (get_object_vars($syntax) as $key => $value) {
		if ($key === 'leadingComments' || $key === 'trailingComments') {
			return true;
		}
		if (is_object($value) && count($value)) {
			if ($this->hasAttachedComment($value)) {
				return true;
			}
       }
    }
	return false;
}

	private function _testError($code, $expectedTree)
	{
		$this->markTestIncomplete();
	}

	private function _testAPI($code, $expectedTree)
	{
		$this->markTestIncomplete();
	}

	private function _testTokenize($code, $expectedTree)
	{
		$this->markTestIncomplete();
	}

	private function _testParse($code, $expectedTree)
	{
		$pretty = JSON_PRETTY_PRINT;
		$pretty = 0;
		$debug = 0;

		$options = [
			'comment' => property_exists($expectedTree, 'comment'),
			'range' => true,
			'loc' => true,
			'tokens' => property_exists($expectedTree, 'tokens'),
			'raw' => true,
			'tolerant' => property_exists($expectedTree, 'tolerant'),
			'source' => null,
			'attachComment' => $this->hasAttachedComment($expectedTree)
		];

		if (property_exists($expectedTree, 'tokens') && count($expectedTree->tokens)) {
			$options['range'] = property_exists($expectedTree->tokens[0], 'range');
			$options['loc'] = property_exists($expectedTree->tokens[0], 'loc');
		}
		if (property_exists($expectedTree, 'comments') && count($expectedTree->comments)) {
			$options['range'] = property_exists($expectedTree->comments[0], 'range');
			$options['loc'] = property_exists($expectedTree->comments[0], 'loc');
		}

		if ($options['loc']) {
			$options['source'] = isset($expectedTree->loc->source) ? $expectedTree->loc->source : null;
		}

		$expectedTree = json_encode($expectedTree, $pretty);


		if($debug) {
			echo "\nO: " . json_encode($options). "\n";
			echo "\nC: " . $code. "\n";
			echo "\nE: " . $expectedTree. "\n";
		}
		$actualTree = $this->esprima->parse($code, $options);
		$actualTree = ($options['comment'] || $options['tokens'] || $options['tolerant'])
			? $actualTree
			: (isset($actualTree->body[0]) ? $actualTree->body[0] : null);
		$actualTree = json_encode($actualTree, $pretty);

		if($debug) echo "\nA: " . $actualTree. "\n";

		$this->assertEquals($expectedTree, $actualTree);

	}
} 