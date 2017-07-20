<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsNormalizedStringTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsNormalizedStringTestValidDataProvider
     * @param mixed $duration
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsNormalizedStringTestValid($duration, $expected, $message)
    {
        $d = new xsNormalizedString($duration);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsNormalizedStringTestValidDataProvider()
    {
        return array(
            array('This is a string!', 'This is a string!', 'normal string'),
            array('Édition française.', 'Édition française.', 'unicodeString'),
            array('12.5', '12.5', 'number as string'),
            array('', '', 'an empty string is valid'),
            array('PB&amp;J', 'PB&amp;J', 'when parsed, it will become "PB&J"'),
            array('   Separated by 3 spaces.', '   Separated by 3 spaces.', 'when parsed, it will become "Separated by 3 spaces."'),
            array('This
is on two lines.', 'This  is on two lines.', 'when parsed, the line break will be replaced with a space'),
        );
    }

    /**
     * @dataProvider testxsNormalizedStringTestInvalidDataProvider
     * @param mixed $duration
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsNormalizedStringTestInvalid($duration, $expected, $message)
    {
        $d = new xsNormalizedString($duration);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsNormalizedStringTestInvalidDataProvider()
    {
        // Invalid characters are being kicked to JMS
        return array(
            array('AT&T', 'AT&T', 'ampersand must be escaped'),
            array('3 < 4', '3 < 4', 'the "less than" symbol must be escaped'),
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
