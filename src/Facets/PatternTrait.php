<?php
namespace AlgoWeb\xsdTypes\Facets;

trait PatternTrait
{
    use XMLPatterns;
    /**
     * @Exclude
     * @var array defines the exact sequence of characters that are acceptable
     */
    private $pattern = array();

    /**
     * @param string $regexPatternToAdd
     * @param mixed  $ProcessMultiCharacterEscape
     */
    protected function setPatternFacet($regexPatternToAdd, $ProcessMultiCharacterEscape = true)
    {
        if (null == self::$Letter) {
            self::init();
        }
        $regexPatternToAdd = $this->ProcessRegex($regexPatternToAdd, $ProcessMultiCharacterEscape);
        if (!$this->checkRegexValidPattern($regexPatternToAdd)) {
            $regexPatternToAdd = '/' . $regexPatternToAdd . '/';
            if (!$this->checkRegexValidPattern($regexPatternToAdd)) {
                throw new \InvalidArgumentException('Invalid regex pattern provided: ' . get_class($this));
            }
        }
        $this->pattern[] = $regexPatternToAdd;
    }

    /**
     * @param string $regexPattern
     * @param mixed  $ProcessMultiCharacterEscape
     *
     * @return string
     */
    private function ProcessRegex($regexPattern, $ProcessMultiCharacterEscape)
    {
        if (!$ProcessMultiCharacterEscape) {
            return $regexPattern;
        }
        if (null == self::$NameChar) {
            init();
        }
        
        $regexPattern = str_replace('\S', '[^\s]', $regexPattern);
        $regexPattern = str_replace('\s', '[\x{20}\t\n\r]', $regexPattern);
        $regexPattern = str_replace('\I', '[^\i]', $regexPattern);
        $regexPattern = str_replace('\i', self::$Letter . '|_|:', $regexPattern);
        $regexPattern = str_replace('\c', self::$NameChar, $regexPattern);
        $regexPattern = str_replace('\D', '[^\d]', $regexPattern);
        $regexPattern = str_replace('\d', '\p{Nd}', $regexPattern);
        $regexPattern = str_replace('\W', '[^\w]', $regexPattern);
        $regexPattern = str_replace('\w', '[\x{0000}-\x{10FFFF}]-[\p{P}\p{Z}\p{C}] ', $regexPattern);
        return $regexPattern;
    }

    /**
     * @param string $pattern
     */
    private function checkRegexValidPattern($pattern)
    {
        return !(false === @preg_match($pattern, null));
    }

    /**
     * @param string $v
     */
    private function checkPattern($v)
    {
        if (!empty($this->pattern)) {
            foreach ($this->pattern as $pattern) {
                if (!$this->matchesRegexPattern($pattern, $v)) {
                    throw new \InvalidArgumentException('Assigned value for ' . get_class($this) .
                        ' does not match pattern ' . $pattern);
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
