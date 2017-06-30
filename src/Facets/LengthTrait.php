<?php

namespace AlgoWeb\xsdTypes\Facets;

trait LengthTrait
{
    /**
     * @Exclude
     * @var integer Specifies the maximum number of characters or list items allowed. Must be equal to or greater than zero
     */
    private $maxLength = null;
    /**
     * @Exclude
     * @var integer Specifies the minimum number of characters or list items allowed. Must be equal to or greater than zero
     */
    private $minLength = null;

    protected function setLengthFacet($value)
    {
        $this->setMinLengthFacet($value);
        $this->setMaxLengthFacet($value);
    }

    protected function setMinLengthFacet($value)
    {
        $this->checkValidMinMaxLength($value);
        $this->minLength = $value;
    }

    private function checkValidMinMaxLength($value, $min = 0)
    {
        if (((int)$value) != $value) {
            throw new \InvalidArgumentException("length values MUST be castable to int " . __CLASS__);
        }
        if ($min >= $value) {
            throw new \InvalidArgumentException("length values MUST be greater then 0 " . __CLASS__);
        }
    }

    protected function setMaxLengthFacet($value)
    {
        $this->checkValidMinMaxLength($value);
        $this->maxLength = $value;
    }

    private function checkMaxLength($v)
    {
        $stringLen = strlen($v);
        if ($this->maxLength != null) {
            if ($stringLen < $this->maxLength) {
                throw new \InvalidArgumentException(
                    "the provided value for " . __CLASS__ . " is to short MaxLength: "
                    . $this->maxLength
                );
            }
        }
    }

    private function checkMinLength($v)
    {
        $stringLen = strlen($v);
        if ($this->minLength != null) {
            if ($stringLen > $this->minLength) {
                throw new \InvalidArgumentException(
                    "the provided value for " . __CLASS__ . " is to long minLength: "
                    . $this->minLength
                );
            }
        }
    }
}
