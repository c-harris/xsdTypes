<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsUnsignedLongTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsUnsignedLongTestValidDataProvider
     * @param mixed $duration
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsUnsignedLongTestValid($duration, $expected, $message)
    {
        $d = new xsUnsignedLong($duration);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsUnsignedLongTestValidDataProvider()
    {
        return array(
            array(+3, '3', 'Positive 3'),
            array('122', '122', '122'),
            array('0', '0', 'zero'),
        );
    }

    /**
     * @dataProvider testxsUnsignedLongTestInvalidDataProvider
     * @param mixed $duration
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsUnsignedLongTestInvalid($duration, $expected, $message)
    {
        $d = new xsUnsignedLong($duration);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsUnsignedLongTestInvalidDataProvider()
    {
        return array(
            array('-123', '', '	negative values are not allowed'),
            array('18446744073709551620', '', 'number is too large'),
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
