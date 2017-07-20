<?php

namespace AlgoWeb\xsdTypes;

use AlgoWeb\xsdTypes\Facets\LengthTrait;

/**
 * The xsd:hexBinary type represents binary data as a sequence of binary octets.  It uses hexadecimal encoding, where
 * each binary octet is a two-character hexadecimal number.  Lowercase and uppercase letters A through F are permitted.
 * For example, 0FB8 and 0fb8 are two equal xsd:hexBinary representations consisting of two octets.
 * @package AlgoWeb\xsdTypes
 */
class xsHexBinary extends xsAnySimpleType
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
        $lengthOfValue = strlen($this->value);
        if ($lengthOfValue % 2 != 0) {
            throw new \InvalidArgumentException('the value ' . $this->value . 'is not valid; characters must appear' .
                'in pairs');
        }
        if (!ctype_xdigit($this->value)) {
            throw new \InvalidArgumentException('the value ' . $this->value . 'contains invalid characters');
        }
    }
}
