<?php
/**
 * Created by PhpStorm.
 * User: Barnso
 * Date: 14/07/2017
 * Time: 8:28 PM
 */

namespace AlgoWeb\xsdTypes\AxillaryClasses;


class Calender
{
    const timezoneRegexPattern = '([-+][0-1]\d:[0-6]\d|Z*)';
    private $year;
    private $month;
    private $day;

    private function __construct($year = null, $month = null, $day = null, $timezone = 'Z')
    {
        $this->validateInput($year, $month, $day);
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
        $this->valdidateState();
    }

    private function validateInput($year = null, $month = null, $day = null)
    {
        if (null === $year && null === $month && null === $day) {
            throw new \InvalidArgumentException("A Caldender class must have at least a day, month, or year");
        }
        if (null !== $year && null === $month && null !== $day) {
            throw new \InvalidArgumentException("a year day value is not valid");
        }
    }

    private function valdidateState()
    {
        if (null !== $this->day && (1 > $this->day || 31 < $this->day)) {
            throw new \InvalidArgumentException("the day must be greater 0 and less then 32");
        }
        if (null !== $this->month && (1 > $this->month || 12 < $this->month)) {
            throw new \InvalidArgumentException("the month must be greater 0 and less then 12");
        }
        if ($this->month !== null && $this->day !== null &&
            cal_days_in_month($this->getYearOrHolder(), $this->month, $this->day) < $this->day
        ) {
            throw new \InvalidArgumentException("there are not that many days in the assigned month");
        }
    }

    private function getYearOrHolder()
    {
        if (null == $this->year) {
            return '2016';
        }
        return $this->year;
    }

    /**
     * @param string $day should match regex pattern ----\d\d
     *
     * @return Calender
     */
    public static function fromDay($day)
    {
        $re = '/----(0[1-9]|1[0-9]|2[0-9]|3[0-1]|[1-9])([-+][0-1]\d:[0-6]\d|Z*)/';
        preg_match_all($re, $day, $matches, PREG_SET_ORDER, 0);
        if (count($matches) != 1 && count($matches[0]) != 3) {
            throw new \InvalidArgumentException("Unable to extract day from input string");
        }
        return new self(null, null, $matches[0][1], $matches[0][2]);
    }

    public static function FromMonthDay($monthDay)
    {
        $re = '/--(1[0-2]|0[1-9]|[1-9])-(0[1-9]|1[0-9]|2[0-9]|3[0-1]|[1-9])([-+][0-1]\d:[0-6]\d|Z*)/';
        preg_match_all($re, $monthDay, $matches, PREG_SET_ORDER, 0);
        if (count($matches) != 1 && count($matches[0]) != 4) {
            throw new \InvalidArgumentException("Unable to extract month day from input string");
        }
        return new self(null, $matches[0][1], $matches[0][2], $matches[0][3]);

    }

    public static function fromMonth($month)
    {
        $re = '/--(1[0-2]|0[1-9]|[1-9])([-+][0-1]\d:[0-6]\d|Z*)/';
        preg_match_all($re, $month, $matches, PREG_SET_ORDER, 0);
        if (count($matches) != 1 && count($matches[0]) != 3) {
            throw new \InvalidArgumentException("Unable to extract month from input string");
        }
        return new self(null, $matches[0][1], null, $matches[0][2]);
    }

    public static function fromYearMonth($yearMonth)
    {
        $re = '/(\d{4})-(1[0-2]|0[1-9]|[1-9])([-+][0-1]\d:[0-6]\d|Z*)/';
        preg_match_all($re, $yearMonth, $matches, PREG_SET_ORDER, 0);
        if (count($matches) != 1 && count($matches[0]) != 3) {
            throw new \InvalidArgumentException("Unable to extract month from input string");
        }
        return new self($matches[0][1], null, $matches[0][2], $matches[0][3]);
    }

    public static function fromYear($year)
    {
        $re = '/(\d{4})([-+][0-1]\d:[0-6]\d|Z*)/';
        preg_match_all($re, $year, $matches, PREG_SET_ORDER, 0);
        if (count($matches) != 1 && count($matches[0]) != 3) {
            throw new \InvalidArgumentException("Unable to extract month from input string");
        }
        return new self($matches[0][1], null, null, $matches[0][2]);
    }
}