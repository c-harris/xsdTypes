<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsByteTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider testxsByteValidDataProvider
     */
    public function testxsByteValid($input, $message)
    {
        try {
            $d = new xsByte($input);
            $e = (string)$d;
        } catch (\Exception $e) {
    $this->fail($message . ' with Exception ' . $e->getMessage());
}
    }

    public function testxsByteValidDataProvider()
{
        return array(
            array(+3, 'positive 3'),
            array(122, 'postive 122'),
            array(0, 'Zero'),
            array(-123, 'Negative 123'),
        );
    }

    /**
     * @dataProvider testxsByteInvalidDataProvider
     */
    public function testxsByteInvalid($input, $message)
{
        try {
            $d = new xsByte($input);
            $s = (string)$d;
            $this->fail($message);
        } catch (\Exception $e) {
        }
        $this->assertEquals('', $s, $message);
    }

    public function testxsByteInvalidDataProvider()
{
        return array(
            array(130, 'number is too large'),
            array('', 'an empty value is not valid, unless xsi:nil is used'),
        );
    }
}
