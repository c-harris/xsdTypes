<?php

namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:dayTimeDuration represents a duration of time expressed as a number of days, hours, minutes, and
 * seconds. The format of xsd:dayTimeDuration is PnDTnHnMnS, where P is a literal value that starts the expression,
 * nD is the number of days followed by a literal D, T is a literal value that separates the date and time, nH is
 * the number of hours followed by a literal H, nM is the number of minutes followed by a literal M, and nS is the
 * number of seconds followed by a literal S. The following rules apply to xsd:dayTimeDuration values:
 * - Any of these numbers and corresponding designators may be absent if they are equal to 0, but at least one
 *   number and designator must appear.
 * - The numbers may be any unsigned integer, with the exception of the number of seconds, which may be an
 *   unsigned decimal number.
 * - I f a decimal point appears in the number of seconds, there must be at least one digit after the decimal point.
 * - A minus sign may appear before the P to specify a negative duration.
 * - If no time items (hour, minute, second) are present, the letter T must not appear.
 * @package AlgoWeb\xsdTypes
 */
class xsDayTimeDuration extends xsDuration
{
    public function fixValue(): void
    {
        parent::fixValue();
        $v = new \DateInterval($this->value);
        $this->value = $this->format($v, 'PnDTnHnMnS');
    }
}
