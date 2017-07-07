<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsFloatTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsFloatValidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsFloatValid($input, $message)
    {
        try {
            $d = new xsFloat($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsFloatValidDataProvider()
    {
        return array(
            array('-3E2', 'any value valid for decimal is also valid for float'),
            array('4268.22752E11', 'any value valid for decimal is also valid for float'),
            array('+24.3e-3	', 'any value valid for decimal is also valid for float'),
            array('12', 'any value valid for decimal is also valid for float'),
            array('+3.5	', 'any value valid for decimal is also valid for float'),
            array('-INF	', 'negative infinity'),
            array('-0	', 'Zero'),
            array('NaN', 'Not a Number'),

        );
    }

    /**
     * @dataProvider testxsFloatInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsFloatInvalid($input, $message)
    {
            $d = new xsFloat($input);
            $s = (string)$d;
        $this->assertEquals('NaN', $s, $message);
    }

    public function testxsFloatInvalidDataProvider()
    {
        return array(
            array('-3E2.4', 'the exponent must be an integer'),
            array('12E', 'an exponent must be specified if "E" is present'),
            array('NAN', 'values are case-sensitive, must be capitalized correctly'),
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
