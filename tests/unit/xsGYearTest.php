<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsGYearTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testxsGYearValidDataProvider
     */
    public function testxsGYearValid($input, $message)
    {
        try {
            $d = new xsGYear($input);
            $s = (string)$d;
        } catch (\Exception $e) {
            $this->fail($message . ' with Exception ' . $e->getMessage());
        }
    }

    public function testxsGYearValidDataProvider()
    {
        return array(
            array('2004', '2004'),
            array('2004-05:00', '2004, US Eastern Standard Time'),
            array('12004', 'the year 12004'),
            array('0922', 'the year 922'),
            array('-0045', '45 BC'),
        );
    }

    /**
     * @dataProvider testxsGYearInvalidDataProvider
     */
    public function testxsGYearInvalid($input, $message)
    {
        try {
            $d = new xsGYear($input);
            $s = (string)$d;
            $this->fail($message);
        } catch (\Exception $e) {
        }
        $this->assertEquals('', $s, $message);
    }

    public function testxsGYearInvalidDataProvider()
    {
        return array(
            array('99', 'the century must not be truncated'),
            array('922', 'no left truncation is allowed; leading zeros should be added if necessary'),
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
