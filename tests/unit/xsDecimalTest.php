<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsDecimalTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsDecimalValidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsDecimalValid($input, $expected, $message)
    {
        try {
            $d = new xsDecimal($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
        $this->assertEquals($expected, $s, $message);

    }

    public function testxsDecimalValidDataProvider()
    {
        return array(
            array(3.0, '3.0', ''),
            array(-3.0, '-3.0', 'a negative sign is permitted'),
            array(+3.5, '3.5', 'a positive sign is permitted'),
            array(3, '3', 'a decimal point is not required'),
            array(.3, '0.3', 'the value can start with a decimal point'),
            array(0, '0', ''),
            array(-.3, '-0.3', ''),
            array(0003.0, '3', 'leading zeros are permitted'),
            array(3.0000, '3', 'trailing zeros are permitted'),


        );
    }

    /**
     * @dataProvider testxsDecimalInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsDecimalInvalid($input, $expected, $message)
    {
        $d = new xsDecimal($input);
        $s = (string)$d;
        $this->fail($message);
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsDecimalInvalidDataProvider()
    {
        return array(
            array('3,5', '', 'commas are not permitted; the decimal separator must be a period'),
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
