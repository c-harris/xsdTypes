<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsNameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsNameValidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsNameValid($input, $message)
    {
        try {
            $d = new xsName($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsNameValidDataProvider()
    {
        return array(
            array('myElement', ''),
            array('_my.Element', ''),
            array('my-element', ''),
            array('pre:myelement3', 'this is recommended only if pre is a namespace prefix; otherwise, colons ' .
                'should not be used'),
        );
    }

    /**
     * @dataProvider testxsNameInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsNameInvalid($input, $message)
    {
        try {
            $d = new xsName($input);
            $s = (string)$d;
            $this->fail($message);
        } catch (\Exception $e) {
        }
        $this->assertEquals('', $s, $message);
    }

    public function testxsNameInvalidDataProvider()
    {
        return array(
            array('-myelement', 'a Name must not start with a hyphen'),
            array('3rdElement', 'a Name must not start with a number'),
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
