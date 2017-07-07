<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsHexBinaryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsHexBinaryValidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsHexBinaryValid($input, $message)
    {
        try {
            $d = new xsHexBinary($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsHexBinaryValidDataProvider()
    {
        return array(
            array('0FB8', ''),
            array('0fb8', 'equivalent to 0FB8'),
            array('', 'an empty value is valid'),

        );
    }

    /**
     * @dataProvider testxsHexBinaryInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsHexBinaryInvalid($input, $message)
    {
        try {
            $d = new xsHexBinary($input);
            $s = (string)$d;
            $this->fail($message);
        } catch (\Exception $e) {
        }
        $this->assertEquals('', $s, $message);
    }

    public function testxsHexBinaryInvalidDataProvider()
    {
        return array(
            array('FB8', 'an odd number of characters is not valid; characters must appear in pairs'),
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
