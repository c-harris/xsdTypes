<?php
/**
 * Created by PhpStorm.
 * User: Barnso
 * Date: 28/06/2017
 * Time: 5:04 PM
 */

namespace AlgoWeb\xsdTypes;

/**
 * xsd:integer — Signed integers of arbitrary length
 * @package AlgoWeb\xsdTypes
 */
class integer extends decimal
{
    public function __construct($value)
    {
        $this->fractionDigits = 0;
        parent::__construct($value);
    }
    protected function isValid($v)
    {
        return is_intege($v);
    }
}
