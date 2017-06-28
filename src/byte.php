<?php
/**
 * Created by PhpStorm.
 * User: Barnso
 * Date: 28/06/2017
 * Time: 5:11 PM
 */

namespace AlgoWeb\xsdTypes;

class byte extends short
{
    public function __construct($value)
    {
        parent::__construct($value);
        $this->minInclusive = -128;
        $this->maxInclusive = 127;
    }
}
