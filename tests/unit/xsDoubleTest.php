<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsDoubleTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider testxsDoubleValidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsDoubleValid($input, $message)
    {
        try {
            $d = new xsDouble($input);
            $e = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsDoubleValidDataProvider()
    {
        return array(
            array('-3E2', ''),
            array('4268.22752E11', ''),
            array('+24.3e-3', ''),
            array('12', ''),
            array('+3.5', 'any value valid for decimal is also valid for xsd:double'),
            array('-INF', 'negative infinity'),
            array('-0', '0'),
            array('NaN', 'Not a Number'),

        );
    }

    /**
     * @dataProvider testxsDoubleInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsDoubleInvalid($input, $message)
    {
        try {
            $d = new xsBase64Binary($input);
            $s = (string)$d;
            $this->fail($message);
        } catch (\Exception $e) {
        }
        $this->assertEquals('', $s, $message);
    }

    public function testxsDoubleInvalidDataProvider()
    {
        return array(
            array('-3E2.4', 'the exponent must be an integer'),
            array('12E', 'an exponent must be specified if "E" is present'),
            array('NAN', 'values are case-sensitive, must be capitalized correctly'),
            array('', 'an empty value is not valid, unless xsi:nil is used'),
        );
    }
}
