<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsBooleanTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider testxsBooleanValidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsBooleanValid($input, $message)
    {
        try {
            $d = new xsBoolean($input);
            $e = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsBooleanValidDataProvider()
    {
        return array(
            array(true, 'bool true'),
            array(false, 'bool false'),
            array(0, 'int false'),
            array(1, 'int true'),
            array('0', 'string numeric false'),
            array('1', 'string numeric true'),
            array('false', 'string false'),
            array('true', 'string true'),
        );
    }

    /**
     * @dataProvider testxsBooleanInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsBooleanInvalid($input, $message)
    {
        try {
            $d = new xsBase64Binary($input);
            $e = (string)$d;
            $this->fail($message);
        } catch (\Exception $e) {
        }
        $this->assertEquals('', $e, $message);
    }

    public function testxsBooleanInvalidDataProvider()
    {
        return array(
            array('T', 'the word "true" must be spelled out'),
            array('', 'an empty value is not valid, unless xsi:nil is used'),
        );
    }
}
