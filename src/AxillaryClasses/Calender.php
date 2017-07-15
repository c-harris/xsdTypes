<?php
namespace AlgoWeb\xsdTypes\AxillaryClasses;

class Calender
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
    protected function __construct($year = null, $month = null, $day = null, $timezone = null)
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
    private function validateInput($year, $month, $day)
    {
        $this->validateInputNotAllNull($year, $month, $day);
        $this->validateInputNotYearAndDay($year, $month, $day);
    }

    private function validateInputNotAllNull($year, $month, $day)
    {
        if (null === $year && null === $month && null === $day) {
            throw new \InvalidArgumentException('A Caldender class must have at least a day, month, or year');
        }
    }

    private function validateInputNotYearAndDay($year, $month, $day)
    {
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
}
