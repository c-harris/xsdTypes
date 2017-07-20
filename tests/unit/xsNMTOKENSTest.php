<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsNMTOKENSTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsNMTOKENSValidDataProvider
     * @param mixed $input
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsNMTOKENSValid($input, $expected, $message)
    {
        try {
            $d = new xsNMTOKENS($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsNMTOKENSValidDataProvider()
    {
        return array(
            array('ABCD 123', 'ABCD 123', ''),
            array('ABCD ', 'ABCD ', 'one-item list'),
        );
    }

    /**
     * @dataProvider testxsNMTOKENSInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsNMTOKENSInvalid($input, $expected, $message)
    {
        $d = new xsNMTOKENS($input);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsNMTOKENSInvalidDataProvider()
    {
        return array(
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
