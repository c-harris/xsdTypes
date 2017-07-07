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
    public function testxsIDValid($input, $message)
    {
        try {
            $d = new xsID($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsIDValidDataProvider()
    {
        return array(
            array('myElement', ''),
            array('_my.Element', ''),
            array('my-element', ''),
        );
    }

    /**
     * @dataProvider testxsIDInvalidDataProvider
     *
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsIDInvalid($input, $message)
    {
            $d = new xsID($input);
            $s = (string)$d;
        $this->assertEquals('', $s, $message);
    }

    public function testxsIDInvalidDataProvider()
    {
        return array(
            array('pre:myElement', 'an NCName must not contain a colon'),
            array('-myelement', 'an NCName must not start with a hyphen'),
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
