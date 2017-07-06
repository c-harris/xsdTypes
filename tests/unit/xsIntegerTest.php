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
     */
    public function testxsIntegerValid($input, $message)
    {
        try {
            $d = new xsInteger($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsIntegerValidDataProvider()
    {
        return array(
            array('122', ''),
            array('00122', 'leading zeros are permitted'),
            array('0', ''),
            array('+3', ''),
            array('-1', ''),
        );
    }

    /**
     * @dataProvider testxsIntegerInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsIntegerInvalid($input, $message)
    {
        try {
            $d = new xsInteger($input);
            $s = (string)$d;
            $this->fail($message);
        } catch (\Exception $e) {
        }
        $this->assertEquals('', $s, $message);
    }

    public function testxsIntegerInvalidDataProvider()
    {
        return array(
            array('3.', 'an integer must not contain a decimal point'),
            array('3.0', 'an integer must not contain a decimal point'),
            array('', 'an empty value is not valid, unless xsi:nil is used'),
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
