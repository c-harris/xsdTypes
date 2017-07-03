<?php
namespace AlgoWeb\xsdTypes;

use AlgoWeb\xsdTypes\Facets\LengthTrait;

/**
 * The type xsd:NMTOKENS represents a list of NMTOKEN values separated by whitespace. There must be at least one
 * NMTOKEN in the list.
 *
 * @package AlgoWeb\xsdTypes
 */
class xsNMTOKENS extends xsAnySimpleType
{
    use LengthTrait;

    /**
     * Construct
     *
     * @param array $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setWhiteSpaceFacet("collapse");
        $this->setMinLengthFacet(1);
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
        assert(is_array($this->__value), "some how nmtokens ended up not being an array.");
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
