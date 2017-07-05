<?php
namespace AlgoWeb\xsdTypes\Facets;

trait PatternTrait
{
    /**
     * @Exclude
     * @var array defines the exact sequence of characters that are acceptable
     */
    private $pattern = array();

    /**
     * @param string $value
     */
    protected function setPatternFacet($value)
    {
        if (!$this->checkRegexValidPattern($value)) {
            $value = '/' . $value . '/';
            if (!$this->checkRegexValidPattern($value)) {
                throw new \InvalidArgumentException('Invalid regex pattern provided: ' . __CLASS__);
            }
        }
        $this->pattern[] = $value;
    }

    /**
     * @param string $value
     * @param mixed  $pattern
     */
    private function checkRegexValidPattern($pattern)
    {
        return (false === @preg_match($pattern, null));
    }

    /**
     * @param string $value
     * @param mixed  $v
     */
    private function checkPattern($v)
    {
        if (!empty($this->pattern)) {
            foreach ($this->pattern as $pattern) {
                if (!$this->matchesRegexPattern($pattern, $v)) {
                    throw new \InvalidArgumentException('Assigned value for ' . __CLASS__ . ' does not match pattern ' . $pattern);
                }
            }
        }
    }

    /**
     * Checks a pattern against a string.
     *
     * @param  string $pattern the regex pattern
     * @param  string $string  the string to check
     * @return bool   true if string matches pattern
     */
    private function matchesRegexPattern($pattern, $string)
    {
        $matches = null;
        return (1 == preg_match($pattern, $string, $matches) && $string == $matches[0]);
    }
}
