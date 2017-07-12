<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsQNameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsQNameTestValidDataProvider
     * @param mixed $duration
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsQNameTestValid($duration, $expected, $message)
    {
        $d = new xsQName($duration);
        $e = (string)$d;
        $this->assertEquals($expected, $e, $message);
    }

    public function testxsQNameTestValidDataProvider()
    {
        return array(
            array('pre:myElement', 'pre:myElement', 'valid assuming the prefix "pre" is mapped to a namespace in scope'),
            array('myElement', 'myElement', 'prefix and colon are optional'),
        );
    }

    /**
     * @dataProvider testxsQNameTestInvalidDataProvider
     * @param mixed $duration
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsQNameTestInvalid($duration, $expected, $message)
    {
        $d = new xsQName($duration);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsQNameTestInvalidDataProvider()
    {
        return array(
            array(':myElement', '', 'a QName must not start with a colon'),
            array('pre:3rdElement', '', 'the local part must not start with a number; it must be a valid NCName'),
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
