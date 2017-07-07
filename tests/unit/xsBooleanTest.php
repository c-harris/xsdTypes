<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsBooleanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsBooleanValidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsBooleanValid($input, $expected, $message)
    {
        try {
            $d = new xsBoolean($input);
            $r = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
        $this->assertEquals($expected, $r, $message);
    }

    public function testxsBooleanValidDataProvider()
    {
        return array(
            array(true, 'true', 'bool true'),
            array(false, 'false', 'bool false'),
            array(0, 'false', 'int false'),
            array(1, 'true', 'int true'),
            array('0', 'false', 'string numeric false'),
            array('1', 'true', 'string numeric true'),
            array('false', 'false', 'string false'),
            array('true', 'true', 'string true'),
        );
    }

    /**
     * @dataProvider testxsBooleanInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsBooleanInvalid($input, $expected, $message)
    {
        $d = new xsBoolean($input);
        $p = (string)$d;
        $this->assertEquals($expected, $p, $message);
    }

    public function testxsBooleanInvalidDataProvider()
    {
        return array(
            array('T', '', 'the word "true" must be spelled out'),
        );
    }

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        parent::tearDown();
    }
}
