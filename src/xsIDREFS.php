<?php

namespace AlgoWeb\xsdTypes;

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
