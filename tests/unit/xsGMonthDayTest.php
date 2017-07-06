<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsGMonthDayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsGMonthDayValidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsGMonthDayValid($input, $message)
    {
        try {
            $d = new xsGMonthDay($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsGMonthDayValidDataProvider()
    {
        return array(
            array('--04-12', 'April 12'),
            array('--04-12Z', 'April 12, Coordinated Universal Time (UTC)'),
        );
    }

    /**
     * @dataProvider testxsGMonthDayInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsGMonthDayInvalid($input, $message)
    {
        try {
            $d = new xsGMonthDay($input);
            $s = (string)$d;
            $this->fail($message);
        } catch (\Exception $e) {
        }
        $this->assertEquals('', $s, $message);
    }

    public function testxsGMonthDayInvalidDataProvider()
    {
        return array(
            array('04-12', 'the leading hyphens are required'),
            array('--04-31', 'it must be a valid day of the year (April has 30 days)'),
            array('--4-6', 'the month and day must be 2 digits each'),
            array('', 'an empty value is not valid, unless xsi:nil is used'),
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
