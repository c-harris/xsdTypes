<?php
namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsYearMonthDurationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testXsYearMonthDurationValidDataProvider
     * @param mixed $duration
     * @param mixed $message
     */
    public function testXsYearMonthDurationValid($duration, $message)
    {
        $d = new xsYearMonthDuration($duration);
        $e = (string)$d;
        $this->assertEquals($duration, $e, $message);
    }

    public function testXsYearMonthDurationValidDataProvider()
    {
        return array(
            array('P2Y6M', '2 years, 6 months'),
            array('P20M', '20 months (the number of months can be more than 12)'),
            array('P0Y20M', '20 months (0 is permitted as a number, but is not required)'),
            array('P0Y', '0 years'),
            array('-P60Y', 'minus 60 years'),
        );
    }

    /**
     * @dataProvider testXsYearMonthDurationInvalidDataProvider
     * @param mixed $duration
     * @param mixed $message
     */
    public function testXsYearMonthDurationInvalid($duration, $message)
    {
        $d = new xsYearMonthDuration($duration);
        $e = (string)$d;
        $this->assertEquals('', $e, $message);
    }

    public function testXsYearMonthDurationInvalidDataProvider()
    {
        return array(
            array('P2Y6M5DT12H35M30S', 'components other than years or months are not allowed'),
            array('P-20M', 'the minus sign must appear first'),
            array('P20MT', '"T" must not be present'),
            array('P1YM', 'no value is specified for months, so "M" must not be present'),
            array('-P15.5Y', 'numbers cannot be expressed as a decimal'),
            array('1Y2M', '"P" must always be present'),
            array('P2M1Y', 'years must appear before months'),
            array('P', 'at least one number and designator are required'),
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
