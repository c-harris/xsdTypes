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
        $re = '/----(0[1-9]|1[0-9]|2[0-9]|3[0-1]|[1-9])([-+][0-1]\d:[0-6]\d|Z*)/';
        preg_match_all($re, $day, $matches, PREG_SET_ORDER, 0);
        if (count($matches) != 1 && count($matches[0]) != 3) {
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
        $re = '/--(1[0-2]|0[1-9]|[1-9])-(0[1-9]|1[0-9]|2[0-9]|3[0-1]|[1-9])([-+][0-1]\d:[0-6]\d|Z*)/';
        preg_match_all($re, $monthDay, $matches, PREG_SET_ORDER, 0);
        if (count($matches) != 1 && count($matches[0]) != 4) {
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
        $re = '/--(1[0-2]|0[1-9]|[1-9])([-+][0-1]\d:[0-6]\d|Z*)/';
        preg_match_all($re, $month, $matches, PREG_SET_ORDER, 0);
        if (count($matches) != 1 && count($matches[0]) != 3) {
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
        $re = '/(\d{4})-(1[0-2]|0[1-9]|[1-9])([-+][0-1]\d:[0-6]\d|Z*)/';
        preg_match_all($re, $yearMonth, $matches, PREG_SET_ORDER, 0);
        if (count($matches) != 1 && count($matches[0]) != 3) {
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
        $re = '/(\d{4})([-+][0-1]\d:[0-6]\d|Z*)/';
        preg_match_all($re, $year, $matches, PREG_SET_ORDER, 0);
        if (count($matches) != 1 && count($matches[0]) != 3) {
            throw new \InvalidArgumentException('Unable to extract month from input string');
        }
        return new self($matches[0][1], null, null, $matches[0][2]);
    }
}