<?php

namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:duration represents a duration of time expressed as a number of years, months, days, hours, minutes,
 * and seconds. The format of xsd:duration is PnYnMnDTnHnMnS, where P is a literal value that starts the expression,
 * nY is the number of years followed by a literal Y, nM is the number of months followed by a literal M, nD is the
 * number of days followed by a literal D, T is a literal value that separates the date and time, nH is the number of
 * hours followed by a literal H, nM is the number of minutes followed by a literal M, and nS is the number of seconds
 * followed by a literal S. The following rules apply to xsd:duration values:
 *
 * - Any of these numbers and corresponding designators may be absent if they are equal to 0, but at least one number and designator must appear.
 *  - The numbers may be any unsigned integer, with the exception of the number of seconds, which may be an unsigned decimal number.
 *  - If a decimal point appears in the number of seconds, there must be at least one digit after the decimal point.
 *  - A minus sign may appear before the P to specify a negative duration.
 *  - If no time items (hour, minute, second) are present, the letter T must not appear.
 * @package AlgoWeb\xsdTypes
 */
class xsDuration extends xsAnySimpleType
{
    use MinMaxTrait;

    /**
     * Construct
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setWhiteSpaceFacet("collapse");
    }

    public function fixValue()
    {
        parent::fixValue();
        $v = new \DateInterval($this->value);
        $this->value = $this->format($v);
    }

    protected function format(\DateInterval $tint)
    {
        $sReturn = 'P';

        if ($this->y) {
            $sReturn .= $tint->y . 'Y';
        }

        if ($this->m) {
            $sReturn .= $tint->m . 'M';
        }

        if ($this->d) {
            $sReturn .= $tint->d . 'D';
        }

        if ($tint->h || $tint->i || $tint->s) {
            $sReturn .= 'T';

            if ($this->h) {
                $sReturn .= $tint->h . 'H';
            }

            if ($this->i) {
                $sReturn .= $tint->i . 'M';
            }

            if ($this->s) {
                $sReturn .= $tint->s . 'S';
            }
        }

        return $sReturn;
    }

    protected function isOK()
    {
        $this->CheckMinMax(new \DateInterval($this->value));
    }
}
