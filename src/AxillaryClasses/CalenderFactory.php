<?php

namespace AlgoWeb\xsdTypes\AxillaryClasses;

class CalenderFactory extends Calender
{
    /**
     * @param string $day should match regex pattern ----\d\d
     *
     * @return \AlgoWeb\xsdTypes\AxillaryClasses\Calender
     */
    public static function fromDay($day)
    {
        $dayTimezone = '/----(0[1-9]|1[0-9]|2[0-9]|3[0-1]|[1-9])([-+][0-1]\d:[0-6]\d|Z*)/';
        preg_match_all($dayTimezone, $day, $matches, PREG_SET_ORDER, 0);
        if (count($matches) != 1 || count($matches[0]) != 3) {
            throw new \InvalidArgumentException('Unable to extract day from input string');
        }
        return new self(null, null, $matches[0][1], $matches[0][2]);
    }

    /**
     * @param string $monthDay
     *
     * @return \AlgoWeb\xsdTypes\AxillaryClasses\Calender
     */
    public static function fromMonthDay($monthDay)
    {
        $monthDayTimezone = '/--(1[0-2]|0[1-9]|[1-9])-(0[1-9]|1[0-9]|2[0-9]|3[0-1]|[1-9])([-+][0-1]\d:[0-6]\d|Z*)/';
        preg_match_all($monthDayTimezone, $monthDay, $matches, PREG_SET_ORDER, 0);
        if (count($matches) != 1 || count($matches[0]) != 4) {
            throw new \InvalidArgumentException('Unable to extract month day from input string');
        }
        return new self(null, $matches[0][1], $matches[0][2], $matches[0][3]);
    }

    /**
     * @param string $month
     *
     * @return \AlgoWeb\xsdTypes\AxillaryClasses\Calender
     */
    public static function fromMonth($month)
    {
        $monthTimezone = '/--(1[0-2]|0[1-9]|[1-9])([-+][0-1]\d:[0-6]\d|Z*)/';
        preg_match_all($monthTimezone, $month, $matches, PREG_SET_ORDER, 0);
        if (count($matches) != 1 || count($matches[0]) != 3) {
            throw new \InvalidArgumentException('Unable to extract month from input string');
        }
        return new self(null, $matches[0][1], null, $matches[0][2]);
    }

    /**
     * @param string $yearMonth
     *
     * @return \AlgoWeb\xsdTypes\AxillaryClasses\Calender
     */
    public static function fromYearMonth($yearMonth)
    {
        $yearMonthTimezone = '/(\d{4})-(1[0-2]|0[1-9]|[1-9])([-+][0-1]\d:[0-6]\d|Z*)/';
        preg_match_all($yearMonthTimezone, $yearMonth, $matches, PREG_SET_ORDER, 0);
        if (count($matches) != 1 || count($matches[0]) != 3) {
            throw new \InvalidArgumentException('Unable to extract month from input string');
        }
        return new self($matches[0][1], null, $matches[0][2], $matches[0][3]);
    }

    /**
     * @param string $year
     *
     * @return \AlgoWeb\xsdTypes\AxillaryClasses\Calender
     */
    public static function fromYear($year)
    {
        $yearTimezone = '/(\d{4})([-+][0-1]\d:[0-6]\d|Z*)/';
        preg_match_all($yearTimezone, $year, $matches, PREG_SET_ORDER, 0);
        if (count($matches) != 1 || count($matches[0]) != 3) {
            throw new \InvalidArgumentException('Unable to extract month from input string');
        }
        return new self($matches[0][1], null, null, $matches[0][2]);
    }
}
