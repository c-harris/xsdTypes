<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsShortTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsShortTestValidDataProvider
     * @param mixed $duration
     * @param mixed $message
     */
    public function testxsShortTestValid($duration, $expected, $message)
    {
        $d = new xsShort($duration);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsShortTestValidDataProvider()
    {
        return array(
            array(+3, '3', 'Positive 1'),
            array('122', '122', '122'),
            array('0', '0', 'zero'),
            array(-1231, '-1231', 'negative 1231'),

        );
    }

    /**
     * @dataProvider testxsShortTestInvalidDataProvider
     * @param mixed $duration
     * @param mixed $message
     */
    public function testxsShortTestInvalid($duration, $expected, $message)
    {
        $d = new xsShort($duration);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsShortTestInvalidDataProvider()
    {
        return array(
            array('32770', '', 'number is too large'),
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
