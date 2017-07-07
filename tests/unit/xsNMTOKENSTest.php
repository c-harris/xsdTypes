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
     */
    public function testxsNMTOKENSValid($input, $message)
    {
        try {
            $d = new xsNMTOKENS($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsNMTOKENSValidDataProvider()
    {
        return array(
            array('ABCD 123', ''),
            array('ABCD ', 'one-item list'),
        );
    }

    /**
     * @dataProvider testxsNMTOKENSInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsNMTOKENSInvalid($input, $message)
    {
        $d = new xsNMTOKENS($input);
        $s = (string)$d;
        $this->assertEquals('', $s, $message);
    }

    public function testxsNMTOKENSInvalidDataProvider()
    {
        return array(
            array('__', 'double underscore should be invalid'),
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
