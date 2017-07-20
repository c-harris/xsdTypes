<?php

namespace AlgoWeb\xsdTypes;

use AlgoWeb\xsdTypes\Facets\LengthTrait;

/**
 * type xsd:QName represents an XML namespace-qualified name.  A xsd:QName value consists
 * of a prefix and a local part, separated by a colon, both of which are NCName values.  The prefix and colon are
 * optional, but if they are not present, it is assumed that either the name is namespace-qualified by other means
 * (e.g., by a default namespace declaration), or the name is not in a namespace.
 * @package AlgoWeb\xsdTypesThe
 */
class xsQName extends xsAnySimpleType
{
    use LengthTrait;

    /**
     * Construct.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setWhiteSpaceFacet('collapse');
    }

    protected function isOK()
    {
        $this->checkLength($this->value);
        if (':' == $this->value[0]) {
            throw new \InvalidArgumentException('QName cannot start with colon');
        }
        $this->checkColen();
    }

    private function checkColen()
    {
        $bitz = explode(':', $this->value);
        if (2 < count($bitz)) {
            throw new \InvalidArgumentException('QName cannot contain two or more colons');
        }
        $this->checkParts($bitz);
    }

    private function checkParts($bitz)
    {
        foreach ($bitz as $bit) {
            $ncName = new xsNCName($bit);
            $ncNameStr = $ncName->__toString();
            if ($bit != $ncNameStr) {
                throw new \InvalidArgumentException($bit . ' is not a valid NCName so can not be part ofa QName');
            }
        }
    }
}
