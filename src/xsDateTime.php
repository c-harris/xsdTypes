<?php

namespace AlgoWeb\xsdTypes;

use AlgoWeb\xsdTypes\Facets\MinMaxTrait;

/**
 * The type xsd:dateTime represents a specific date and time in the format CCYY-MM-DDThh:mm:ss.sss, which is a
 * concatenation of the date and time forms, separated by a literal letter "T". All of the same rules that apply to
 * the date and time types are applicable to xsd:dateTime as well.
 *
 * An optional time zone expression may be added at the end of the value. The letter Z is used to indicate Coordinated
 * Universal Time (UTC). All other time zones are represented by their difference from Coordinated Universal Time
 * in the format +hh:mm, or -hh:mm. These values may range from -14:00 to 14:00. For example, US Eastern Standard Time,
 * which is five hours behind UTC, is represented as -05:00. If no time zone value is present, it is considered
 * unknown; it is not assumed to be UTC.
 * @package AlgoWeb\xsdTypes
 */
class xsDateTime extends xsAnySimpleType
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
        $dateTimeValue = new \DateTime($this->value);
        $this->value = $dateTimeValue->format('Y-m-d\TH:i:s') . $this->fixFractionOfSecond($dateTimeValue) . $dateTimeValue->format('P');
    }

    private function fixFractionOfSecond(\DateTime $dateTimeValue)
    {
        if (0 != (int)$dateTimeValue->format('u')) {
            return '.' . $dateTimeValue->format('u') / 100000;
        }
        return '';
    }

    protected function isOK()
    {
        $this->CheckMinMax(new \DateTime($this->value));
    }
}
