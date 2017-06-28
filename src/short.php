<?php
/**
 * Created by PhpStorm.
 * User: Barnso
 * Date: 28/06/2017
 * Time: 5:10 PM
 */

namespace AlgoWeb\xsdTypes;


class short extends int
{
    public function __construct($value)
    {
        parent::__construct($value);
        $this->minInclusive = -32768;
        $this->maxInclusive = 32767;
    }
}