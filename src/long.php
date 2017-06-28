<?php
/**
 * Created by PhpStorm.
 * User: Barnso
 * Date: 28/06/2017
 * Time: 5:07 PM
 */

namespace AlgoWeb\xsdTypes;

/**
 * xsd:long — 64-bit signed integers
 * @package AlgoWeb\xsdTypes
 */
class long extends integer
{
    public function __construct($value)
    {
        parent::__construct($value);
        $this->minInclusive = -9223372036854775808;
        $this->maxInclusive = 9223372036854775807;
    }
}
