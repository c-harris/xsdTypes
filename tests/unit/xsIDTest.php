<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsIDTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsIDValidDataProvider
     *
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsIDValid($input, $expected, $message)
    {
        try {
            $d = new xsID($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
        $this->assertEquals($expected, $s, $message);

    }

    public function testxsIDValidDataProvider()
    {
        return array(
            array('myElement', 'myElement', ''),
            array('_my.Element', '_my.Element', ''),
            array('my-element', 'my-element', ''),
        );
    }

    /**
     * @dataProvider testxsIDInvalidDataProvider
     *
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsIDInvalid($input, $expected, $message)
    {
        $d = new xsID($input);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsIDInvalidDataProvider()
    {
        return array(
            array('pre:myElement', '', 'an NCName must not contain a colon'),
            array('-myelement', '', 'an NCName must not start with a hyphen'),
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
