<?php
namespace AlgoWeb\xsdTypes;

use AlgoWeb\xsdTypes\Facets\EnumerationTrait;
use AlgoWeb\xsdTypes\Facets\LengthTrait;
use AlgoWeb\xsdTypes\Facets\PatternTrait;
use AlgoWeb\xsdTypes\Facets\WhiteSpaceTrait;

/**
 * The type xsd:anySimpleType is the base type from which all other built-in types are derived.
 * Any value (including an empty value) is allowed for xsd:anySimpleType.
 * handles facets enumeration, length, maxLength, minLength, pattern
 *
 * @package AlgoWeb\xsdTypes
 */
abstract class xsAnySimpleType
{
    use WhiteSpaceTrait, PatternTrait, EnumerationTrait, LengthTrait;
    /**
     * @Exclude
     * @var boolean indicates if value has been fixed.
     */
    protected $fixed = false;

    /**
     * @property mixed $__value
     */
    protected $__value = null;

    /**
     * Construct
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->__value = $value;
    }

    public function __toString()
    {
        if (!$this->fixed) {
            $this->fixValue();
            $this->isOKInternal();
        }
        return $this->__value;
    }

    protected function fixValue()
    {
        $this->__value = $this->fixWhitespace($this->__value);
    }

    protected function isOKInternal()
    {
        $this->checkEnumeration($this->__value);
        $this->checkMaxLength($this->__value);
        $this->checkMinLength($this->__value);
        $this->checkPattern($this->__value);
        $this->isOK();
    }

    abstract protected function isOK();
}
