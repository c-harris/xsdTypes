<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsUnsignedShortTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsUnsignedShortTestValidDataProvider
     * @param mixed $duration
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsUnsignedShortTestValid($duration, $expected, $message)
    {
        $d = new xsUnsignedShort($duration);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsUnsignedShortTestValidDataProvider()
    {
        return array(
            array(+3, '3', 'Positive 1'),
            array('122', '122', '122'),
            array('0', '0', 'zero'),
        );
    }

    /**
     * @dataProvider testxsUnsignedShortTestInvalidDataProvider
     * @param mixed $duration
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsUnsignedShortTestInvalid($duration, $expected, $message)
    {
        $d = new xsUnsignedShort($duration);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsUnsignedShortTestInvalidDataProvider()
    {
        return array(
            array('-123', '', '	negative values are not allowed'),
            array('65540', '', 'number is too large'),
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
