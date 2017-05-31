<?php
/**
 * Created by PhpStorm.
 * User: Doc
 * Date: 6/1/2017
 * Time: 1:53 AM
 */

namespace AlgoWeb\xsdTypes;

/**
 * xsd:decimal is the datatype that represents the set of all decimal numbers with arbitrary lengths.
 * Its lexical space allows any number of insignificant leading and trailing zeros (after the decimal point).
 * @package AlgoWeb\xsdTypes
 */
class decimal
{
    public function __construct($value)
    {
        $this->whiteSpace = "replace";
        parent::__construct($value);
    }
}
