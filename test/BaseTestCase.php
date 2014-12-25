<?php
/**
 * Created by PhpStorm.
 * User: szaboferee
 * Date: 12/19/14
 * Time: 7:50 PM
 */

namespace test;

use EsprimaPhp\Parser;
use EsprimaPhp\Util\Error;

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

        if ($code == '_empty_') $code = "";

		if (is_object($expectedTree) && property_exists($expectedTree, 'lineNumber')) {
			$this->_testError($code, $expectedTree);
		} else if (is_object($expectedTree) && property_exists($expectedTree, 'result')) {
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
		if($fixtures == null || !count($fixtures)) {
			$fixtures = array("", null);;
		}
		foreach($fixtures as $code => $expectedTree) {
			$ret[$code] = array($code, $expectedTree);
		}

		return $ret;
	}

	private function hasAttachedComment($syntax)
    {
	    foreach ((is_array($syntax) ? $syntax: get_object_vars($syntax)) as $key => $value) {
		if ($key === 'leadingComments' || $key === 'trailingComments') {
			return true;
		}
		if (is_object($value) || is_array($value)) {
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
        $options = [
            'comment' => true,
            'tolerant' => true,
            'loc' => true,
            'range' => true
        ];


        try {
            $actualTree = $this->esprima->tokenize($code, $options);
        } catch (Error $e) {
            $this->fail('Parsing failed:' . $e);
        }

        $actualTree = json_encode($actualTree);

        /**
        echo "\nC: " . $code. "\n";
        echo "\nE: " . json_encode($expectedTree). "\n";
        echo "\nA: " . $actualTree. "\n";
        /**/
        $actualTree = json_decode($actualTree);
        //$expectedTree = json_encode($expectedTree);


        $this->assertEquals($expectedTree, $actualTree);
	}

	private function _testParse($code, $expectedTree)
	{
		$pretty = JSON_PRETTY_PRINT;
		$debug = 0;

        if(!is_object($expectedTree)) {
            $this->markTestIncomplete("invalid json");
        }

		$options = [
			'comment' => property_exists($expectedTree, 'comments'),
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

		if($debug) {

			echo "\nO: " . json_encode($options). "\n";
			echo "\nC: " . $code. "\n";
			echo "\nE: " . json_encode($expectedTree). "\n";
		}
		try {
			$actualTree = $this->esprima->parse($code, $options);
		} catch (Error $e) {
			$this->fail('Parsing failed:' . $e);
		}

		$actualTree = ($options['comment'] || $options['tokens'] || $options['tolerant'])
			? $actualTree
			: (isset($actualTree->body[0]) ? $actualTree->body[0] : null);

        $actualTree = json_encode($actualTree);
		if($debug) echo "\nA: " . $actualTree. "\n";
        $actualTree = json_decode($actualTree);


		$this->assertEquals($expectedTree, $actualTree);

	}
}