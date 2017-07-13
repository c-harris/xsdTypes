<?php

namespace AlgoWeb\xsdTypes;

use AlgoWeb\xsdTypes\AxillaryClasses\XMLDateInterval;
use AlgoWeb\xsdTypes\Facets\MinMaxTrait;

/**
 * The type xsd:duration represents a duration of time expressed as a number of years, months, days, hours, minutes,
 * and seconds. The format of xsd:duration is PnYnMnDTnHnMnS, where P is a literal value that starts the expression,
 * nY is the number of years followed by a literal Y, nM is the number of months followed by a literal M, nD is the
 * number of days followed by a literal D, T is a literal value that separates the date and time, nH is the number of
 * hours followed by a literal H, nM is the number of minutes followed by a literal M, and nS is the number of seconds
 * followed by a literal S. The following rules apply to xsd:duration values:.
 *
 * - Any of these numbers and corresponding designators may be absent if they are equal to 0, but at least one number
 *          and designator must appear.
 *  - The numbers may be any unsigned integer, with the exception of the number of seconds, which may be an unsigned
 *          decimal number.
 *  - If a decimal point appears in the number of seconds, there must be at least one digit after the decimal point.
 *  - A minus sign may appear before the P to specify a negative duration.
 *  - If no time items (hour, minute, second) are present, the letter T must not appear.
 *
 * @package AlgoWeb\xsdTypes
 */
class xsDuration extends xsAnySimpleType
{
    use MinMaxTrait;

    /**
     * Construct.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setWhiteSpaceFacet('collapse');
    }

    public function fixValue()
    {
        parent::fixValue();
        $v = new XMLDateInterval($this->value);
        $this->value = $v->__toString();
    }

    protected function isOK()
    {
        $this->CheckMinMax(new XMLDateInterval($this->value));
    }
}
