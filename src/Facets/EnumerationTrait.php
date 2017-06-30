<?php
/**
 * Created by PhpStorm.
 * User: Barnso
 * Date: 30/06/2017
 * Time: 9:17 PM
 */

namespace AlgoWeb\xsdTypes\Facets;

trait EnumerationTrait
{
    /**
     * @Exclude
     * @var array Defines a list of acceptable values
     */
    private $enumeration = null;

    protected function setEnumeration(array $enumorationValues)
    {
        $this->enumeration = $enumorationValues;
    }

    protected function addEnumoration($enumorationValue)
    {
        if (!is_array($this->enumeration)) {
            $this->enumeration = [];
        }
        $this->enumeration[] = $enumorationValue;
    }

    private function checkEnumeration($v)
    {
        if (is_array($this->enumeration) && 0 != count($this->enumeration) && !in_array($v, $this->enumeration)) {
            throw new \InvalidArgumentException(
                "the provided value for " . __CLASS__ . " is not " .
                implode(" || ", $this->enumeration)
            );
        }
    }
}
