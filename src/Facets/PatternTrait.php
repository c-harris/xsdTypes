<?php
/**
 * Created by PhpStorm.
 * User: Barnso
 * Date: 30/06/2017
 * Time: 9:40 PM
 */

namespace AlgoWeb\xsdTypes\Facets;


trait PatternTrait
{
    /**
     * @Exclude
     * @var string Defines the exact sequence of characters that are acceptable
     */
    private $pattern = null;

    protected function setPatternFacet($value)
    {
        if (!$this->checkRegexValidPattern($value)) {
            $value = "/" . $value . "/";
            if (!$this->checkRegexValidPattern($value)) {
                throw new \InvalidArgumentException("Invalid regex Pattern provided: " . __CLASS__);
            }
        }
        $this->pattern = $value;
    }

    private function checkRegexValidPattern($pattern)
    {
        return (@preg_match($pattern, null) === false);
    }


    private function checkPattern($v)
    {
        if ($this->pattern != null) {
            if (!$this->matchesRegexPattern($this->pattern, $v)) {
                throw new \InvalidArgumentException("assigned value that dose not match pattern " . __CLASS__);
            }
        }
    }

    /**
     * Checks a pattern against a string
     *
     * @param  string $pattern the regex pattern
     * @param  string $string the string to check
     * @return bool true if string matches pattern
     */
    private function matchesRegexPattern($pattern, $string)
    {
        $matches = null;
        return (1 == preg_match($pattern, $string, $matches) && $string == $matches[0]);
    }
}
