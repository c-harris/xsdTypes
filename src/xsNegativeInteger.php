<?php
/**
 * Created by PhpStorm.
 * User: Barnso
 * Date: 4/07/2017
 * Time: 12:55 AM
 */

namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:negativeInteger represents an arbitrarily large negative integer. An xsd:negativeInteger is a
 * sequence of digits, preceded by a - sign. Leading zeros are permitted, but decimal points are not.
 * @package AlgoWeb\xsdTypes
 */
class xsNegativeInteger extends xsNonPositiveInteger
{
    /**
     * Construct
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setMaxInclusive(-1);
    }
}
