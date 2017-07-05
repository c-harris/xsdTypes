<?php

namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:yearMonthDuration represents a duration of time expressed as a number of years and months. The format
 * of xsd:yearMonthDuration is PnYnM, where P is a literal value that starts the expression, nY is the number of years
 * followed by a literal Y, nM is the number of months followed by a literal M. The following rules apply to
 * xsd:yearMonthDuration values:
 *
 * - Either of these numbers and corresponding designators may be absent if they are equal to 0, but at least
 *   one number and designator must appear.
 * - The numbers may be any unsigned integer.
 * - A minus sign may appear before the P to specify a negative duration.
 * Note that this type was added to the XML Schema namespace as a result of XPath 2.0. It was not in the original XML
 * Schema 1.0 specification and is therefore not supported for use in XML Schema 1.0 schemas.
 * @package AlgoWeb\xsdTypes
 */
class xsYearMonthDuration extends xsDurationextends
{
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

//TODO: TechDebt.this needs to be more specific fo the type.
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