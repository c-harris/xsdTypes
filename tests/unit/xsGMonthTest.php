<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsGMonthTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsGMonthValidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsGMonthValid($input, $expected, $message)
    {
        try {
            $d = new xsGMonth($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsGMonthValidDataProvider()
    {
        return array(
            array('--04', '--04', 'April'),
            array('--04-05:00', '--04-05:00', 'April, US Eastern Standard Time'),

        );
    }

    /**
     * @dataProvider testxsGMonthInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsGMonthInvalid($input, $expected, $message)
    {
        $d = new xsGMonth($input);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsGMonthInvalidDataProvider()
    {
        return array(
            array('2004-04', '', 'the year must not be specified; use gYearMonth instead'),
            array('04', '', 'the leading hyphens are required'),
            array('--4', '', 'the month must be 2 digits'),
            array('--13	', '', 'the month must be a valid month'),
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
