<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsUnsignedLongTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider testxsUnsignedLongTestValidDataProvider
     */
    public function testxsUnsignedLongTestValid($duration, $message) {
        $d = new xsUnsignedLong($duration);
        $e = (string)$d;
        $this->assertEquals($duration,$e,$message);

    }

    public function testxsUnsignedLongTestValidDataProvider() {
        return array(
            array(+3, 'Positive 1'),
            array('122', '122'),
            array('0', 'zero'),
        );
    }
    /**
     * @dataProvider testxsUnsignedLongTestInvalidDataProvider
     */
    public function testxsUnsignedLongTestInvalid($duration, $message) {
            $d = new xsUnsignedLong($duration);
            $e = (string)$d;
        $this->assertEquals('',$e,$message);
    }

    public function testxsUnsignedLongTestInvalidDataProvider() {
        return array(
            array('-123', '	negative values are not allowed'),
            array('18446744073709551620', 'number is too large'),
            array('3.0', 'value must not contain a decimal point'),
            array('', '	an empty value is not valid, unless xsi:nil is used'),
        );
    }
}
