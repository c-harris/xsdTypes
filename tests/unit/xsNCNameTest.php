<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsNCNameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsNCNameValidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsNCNameValid($input, $message)
    {
        try {
            $d = new xsNCName($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsNCNameValidDataProvider()
    {
        return array(
            array('myElement', ''),
            array('_my.Element', ''),
            array('my-element', ''),
        );
    }

    /**
     * @dataProvider testxsNCNameInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsNCNameInvalid($input, $message)
    {
        $d = new xsNCName($input);
        $s = (string)$d;
        $this->assertEquals('', $s, $message);
    }

    public function testxsNCNameInvalidDataProvider()
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
