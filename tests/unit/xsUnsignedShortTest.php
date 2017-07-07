<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsUnsignedShortTest extends \PHPUnit_Framework_TestCase
{
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

    /**
     * @dataProvider testxsUnsignedShortTestValidDataProvider
     * @param mixed $duration
     * @param mixed $message
     */
    public function testxsUnsignedShortTestValid($duration, $message)
    {
        $d = new xsUnsignedShort($duration);
        $e = (string)$d;
        $this->assertEquals($duration, $e, $message);
    }

    public function testxsUnsignedShortTestValidDataProvider()
    {
        return array(
            array(+3, 'Positive 1'),
            array('122', '122'),
            array('0', 'zero'),
        );
    }
    /**
     * @dataProvider testxsUnsignedShortTestInvalidDataProvider
     * @param mixed $duration
     * @param mixed $message
     */
    public function testxsUnsignedShortTestInvalid($duration, $message)
    {
        $d = new xsUnsignedShort($duration);
        $e = (string)$d;
        $this->assertEquals('', $e, $message);
    }

    public function testxsUnsignedShortTestInvalidDataProvider()
    {
        return array(
            array('-123', '	negative values are not allowed'),
            array('65540', 'number is too large'),
            array('3.0', 'value must not contain a decimal point'),
            array('', '	an empty value is not valid, unless xsi:nil is used'),
        );
    }
}
