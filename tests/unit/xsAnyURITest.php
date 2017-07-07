<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsAnyURITest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsAnyURIValidDataProvider
     * @param mixed $input
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsAnyURIValid($input, $expected, $message)
    {
        try {
            $d = new xsAnyURI($input);
            $r = $d->__toString();
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
        $this->assertEquals($expected, $r, $message);
    }

    public function testxsAnyURIValidDataProvider()
    {
        return array(
            array('http://datypic.com', 'http://datypic.com', 'absolute URI (also a URL)'),
            array('mailto:info@datypic.com', 'mailto:info@datypic.com', 'absolute URI'),
            array('../%C3%A9dition.html', '../%C3%A9dition.html', 'relative URI containing escaped non-ASCII character'),
            array('../édition.html', '../édition.html', 'relative URI containing unescaped non-ASCII character'),
            array('http://datypic.com/prod.html#shirt', 'http://datypic.com/prod.html#shirt', 'URI with fragment identifier'),
            array('../prod.html#shirt', 'relative URI with fragment identifier'),
            array('urn:example:org', 'urn:example:org', 'URN'),
            array('', '', 'an empty value is allowed'),
        );
    }

    /**
     * @dataProvider testxsAnyURIInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsAnyURIInvalid($input, $expected, $message)
    {
        $d = new xsAnyURI($input);
        $s = $d->__toString();
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsAnyURIInvalidDataProvider()
    {
        return array(
            array('http://datypic.com#frag1#frag2', '', 'too many # characters'),
            array('http://datypic.com#f% rag', '', ' character followed by something other than two hexadecimal digits'),
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
