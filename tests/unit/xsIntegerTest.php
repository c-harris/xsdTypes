<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsIntegerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsIntegerValidDataProvider
     * @param mixed $input
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsIntegerValid($input, $expected, $message)
    {
        try {
            $d = new xsInteger($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsIntegerValidDataProvider()
    {
        return array(
            array('122', '122', ''),
            array('00122', '122', 'leading zeros are permitted'),
            array('0', '0', ''),
            array('+3', '3', ''),
            array('-1', '-1', ''),
        );
    }

    /**
     * @dataProvider testxsIntegerInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsIntegerInvalid($input, $expected, $message)
    {
        $d = new xsInteger($input);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsIntegerInvalidDataProvider()
    {
        return array(
            array('3.', '3', 'an integer must not contain a decimal point'),
            array('3.0', '3', 'an integer must not contain a decimal point'),
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
