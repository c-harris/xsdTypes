<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsStringTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsStringTestValidDataProvider
     * @param mixed $duration
     * @param mixed $message
     */
    public function testxsStringTestValid($duration, $expected, $message)
    {
        $d = new xsString($duration);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsStringTestValidDataProvider()
    {
        return array(
            array('This is a string!', 'This is a string!', 'normal string'),
            array('Édition française.', 'Édition française.', 'unicodeString'),
            array('12.5	', '12.5	', 'number as string'),
            array('', '', 'an empty string is valid'),
            array('PB&amp;J', 'PB&amp;J', 'when parsed, it will become "PB&J"'),
            array('   Separated by 3 spaces.', '   Separated by 3 spaces.', ''),
            array('This
is on two lines.', 'This
is on two lines.', ''),
        );
    }

    /**
     * @dataProvider testxsStringTestInvalidDataProvider
     * @param mixed $duration
     * @param mixed $message
     */
    public function testxsStringTestInvalid($duration, $expected, $message)
    {
        $d = new xsString($duration);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsStringTestInvalidDataProvider()
    {
        return array(
            array('AT&T', ',', 'ampersand must be escaped'),
            array('3 < 4', '', 'the "less than" symbol must be escaped'),
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
