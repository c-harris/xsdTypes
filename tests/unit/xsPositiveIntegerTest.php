<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsPositiveIntegerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsPositiveIntegerTestValidDataProvider
     * @param mixed $duration
     * @param mixed $message
     */
    public function testxsPositiveIntegerTestValid($duration, $expected, $message)
    {
        $d = new xsPositiveInteger($duration);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsPositiveIntegerTestValidDataProvider()
    {
        return array(
            array(122, '122', '122'),
            array('+3', '3', '122'),
            array('00122', '122', 'leading zeros are permitted'),
        );
    }

    /**
     * @dataProvider testxsPositiveIntegerTestInvalidDataProvider
     * @param mixed $duration
     * @param mixed $message
     */
    public function testxsPositiveIntegerTestInvalid($duration, $expected, $message)
    {
        $d = new xsPositiveInteger($duration);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsPositiveIntegerTestInvalidDataProvider()
    {
        return array(
            array('0', '', '0 is not considered positive'),
            array('-3', '', 'value cannot be negative'),
            array('3.0', '', 'value must not contain a decimal point'),
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
