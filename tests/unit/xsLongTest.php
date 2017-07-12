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
    public function testxsLongValid($input, $expected, $message)
    {
        try {
            $d = new xsLong($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
        $this->assertEquals($expected, $s, $message);

    }

    public function testxsLongValidDataProvider()
    {
        return array(
            array('+3', '3', ''),
            array('122', '122', ''),
            array('0', '0', ''),
            array('-1231235555', '-1231235555', ''),
        );
    }

    /**
     * @dataProvider testxsLongInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsLongInvalid($input, $expected, $message)
    {
        $d = new xsLong($input);
        $s = (string)$d;

        $this->assertEquals($expected, $s, $message);
    }

    public function testxsLongInvalidDataProvider()
    {
        return array(
            array('9223372036854775810', '', 'number is too large'),
            array('3.0', '3', 'value must not contain a decimal point'),);
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
