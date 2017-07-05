<?php

namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:yearMonthDuration represents a duration of time expressed as a number of years and months. The format
 * of xsd:yearMonthDuration is PnYnM, where P is a literal value that starts the expression, nY is the number of years
 * followed by a literal Y, nM is the number of months followed by a literal M. The following rules apply to
 * xsd:yearMonthDuration values:.
 *
 * - Either of these numbers and corresponding designators may be absent if they are equal to 0, but at least
 *   one number and designator must appear.
 * - The numbers may be any unsigned integer.
 * - A minus sign may appear before the P to specify a negative duration.
 * Note that this type was added to the XML Schema namespace as a result of XPath 2.0. It was not in the original XML
 * Schema 1.0 specification and is therefore not supported for use in XML Schema 1.0 schemas.
 * @package AlgoWeb\xsdTypes
 */
class xsYearMonthDuration extends xsDuration
{
    public function fixValue()
    {
        parent::fixValue();
        $v = new \DateInterval($this->value);
        $this->value = $this->format($v, 'PnYnM');
    }
}
