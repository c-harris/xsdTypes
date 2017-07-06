<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsDecimalTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider testxsDecimalValidDataProvider
     */
    public function testxsDecimalValid($input, $message)
    {
        try {
            $d = new xsDecimal($input);
            $e = (string)$d;
        } catch (\Exception $e) {
    $this->fail($message . ' with Exception ' . $e->getMessage());
}
    }

    public function testxsDecimalValidDataProvider()
{
        return array(
            array(3.0, ''),
            array(-3.0, 'a negative sign is permitted'),
            array(+3.5, 'a positive sign is permitted'),
            array(3, 'a decimal point is not required'),
            array(.3, 'the value can start with a decimal point'),
            array(0, ''),
            array(-.3, ''),
            array(0003.0, 'leading zeros are permitted'),
            array(3.0000, 'trailing zeros are permitted'),


        );
    }

    /**
     * @dataProvider testxsDecimalInvalidDataProvider
     */
    public function testxsDecimalInvalid($input, $message)
{
        try {
            $d = new xsDecimal($input);
            $e = (string)$d;
            $this->fail($message);
        } catch (\Exception $e) {
        }
        $this->assertEquals('', $e, $message);
    }

    public function testxsDecimalInvalidDataProvider()
{
        return array(
            array('3,5', 'commas are not permitted; the decimal separator must be a period'),
            array('', 'an empty value is not valid, unless xsi:nil is used'),
        );
    }
}
