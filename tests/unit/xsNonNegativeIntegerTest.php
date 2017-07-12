<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsNonNegativeIntegerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsNonNegativeIntegerTestValidDataProvider
     * @param mixed $duration
     * @param mixed $message
     */
    public function testxsNonNegativeIntegerTestValid($duration, $expected, $message)
    {
        $d = new xsNonNegativeInteger($duration);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);

    }

    public function testxsNonNegativeIntegerTestValidDataProvider()
    {
        return array(
            array(3, '3', '3'),
            array('0', '0', 'Zero'),
            array('00122', '122', 'leading zeros are permitted'),
        );
    }

    /**
     * @dataProvider testxsNonNegativeIntegerTestInvalidDataProvider
     *
     * @param mixed $duration
     * @param mixed $message
     */
    public function testxsNonNegativeIntegerTestInvalid($duration, $expected, $message)
    {
        $d = new xsNonNegativeInteger($duration);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsNonNegativeIntegerTestInvalidDataProvider()
    {
        return array(
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
