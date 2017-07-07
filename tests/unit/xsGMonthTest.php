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
    public function testxsGMonthValid($input, $message)
    {
        try {
            $d = new xsGMonth($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsGMonthValidDataProvider()
    {
        return array(
            array('--04', 'April'),
            array('--04-05:00', 'April, US Eastern Standard Time'),

        );
    }

    /**
     * @dataProvider testxsGMonthInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     */
    public function testxsGMonthInvalid($input, $message)
    {
            $d = new xsGMonth($input);
            $s = (string)$d;
        $this->assertEquals('', $s, $message);
    }

    public function testxsGMonthInvalidDataProvider()
    {
        return array(
            array('2004-04', 'the year must not be specified; use gYearMonth instead'),
            array('04', 'the leading hyphens are required'),
            array('--4', 'the month must be 2 digits'),
            array('--13	', 'the month must be a valid month'),
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
