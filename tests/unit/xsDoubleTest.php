<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsDoubleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsDoubleValidDataProvider
     * @param mixed $input
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsDoubleValid($input, $expected, $message)
    {
        try {
            $d = new xsDouble($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsDoubleValidDataProvider()
    {
        return array(
            array('-3E2', '-3E2', ''),
            array('4268.22752E11', '4268.22752E11', ''),
            array('+24.3e-3', '+24.3e-3', ''),
            array('12', '12', ''),
            array('+3.5', '+3.5', 'any value valid for decimal is also valid for xsd:double'),
            array('-INF', '-INF', 'negative infinity'),
            array('-0', '0', '0'),
            array('NaN', 'NaN', 'Not a Number'),

        );
    }

    /**
     * @dataProvider testxsDoubleInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsDoubleInvalid($input, $expected, $message)
    {
        $d = new xsBase64Binary($input);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsDoubleInvalidDataProvider()
    {
        return array(
            array('-3E2.4', 'NaN', 'the exponent must be an integer'),
            array('12E', 'NaN', 'an exponent must be specified if "E" is present'),
            array('NAN', 'NaN', 'values are case-sensitive, must be capitalized correctly'),
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
