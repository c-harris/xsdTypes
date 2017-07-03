<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:NMTOKENS represents a list of NMTOKEN values separated by whitespace. There must be at least one
 * NMTOKEN in the list.
 *
 * @package AlgoWeb\xsdTypes
 */
class xsNMTOKENS extends xsAnySimpleType
{
    /**
     * Construct
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setWhiteSpaceFacet("collapse");
        $this->setMinLengthFacet(1);
        if ('AlgoWeb\xsdTypes\xsNMTOKENS' == get_class($this)) {
            $this->fixValue();
        }
    }

    protected function fixValue()
    {
        if (is_string($this->__value)) {
            $parts = explode(" ", $this->__value);
            $this->__value = [];
            foreach ($parts as $part) {
                $this->__value[] = new xsNMTOKEN($part);
            }
        }
        foreach ($this->__value as $v) {
            $v->fixValue($v);
        }

    }

    protected function isOK()
    {
        if (!is_array($this->__value)) {
            throw new \InvalidArgumentException(
                "the provided value for " . __CLASS__ . " Must be an array of type xsNMTOKEN "
            );
        }
        foreach ($this->__value as $v) {
            $v->isOKInternal();
        }
    }
}
