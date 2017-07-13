<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsUnsignedByteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsUnsignedByteTestValidDataProvider
     * @param mixed $duration
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsUnsignedByteTestValid($duration, $expected, $message)
    {
        $d = new xsUnsignedByte($duration);
        $e = (string)$d;
        $this->assertEquals($expected, $e, $message);
    }

    public function testxsUnsignedByteTestValidDataProvider()
    {
        return array(
            array(+3, '3', 'Positive 1'),
            array('122', '122', '122'),
            array('0', '0', 'zero'),
        );
    }

    /**
     * @dataProvider testxsUnsignedByteTestInvalidDataProvider
     * @param mixed $duration
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsUnsignedByteTestInvalid($duration, $expected, $message)
    {
        $d = new xsUnsignedByte($duration);
        $e = (string)$d;
        $this->assertEquals($expected, $e, $message);
    }

    public function testxsUnsignedByteTestInvalidDataProvider()
    {
        return array(
            array('-123', '', '	negative values are not allowed'),
            array('256', '', 'number is too large'),
            array('3.0', '3', 'value must not contain a decimal point'),
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
