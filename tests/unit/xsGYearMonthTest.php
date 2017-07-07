<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsGYearMonthTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsGYearMonthValidDataProvider
     */
    public function testxsGYearMonthValid($input, $message)
    {
        try {
            $d = new xsGYearMonth($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsGYearMonthValidDataProvider()
    {
        return array(
            array('2004-04', 'April 2004'),
            array('2004-04-05:00', 'April 2004, US Eastern Standard Time'),
        );
    }

    /**
     * @dataProvider testxsGYearMonthInvalidDataProvider
     */
    public function testxsGYearMonthInvalid($input, $message)
    {
        try {
            $d = new xsGYearMonth($input);
            $s = (string)$d;
            $this->fail($message);
        } catch (\Exception $e) {
        }
        $this->assertEquals('', $s, $message);
    }

    public function testxsGYearMonthInvalidDataProvider()
    {
        return array(
            array('99-04', 'the century must not be truncated'),
            array('2004', 'the month is required'),
            array('2004-4', 'the month must be two digits'),
            array('2004-13', 'the month must be a valid month'),
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
