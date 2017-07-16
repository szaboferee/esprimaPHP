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
    /**
     * @var Parser
     */
    protected $esprima;

    /**
     * @param $code
     * @param $expectedTree
     * @dataProvider getTestFixtures
     */
    public function testFixture($code, $expectedTree)
    {

        if ($code == '_empty_') {
            $code = "";
        }

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

    private function _testError($code, $exception)
    {
        // Different parsing options should give the same error.
        $options = [
            [],
            ['comment' => true],
            ['raw' => true],
            ['raw' => true, 'comment' => true],
        ];
        $tokenize = false;
        $actual = 'no error';
        $exception->description = preg_replace('/Error: Line [0-9]+: /', '', $exception->message);

        if (property_exists($exception, 'tokenize') && $exception->tokenize) {
            $tokenize = true;
            unset($exception->tokenize);
        }

        $expected = json_encode($exception);
        $expected = $exception;

        foreach ($options as $option) {

            try {
                if ($tokenize) {
                    $this->esprima->tokenize($code, $option);
                } else {
                    $this->esprima->parse($code, $option);
                }
            } catch (Error $e) {
                $actual = json_encode($e);
                $actual = $this->errorToObject($e);
            }

            $this->assertEquals($expected, $actual);

        }
    }

    private function errorToObject(Error $e)
    {
        return (object)[
            'index' => $e->index,
            'lineNumber' => $e->lineNumber,
            'column' => $e->column,
            'message' => $e->message,
            'description' => $e->description,
        ];
    }

    private function _testAPI($code, $expectedTree)
    {
        try {
            $actualTree = call_user_func_array(array($this->esprima, $expectedTree->call), $expectedTree->args);
        } catch (Error $e) {
            $this->fail('Parsing failed:' . $e);
        }

        $expectedTree = $expectedTree->result;
        $actualTree = json_encode($actualTree);

        /**
         * echo "\nC: " . $code. "\n";
         * echo "\nE: " . json_encode($expectedTree). "\n";
         * echo "\nA: " . $actualTree. "\n";
         * /**/
        //$actualTree = json_decode($actualTree);
        $expectedTree = json_encode($expectedTree);


        $this->assertEquals($expectedTree, $actualTree);


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
         * echo "\nC: " . $code. "\n";
         * echo "\nE: " . json_encode($expectedTree). "\n";
         * echo "\nA: " . $actualTree. "\n";
         * /**/
        $actualTree = json_decode($actualTree);
        //$expectedTree = json_encode($expectedTree);


        $this->assertEquals($expectedTree, $actualTree);
    }

    private function _testParse($code, $expectedTree)
    {
        $pretty = JSON_PRETTY_PRINT;
        $debug = 0;

        if (!is_object($expectedTree)) {
            $this->markTestIncomplete("invalid json : " . $expectedTree);
        }

        $options = [
            'comment' => property_exists($expectedTree, 'comments'),
            'range' => true,
            'loc' => true,
            'tokens' => property_exists($expectedTree, 'tokens'),
            'raw' => true,
            'tolerant' => property_exists($expectedTree, 'errors'),
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

        if ($debug) {

            echo "\nO: " . json_encode($options) . "\n";
            echo "\nC: " . $code . "\n";
            echo "\nE: " . json_encode($expectedTree) . "\n";
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
        if ($debug) echo "\nA: " . $actualTree . "\n";
        $actualTree = json_decode($actualTree);


        $this->assertEquals($expectedTree, $actualTree);

    }

    private function hasAttachedComment($syntax)
    {
        foreach ((is_array($syntax) ? $syntax : get_object_vars($syntax)) as $key => $value) {
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

    public function getTestFixtures()
    {
        $ret = array();

        $fixtures = $this->getFixtures();
        if ($fixtures == null || !count($fixtures)) {
            $fixtures = array("", null);
        }
        foreach ($fixtures as $code => $expectedTree) {
            $ret[$code] = array($code, $expectedTree);
        }

        return $ret;
    }

    abstract protected function getFixtures();

    protected function setUp()
    {
        $this->esprima = new Parser();
    }
}