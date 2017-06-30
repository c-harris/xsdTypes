<?php

namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:IDREFS represents a list of IDREF values separated by whitespace. There must be at least one IDREF in
 * the list. Each of the IDREF values must match an ID contained in the same XML document.
 * @package AlgoWeb\xsdTypes
 */
class xsIDREFS extends xsAnySimpleType
{
    /**
     * Construct
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setMinLengthFacet(1);
    }

    protected function fixValue($value)
    {
        return $value;
    }

    protected function isOK($value)
    {
        if (!is_array($value)) {
            throw new \InvalidArgumentException(
                "the provided value for " . __CLASS__ . " Must be an array of type xsIDREF "
            );
        }
        foreach ($value as $v) {
            $v->isOKInternal();
        }
    }
}
