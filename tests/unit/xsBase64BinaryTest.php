<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsBase64BinaryTest extends \PHPUnit_Framework_TestCase
{
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

    /**
     * @dataProvider testxsBase64BinaryValidDataProvider
     * @param mixed $duration
     * @param mixed $message
     */
    public function testxsBase64BinaryValid($duration, $message)
    {
        $d = new xsBase64Binary($duration);
        $e = (string)$d;
        $this->assertEquals($duration, $e, $message);
    }

    public function testxsBase64BinaryValidDataProvider()
    {
        return array(
            array('0FB8', 'Uppercase base64'),
            array('0fb8', 'Lowercase base64'),
            array('0 FB8 0F+9', 'whitespace is allowed anywhere in the value'),
            array('0F+40A==', 'equals signs are used for padding'),
            array('', 'an empty value is valid'),
        );
    }

    /**
     * @dataProvider testxsBase64BinaryInvalidDataProvider
     * @param mixed $duration
     * @param mixed $message
     */
    public function testxsBase64BinaryInvalid($duration, $message)
    {
        try {
            $d = new xsBase64Binary($duration);
            $e = (string)$d;
            $this->fail($message);
        } catch (\Exception $e) {
        }
        $this->assertEquals('', $e, $message);
    }

    public function testxsBase64BinaryInvalidDataProvider()
    {
        return array(
            array('FB8', 'an odd number of characters is not valid; characters appear in groups of four'),
            array('==0F', 'equals signs may only appear at the end'),
        );
    }
}
