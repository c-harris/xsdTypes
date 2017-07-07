<?php
namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsNOTATIONTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsNOTATIONTestValidDataProvider
     *
     * @param mixed $duration
     * @param mixed $message
     */
    public function testxsNOTATIONTestValid($duration, $message)
    {
        $d = $this->getMockForAbstractClass("xsNOTATION", array($duration));
        $e = (string)$d;
        $this->assertEquals($duration, $e, $message);
    }

    public function testxsNOTATIONTestValidDataProvider()
    {
        return array(
            array('pre:myElement', 'valid assuming the prefix "pre" is mapped to a namespace in scope'),
            array('myElement', 'prefix and colon are optional'),
        );
    }

    /**
     * @dataProvider testxsNOTATIONTestInvalidDataProvider
     *
     * @param mixed $duration
     * @param mixed $message
     */
    public function testxsNOTATIONTestInvalid($duration, $message)
    {
        $d = $this->getMockForAbstractClass("xsNOTATION", array($duration));
        $e = (string)$d;
        $this->assertEquals('', $e, $message);
    }

    public function testxsNOTATIONTestInvalidDataProvider()
    {
        return array(
            array(':myElement', '	a QName must not start with a colon'),
            array('pre:3rdElement', 'the local part must not start with a number; it must be a valid NCName'),
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
