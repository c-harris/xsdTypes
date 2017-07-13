<?php
namespace AlgoWeb\xsdTypes\Facets;

trait PatternTrait
{
    use XMLPatterns;
    /**
     * @Exclude
     * @var array defines the exact sequence of characters that are acceptable
     */
    public $pattern = array();

    /**
     * @param string $newPatternToAdd
     * @param mixed  $processMultiCharacterEscape
     */
    protected function setPatternFacet($newPatternToAdd, $processMultiCharacterEscape = true)
    {
        if (null == self::$Letter) {
            self::init();
        }
        $newPatternToAdd = $this->processRegex($newPatternToAdd, $processMultiCharacterEscape);
        if (!$this->checkRegexValidPattern($newPatternToAdd)) {
            $newPatternToAdd = '/' . $newPatternToAdd . '/u';
            if (!$this->checkRegexValidPattern($newPatternToAdd)) {
                throw new \InvalidArgumentException('Invalid regex pattern provided: ' . get_class($this) .
                    'pattern is: ' . $newPatternToAdd);
            }
        }
        $this->pattern[] = $newPatternToAdd;
    }

    /**
     * @param string $patternToProcess
     * @param mixed  $processMultiCharacterEscape
     *
     * @return string
     */
    private function processRegex($patternToProcess, $processMultiCharacterEscape)
    {
        if (!$processMultiCharacterEscape) {
            return $patternToProcess;
        }
        if (null == self::$NameChar) {
            init();
        }

        $patternToProcess = str_replace('\S', '[^\s]', $patternToProcess);
        $patternToProcess = str_replace('\s', '[\x{20}\t\n\r]', $patternToProcess);
        $patternToProcess = str_replace('\I', '[^\i]', $patternToProcess);
        $patternToProcess = str_replace('\i', self::$Letter . '|_|:', $patternToProcess);
        $patternToProcess = str_replace('\c', self::$NameChar, $patternToProcess);
        $patternToProcess = str_replace('\D', '[^\d]', $patternToProcess);
        $patternToProcess = str_replace('\d', '\p{Nd)', $patternToProcess);
        $patternToProcess = str_replace('\W', '[^\w]', $patternToProcess);
        $patternToProcess = str_replace('\w', '[\x{0000}-\x{10FFFF}]-[\p{P}\p{Z}\p{C}]', $patternToProcess);
        return $patternToProcess;
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
