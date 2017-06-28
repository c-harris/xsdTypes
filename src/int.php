<?php
/**
 * Created by PhpStorm.
 * User: Barnso
 * Date: 28/06/2017
 * Time: 5:09 PM
 */

namespace AlgoWeb\xsdTypes;

/**
 * xsd:int — 32-bit signed integers
 * @package AlgoWeb\xsdTypes
 */
class int extends long
{
    public function __construct($value)
    {
        parent::__construct($value);
        $this->minInclusive = -2147483648;
        $this->maxInclusive = 2147483647;
    }
}
