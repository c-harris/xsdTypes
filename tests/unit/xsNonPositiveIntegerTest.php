<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsNonPositiveIntegerTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider testxsNonPositiveIntegerTestValidDataProvider
     * @param mixed $duration
     * @param mixed $message
     */
    public function testxsNonPositiveIntegerTestValid($duration, $message)
    {
        $d = new xsNonPositiveInteger($duration);
        $e = (string)$d;
        $this->assertEquals($duration, $e, $message);
    }

    public function testxsNonPositiveIntegerTestValidDataProvider()
    {
        return array(
            array(3, '3'),
            array('0', 'Zero'),
            array('-00122', 'leading zeros are permitted'),
        );
    }
    /**
     * @dataProvider testxxsNonPositiveIntegerTestInvalidDataProvider
     * @param mixed $duration
     * @param mixed $message
     */
    public function testxsNonPositiveIntegerTestInvalid($duration, $message)
    {
        try {
            $d = new xsNonPositiveInteger($duration);
            $e = (string)$d;
            $this->fail($message);
        } catch (\Exception $e) {
        }
    }

    public function testxsPositiveIntegerTestInvalidDataProvider()
    {
        return array(
            array('122', '	value cannot be positive'),
            array('+3', 'value cannot be positive'),
            array('3.0', 'value must not contain a decimal point'),
            array('', '	an empty value is not valid, unless xsi:nil is used'),
        );
    }
}
