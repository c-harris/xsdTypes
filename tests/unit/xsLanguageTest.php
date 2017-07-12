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
     * @param mixed $expected
     */
    public function testxsLanguageValid($input, $expected, $message)
    {
        try {
            $d = new xsLanguage($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsLanguageValidDataProvider()
    {
        return array(
            array('en', 'en', 'English'),
            array('en-GB', 'en-GB', 'UK English'),
            array('en-US', 'en-US', 'US English'),
            array('fr', 'fr', 'French'),
            array('de', 'de', 'German'),
            array('es', 'es', 'Spanish'),
            array('it', 'it', 'Italian'),
            array('nl', 'nl', 'Dutch'),
            array('zh', 'zh', 'Chinese'),
            array('ja', 'ja', 'Japanese'),
            array('ko', 'ko', 'Korean'),
            array('i-navajo', 'i-navajo', 'IANA-registered language'),
            array('x-Newspeak', 'x-Newspeak', 'private, unregistered language'),
            array('any-value-with-short-parts', 'any-value-with-short-parts', 'although a schema processor will consider this value valid, ' .
                'it does not follow RFC 3066 guidelines'),
        );
    }

    /**
     * @dataProvider testxsLanguageInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsLanguageInvalid($input, $expected, $message)
    {
        $d = new xsLanguage($input);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsLanguageInvalidDataProvider()
    {
        return array(
            array('longerThan8', '', 'parts may not exceed 8 characters in length'),
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
