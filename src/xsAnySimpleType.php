<?php
namespace AlgoWeb\xsdTypes;

use AlgoWeb\xsdTypes\Facets\EnumerationTrait;
use AlgoWeb\xsdTypes\Facets\PatternTrait;
use AlgoWeb\xsdTypes\Facets\WhiteSpaceTrait;

/**
 * The type xsd:anySimpleType is the base type from which all other built-in types are derived.
 * Any value (including an empty value) is allowed for xsd:anySimpleType.
 * Handles facets enumeration, length, maxLength, minLength, pattern.
 *
 * @package AlgoWeb\xsdTypes
 */
abstract class xsAnySimpleType
{
    use WhiteSpaceTrait, PatternTrait, EnumerationTrait;
    /**
     * @Exclude
     * @var bool indicates if value has been fixed
     */
    protected $fixed = false;

    /**
     * @property mixed $value
     */
    protected $value = null;

    /**
     * Construct.
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        try {
            if (!$this->fixed) {
                $this->fixValue();
                $this->isOKInternal();
            }
        } catch (\Exception $e) {
            $this->value = '';
        }
        if (is_array($this->value)) {
            return implode(' ', $this->value);
        }
        return (string)$this->value;
    }

    /**
     * makes changes to the value to compensate for rounding conditions or white space handling.
     */
    protected function fixValue()
    {
        $this->value = $this->fixWhitespace($this->value);
    }

    protected function isOKInternal()
    {
        $this->checkEnumeration($this->value);
        $this->checkPattern($this->value);
        $this->isOK();
    }

    /**
     * preforms subclass specific checks to make sure the contained value is OK.
     *
     * @return null
     */
    abstract protected function isOK();
}
