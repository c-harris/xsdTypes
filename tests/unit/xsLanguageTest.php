<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsLanguageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsLanguageValidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsLanguageValid($input, $message)
    {
        try {
            $d = new xsLanguage($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsLanguageValidDataProvider()
    {
        return array(
            array('en', 'English'),
            array('en-GB', 'UK English'),
            array('en-US', 'US English'),
            array('fr', 'French'),
            array('de', 'German'),
            array('es', 'Spanish'),
            array('it', 'Italian'),
            array('nl', 'Dutch'),
            array('zh', 'Chinese'),
            array('ja', 'Japanese'),
            array('ko', 'Korean'),
            array('i-navajo', 'IANA-registered language'),
            array('x-Newspeak', 'private, unregistered language'),
            array('any-value-with-short-parts', 'although a schema processor will consider this value valid, ' .
                'it does not follow RFC 3066 guidelines'),
        );
    }

    /**
     * @dataProvider testxsLanguageInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsLanguageInvalid($input, $message)
    {
        $d = new xsLanguage($input);
        $s = (string)$d;
        $this->assertEquals('', $s, $message);
    }

    public function testxsLanguageInvalidDataProvider()
    {
        return array(
            array('longerThan8', 'parts may not exceed 8 characters in length'),
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
