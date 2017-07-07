<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsLongTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsLongValidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsLongValid($input, $message)
    {
        try {
            $d = new xsLong($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsLongValidDataProvider()
    {
        return array(
            array('+3', ''),
            array('122', ''),
            array('0', ''),
            array('-1231235555', ''),
        );
    }

    /**
     * @dataProvider testxsLongInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsLongInvalid($input, $message)
    {
        try {
            $d = new xsLong($input);
            $s = (string)$d;
            $this->fail($message);
        } catch (\Exception $e) {
        }
        $this->assertEquals('', $s, $message);
    }

    public function testxsLongInvalidDataProvider()
    {
        return array(
            array('9223372036854775810', 'number is too large'),
            array('3.0', 'value must not contain a decimal point'),
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
