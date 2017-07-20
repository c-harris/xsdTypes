<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsDurationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsDurationValidDataProvider
     * @param mixed $input
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsDurationValid($input, $expected, $message)
    {
        try {
            $d = new xsDuration($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsDurationValidDataProvider()
    {
        return array(
            array('P2Y6M5DT12H35M30S', 'P2Y6M5DT12H35M30S', '2 years, 6 months, 5 days, 12 hours, 35 minutes, 30 seconds'),
            array('P1DT2H', 'P0Y0M1DT2H0M0S', '1 day, 2 hours'),
            array('P20M', 'P0Y20M0DT0H0M0S', '20 months (the number of months can be more than 12)'),
            array('PT20M', 'P0Y0M0DT0H20M0S', '20 minutes'),
            array('P0Y20M0D', 'P0Y20M0DT0H0M0S', '20 months (0 is permitted as a number, but is not required)'),
            array('P0Y', 'P0Y0M0DT0H0M0S', '0 years'),
            array('-P60D', '-P0Y0M60DT0H0M0S', 'minus 60 days'),
            array('PT1M30.5S', 'P0DT0H1M30.5S', '1 minute, 30.5 seconds'),

        );
    }

    /**
     * @dataProvider testxsDurationInvalidDataProvider
     * @param mixed $input
     * @param mixed $message
     * @param mixed $expected
     */
    public function testxsDurationInvalid($input, $expected, $message)
    {
        $d = new xsDuration($input);
        $s = (string)$d;
        $this->assertEquals($expected, $s, $message);
    }

    public function testxsDurationInvalidDataProvider()
    {
        return array(
            array('P-20M', '', 'the minus sign must appear first'),
            array('P20MT', '', 'no time items are present, so "T" must not be present'),
            array('P1YM5D', '', 'no value is specified for months, so "M" must not be present'),
            array('P15.5Y', '', 'only the seconds can be expressed as a decimal'),
            array('P1D2H', '', '"T" must be present to separate days and hours'),
            array('1Y2M', '', '"P" must always be present'),
            array('P2M1Y', '', 'years must appear before months'),
            array('P', '', 'at least one number and designator are required'),
            array('PT15.S', '', 'at least one digit must follow the decimal point if it appears'),
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
