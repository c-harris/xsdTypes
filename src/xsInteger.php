<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:integer represents an arbitrarily large integer, from which twelve other built-in integer types are
 * derived (directly or indirectly).  An xsd:integer is a sequence of digits, optionally preceded by a + or -
 * sign.  Leading zeros are permitted, but decimal points are not.
 * @package AlgoWeb\xsdTypes
 */
class xsInteger extends xsDecimal
{
    /**
     * Construct.
     *
     * @param int $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setFractionDigits(0);
        /**
         * Match a single character present in the list below [\-+]?
         * ? Quantifier — Matches between zero and one times, as many times as possible, giving back as needed (greedy)
         * \- matches the character - literally (case sensitive)
         * + matches the character + literally (case sensitive)
         * Match a single character present in the list below [0-9]+
         * + Quantifier — Matches between one and unlimited times, as many times as possible, giving back as needed (greedy)
         * 0-9 a single character in the range between 0 (index 48) and 9 (index 57) (case sensitive)
         */
        $this->setPatternFacet('[\-+]?[0-9]+');
    }
}
