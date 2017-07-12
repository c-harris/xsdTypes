<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsNonPositiveIntegerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsNonPositiveIntegerTestValidDataProvider
     * @param mixed $duration
     * @param mixed $message
     */
    public function testxsNonPositiveIntegerTestValid($duration, $expected, $message)
    {
        $d = new xsNonPositiveInteger($duration);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);

    }

    public function testxsNonPositiveIntegerTestValidDataProvider()
    {
        return array(
            array(3, '3', '3'),
            array('0', '0', 'Zero'),
            array('-00122', '-122', 'leading zeros are permitted'),
        );
    }

    /**
     * @dataProvider testxsNonPositiveIntegerTestInvalidDataProvider
     *
     * @param mixed $duration
     * @param mixed $message
     */
    public function testxsNonPositiveIntegerTestInvalid($duration, $expected, $message)
    {
        $d = new xsNonPositiveInteger($duration);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsNonPositiveIntegerTestInvalidDataProvider()
    {
        return array(
            array('122', '', '	value cannot be positive'),
            array('+3', '', 'value cannot be positive'),
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
