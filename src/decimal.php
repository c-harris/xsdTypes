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
 *
 * @package        AlgoWeb\xsdTypes
 * @property-write string $whiteSpace Specifies how white space (line feeds, tabs, spaces, and carriage returns) is handled
 */
class decimal extends SimpleTypeBase
{
    public function __construct($value)
    {
        $this->whiteSpace = "replace";
        parent::__construct($value);
    }

    protected function isValid($v)
    {
        if (!is_numeric($v)) {
            throw new \InvalidArgumentException("failed to provide numeric value " . __CLASS__);
        }
    }
}
