<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsStringTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider testxsStringTestValidDataProvider
     */
    public function testxsStringTestValid($duration, $message) {
        $d = new xsUnsignedShort($duration);
        $e = (string)$d;
        $this->assertEquals($duration,$e,$message);

    }

    public function testxsStringTestValidDataProvider()
    {
        return array(
            array('This is a string!', 'normal string'),
            array('Édition française.', 'unicodeString'),
            array('12.5	', 'number as string'),
            array('', 'an empty string is valid'),
            array('PB&amp;J', 'when parsed, it will become "PB&J"'),
            array('   Separated by 3 spaces.', ''),
            array('This
is on two lines.', ''),
        );
    }
    /**
     * @dataProvider testxsStringTestInvalidDataProvider
     */
    public function testxsStringTestInvalid($duration, $message) {
        try {
            $d = new xsUnsignedShort($duration);
            $e = (string)$d;
            $this->fail($message);
        }catch(\Exception $e){}
    }

    public function testxsStringTestInvalidDataProvider() {
        return array(
            array('AT&T', 'ampersand must be escaped'),
            array('3 < 4', 'the "less than" symbol must be escaped'),
        );
    }
}
