<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsShortTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider testxsShortTestValidDataProvider
     */
    public function testxsShortTestValid($duration, $message) {
        $d = new xsShort($duration);
        $e = (string)$d;
        $this->assertEquals($duration,$e,$message);

    }

    public function testxsShortTestValidDataProvider() {
        return array(
            array(+3, 'Positive 1'),
            array('122', '122'),
            array('0', 'zero'),
            array(-1231, 'negative 1231'),

        );
    }
    /**
     * @dataProvider testxsShortTestInvalidDataProvider
     */
    public function testxsShortTestInvalid($duration, $message) {
        try {
            $d = new xsShort($duration);
            $e = (string)$d;
            $this->fail($message);
        }catch(\Exception $e){}
    }

    public function testxsShortTestInvalidDataProvider() {
        return array(
            array('32770', 'number is too large'),
            array('3.0', 'value must not contain a decimal point'),
            array('', '	an empty value is not valid, unless xsi:nil is used'),
        );
    }
}
