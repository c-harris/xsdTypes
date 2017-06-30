<?php
/**
 * Created by PhpStorm.
 * User: Barnso
 * Date: 30/06/2017
 * Time: 9:43 PM
 */

namespace AlgoWeb\xsdTypes\Facets;

trait WhiteSpaceTrait
{
    /**
     * @Exclude
     * @var string Specifies how white space (line feeds, tabs, spaces, and carriage returns) is handled
     */
    private $whiteSpace = "preserve";

    protected function fixWhitespace($val)
    {
        switch ($this->whiteSpace) {
            case "preserve":
                return $val;
            case "replace":
                return preg_replace('/\s/', ' ', $val);
            case "collapse":
                return preg_replace('/\s+/', ' ', $val);
            default:
                throw new \InvalidArgumentException(__CLASS__ . " Called Fix whitespace with invalid handle operation");
        }
    }

    protected function setWhiteSpaceFacet($value)
    {
        if (!in_array($value, ["preserve", "replace", "collapse"])) {
            throw new \InvalidArgumentException("Invalid white space handleing method " . __CLASS__);
        }
        $this->whiteSpace = $value;
    }
}
