<?php

namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:boolean represents logical yes/no values.  The valid values for xsd:boolean are true, false, 0, and 1.
 * Values that are capitalized (e.g. TRUE) or abbreviated (e.g. T) are not valid.
 * @package AlgoWeb\xsdTypes
 */
class xsBoolean extends xsAnySimpleType
{
    /**
     * Construct.
     *
     * @param bool $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setWhiteSpaceFacet('collapse');
    }

    /**
     * @return void
     */
    protected function fixValue()
    {
        parent::fixValue();

        $this->value = filter_var($this->value, FILTER_VALIDATE_BOOLEAN, ['options' => [],
            'flags' => FILTER_NULL_ON_FAILURE]);
        if (null === $this->value) {
            throw new \InvalidArgumentException('the value passed to ' . get_class($this) . 'was not a booliean');
        }
        $this->value = $this->value ? 'true' : 'false';
    }

    /**
     * @return void
     */
    protected function isOK()
    {
    }
}
