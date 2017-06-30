<?php
namespace AlgoWeb\xsdTypes;

use AlgoWeb\xsdTypes\Facets\EnumerationTrait;
use AlgoWeb\xsdTypes\Facets\LengthTrait;
use AlgoWeb\xsdTypes\Facets\PatternTrait;
use AlgoWeb\xsdTypes\Facets\WhiteSpaceTrait;

/**
 * The type xsd:anySimpleType is the base type from which all other built-in types are derived. Any value (including an empty value) is allowed for xsd:anySimpleType.
 * handles facets enumeration, length, maxLength, minLength, pattern
 *
 * @package AlgoWeb\xsdTypes
 */
abstract class xsAnySimpleType
{
    use WhiteSpaceTrait, PatternTrait, EnumerationTrait, LengthTrait;


    /**
     * @property mixed $__value
     */
    private $__value = null;

    /**
     * Construct
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->__value = $this->fixValueInteral($value);
    }

    private function fixValueInteral($value)
    {
        return $this->fixValue($this->fixWhitespace($value));
    }

    abstract protected function fixValue($value);

    protected function isOKInternal($value)
    {
        $this->checkEnumeration($value);
        $this->checkMaxLength($value);
        $this->checkMinLength($value);
        $this->checkPattern($value);
        return $this->isOK($value);
    }


    abstract protected function isOK($value);
}
