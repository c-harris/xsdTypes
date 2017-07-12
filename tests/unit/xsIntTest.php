<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsIntTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsIntValidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsIntValid($input, $expected, $message)
    {
        try {
            $d = new xsInt($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
        $this->assertEquals($expected, $s, $message);

    }

    public function testxsIntValidDataProvider()
    {
        return array(
            array('+3', '3', ''),
            array('122', '122', ''),
            array('0', '0', ''),
            array('-12312', '-12312', ''),
        );
    }

    /**
     * @dataProvider testxsIntInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsIntInvalid($input, $expected, $message)
    {
        $d = new xsInt($input);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsIntInvalidDataProvider()
    {
        return array(
            array('2147483650', '', 'number is too large'),
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
