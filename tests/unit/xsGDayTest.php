<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsGDayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsGDayValidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsGDayValid($input, $message)
    {
        try {
            $d = new xsGDay($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsGDayValidDataProvider()
    {
        return array(
            array('---02', 'the 2nd of the month'),
        );
    }

    /**
     * @dataProvider testxsGDayInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsGDayInvalid($input, $message)
    {
            $d = new xsGDay($input);
            $s = (string)$d;
        $this->assertEquals('', $s, $message);
    }

    public function testxsGDayInvalidDataProvider()
    {
        return array(
            array('02', 'the leading hyphens are required'),
            array('---2', 'the day must be 2 digits'),
            array('---32', 'the day must be a valid day of the month; no month has 32 days'),
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
