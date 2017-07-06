<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsAnyURITest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider testxsAnyURIValidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsAnyURIValid($input, $message)
    {
        try {
            $d = new xsAnyURI($input);
            $e = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsAnyURIValidDataProvider()
    {
        return array(
            array('http://datypic.com', 'absolute URI (also a URL)'),
            array('mailto:info@datypic.com', 'absolute URI'),
            array('../%C3%A9dition.html', 'relative URI containing escaped non-ASCII character'),
            array('../édition.html', 'relative URI containing unescaped non-ASCII character'),
            array('http://datypic.com/prod.html#shirt', 'URI with fragment identifier'),
            array('../prod.html#shirt', 'relative URI with fragment identifier'),
            array('urn:example:org', 'URN'),
            array('', 'an empty value is allowed'),
        );
    }

    /**
     * @dataProvider testxsAnyURIInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsAnyURIInvalid($input, $message)
    {
        try {
            $d = new xsBase64Binary($input);
            $e = (string)$d;
            $this->fail($message);
        } catch (\Exception $e) {
        }
        $this->assertEquals('', $e, $message);
    }

    public function testxsAnyURIInvalidDataProvider()
    {
        return array(
            array('http://datypic.com#frag1#frag2', 'too many # characters'),
            array('http://datypic.com#f% rag', ' character followed by something other than two hexadecimal digits'),
        );
    }
}
