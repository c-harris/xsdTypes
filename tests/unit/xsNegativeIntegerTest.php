<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsNegativeIntegerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsNegativeIntegerValidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsNegativeIntegerValid($input, $message)
    {
        try {
            $d = new xsNegativeInteger($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsNegativeIntegerValidDataProvider()
    {
        return array(
            array('-3', ''),
            array('-00122', 'leading zeros are permitted'),
        );
    }

    /**
     * @dataProvider testxsNegativeIntegerInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsNegativeIntegerInvalid($input, $message)
    {
        $d = new xsNegativeInteger($input);
        $s = (string)$d;
        $this->assertEquals('', $s, $message);
    }

    public function testxsNegativeIntegerInvalidDataProvider()
    {
        return array(
            array('0', '0 is not considered negative'),
            array('122', 'value cannot be positive'),
            array('+3', 'value cannot be positive'),
            array('3.0', 'value must not contain a decimal point'),
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
