<?php
namespace AlgoWeb\xsdTypes\AxillaryClasses;

final class Calender
{
    private $year;
    private $month;
    private $day;
    private $timeZone;

    /**
     * Calender constructor.
     *
     * @param string|null $year
     * @param string|null $month
     * @param string|null $day
     * @param string|null $timezone
     */
    private function __construct($year = null, $month = null, $day = null, $timezone = null)
    {
        $this->validateInput($year, $month, $day);
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
        $this->timeZone = $timezone;
        $this->validateState();
    }

    /**
     * @param string|null $year
     * @param string|null $month
     * @param string|null $day
     *
     * @return void
     */
    private function validateInput($year = null, $month = null, $day = null)
    {
        if (null === $year && null === $month && null === $day) {
            throw new \InvalidArgumentException('A Caldender class must have at least a day, month, or year');
        }
        if (null !== $year && null === $month && null !== $day) {
            throw new \InvalidArgumentException('a year day value is not valid');
        }
    }

    /**
     * @return void
     */
    private function validateState()
    {
        $this->validateDay();
        $this->validateMonth();
    }

    /**
     * @return void
     */
    private function validateDay()
    {
        if (null !== $this->day && (1 > $this->day || $this->getMaxDays() < $this->day)) {
            throw new \InvalidArgumentException('the day must be greater 0 and less then 32');
        }
    }

    /**
     * @return string
     */
    private function getMaxDays()
    {
        if (null !== $this->month) {
            return (string)cal_days_in_month(CAL_GREGORIAN, $this->month, $this->getYearOrHolder());
        }
        return '31';
    }

    /**
     * @return string
     */
    private function getYearOrHolder()
    {
        if (null === $this->year) {
            return '2016';
        }
        return $this->year;
    }

    /**
     * @return void
     */
    private function validateMonth()
    {
        if (null !== $this->month && (1 > $this->month || 12 < $this->month)) {
            throw new \InvalidArgumentException('the month must be greater 0 and less then 12');
        }
    }

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
