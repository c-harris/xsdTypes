<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsPositiveIntegerTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider testxsPositiveIntegerTestValidDataProvider
     */
    public function testxsPositiveIntegerTestValid($duration, $message) {
        $d = new xsPositiveInteger($duration);
        $e = (string)$d;
        $this->assertEquals($duration,$e,$message);

    }

    public function testxsPositiveIntegerTestValidDataProvider() {
        return array(
            array(122, '122'),
            array('+3', '122'),
            array('00122', 'leading zeros are permitted'),
        );
    }
    /**
     * @dataProvider testxsPositiveIntegerTestInvalidDataProvider
     */
    public function testxsPositiveIntegerTestInvalid($duration, $message) {
            $d = new xsPositiveInteger($duration);
            $e = (string)$d;
            $this->fail($message);
            $this->assertEquals('',$e,$message);
    }

    public function testxsPositiveIntegerTestInvalidDataProvider() {
        return array(
            array('0', '0 is not considered positive'),
            array('-3', 'value cannot be negative'),
            array('3.0', 'value must not contain a decimal point'),
            array('', '	an empty value is not valid, unless xsi:nil is used'),
        );
    }
}
