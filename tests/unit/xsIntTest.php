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
    public function testxsIntValid($input, $message)
    {
        try {
            $d = new xsInt($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsIntValidDataProvider()
    {
        return array(
            array('+3', ''),
            array('122', ''),
            array('0', ''),
            array('-12312', ''),
        );
    }

    /**
     * @dataProvider testxsIntInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsIntInvalid($input, $message)
    {
            $d = new xsInt($input);
            $s = (string)$d;
        $this->assertEquals('', $s, $message);
    }

    public function testxsIntInvalidDataProvider()
    {
        return array(
            array('2147483650', 'number is too large'),
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
