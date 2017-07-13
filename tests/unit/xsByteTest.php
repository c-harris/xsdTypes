<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsByteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsByteValidDataProvider
     * @param mixed $input
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsByteValid($input, $expected, $message)
    {
        try {
            $d = new xsByte($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsByteValidDataProvider()
    {
        return array(
            array(+3, '3', 'positive 3'),
            array(122, '122', 'postive 122'),
            array(0, '0', 'Zero'),
            array(-123, '-123', 'Negative 123'),
        );
    }

    /**
     * @dataProvider testxsByteInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsByteInvalid($input, $expected, $message)
    {
        $d = new xsByte($input);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsByteInvalidDataProvider()
    {
        return array(
            array(130, '', 'number is too large'),
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
