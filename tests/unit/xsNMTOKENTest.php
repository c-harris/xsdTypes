<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsNMTOKENTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsNMTOKENValidDataProvider
     */
    public function testxsNMTOKENValid($input, $message)
    {
        try {
            $d = new xsNMTOKEN($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsNMTOKENValidDataProvider()
    {
        return array(
            array('ABCD', ''),
            array('123_456', ''),
            array('  starts_with_a_space', 'when parsed, leading spaces will be removed'),
        );
    }

    /**
     * @dataProvider testxsNMTOKENInvalidDataProvider
     */
    public function testxsNMTOKENInvalid($input, $message)
    {
        try {
            $d = new xsNMTOKEN($input);
            $s = (string)$d;
            $this->fail($message);
        } catch (\Exception $e) {
        }
        $this->assertEquals('', $s, $message);
    }

    public function testxsNMTOKENInvalidDataProvider()
    {
        return array(
            array('contains a space', 'value must not contain a space'),
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
