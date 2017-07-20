<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsNMTOKENTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsNMTOKENValidDataProvider
     * @param mixed $input
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsNMTOKENValid($input, $expected, $message)
    {
        try {
            $d = new xsNMTOKEN($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsNMTOKENValidDataProvider()
    {
        return array(
            array('ABCD', 'ABCD', ''),
            array('123_456', '123_456', ''),
            array('  starts_with_a_space', 'starts_with_a_space', 'when parsed, leading spaces will be removed'),
        );
    }

    /**
     * @dataProvider testxsNMTOKENInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsNMTOKENInvalid($input, $expected, $message)
    {
        $d = new xsNMTOKEN($input);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsNMTOKENInvalidDataProvider()
    {
        return array(
            array('contains a space', '', 'value must not contain a space'),
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
