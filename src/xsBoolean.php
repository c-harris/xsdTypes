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
    protected function fixValue()
    {
        parent::fixValue();
        $this->value = filter_var($this->value, FILTER_VALIDATE_BOOLEAN) ? 'true' : 'false';
    }
    protected function isOK()
    {
        if (true != $this->value && false != $this->value) {
            throw new \InvalidArgumentException(
                'The provided value for ' . __CLASS__ . ' needs to be a boolean.'
            );
        }
    }
}
