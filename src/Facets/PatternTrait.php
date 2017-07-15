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
     * @param bool   $multiCharacterEscape
     */
    protected function setPatternFacet($newPatternToAdd, $multiCharacterEscape = true)
    {
        if (null == self::$Letter) {
            self::init();
        }
        $newPatternToAdd = $this->processRegex($newPatternToAdd, $multiCharacterEscape);
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
     * @param bool   $multiCharacterEscape
     *
     * @return string
     */
    private function processRegex($patternToProcess, $multiCharacterEscape)
    {
        if (!$multiCharacterEscape) {
            return $patternToProcess;
        }
        if (null == self::$NameChar) {
            init();
        }
        $patternToProcess = $this->processRegexSlashS($patternToProcess);
        $patternToProcess = $this->processRegexSlashI($patternToProcess);
        $patternToProcess = $this->processRegexSlashC($patternToProcess);
        $patternToProcess = $this->processRegexSlashD($patternToProcess);
        $patternToProcess = $this->processRegexSlashW($patternToProcess);
        return $patternToProcess;
    }

    /**
     * @param string $patternToProcess
     *
     * @return string
     */
    private function processRegexSlashS($patternToProcess)
    {
        // Any character except those matched by '\s'.
        $patternToProcess = str_replace('\S', '[^\s]', $patternToProcess);
        // Whitespace, specifically '&#20;' (space), '\t' (tab), '\n' (newline) and '\r' (return).
        $patternToProcess = str_replace('\s', '([\x{20}\t\n\r])', $patternToProcess);
        return $patternToProcess;
    }

    /**
     * @param string $patternToProcess
     *
     * @return string
     */
    private function processRegexSlashI($patternToProcess)
    {
        // Any character except those matched by '\i'.
        $patternToProcess = str_replace('\I', '[^\i]', $patternToProcess);
        // The first character in an XML identifier. Specifically, any letter, the character '_', or the character ':',
        // See the XML Recommendation for the complex specification of a letter. This character represents a subset of
        // letter that might appear in '\c'.
        $patternToProcess = str_replace('\i-[:]', self::$Letter . '|_| ', $patternToProcess);
        $patternToProcess = str_replace('\i', '(' . self::$Letter . '|_|:)', $patternToProcess);
        return $patternToProcess;
    }

    /**
     * @param string $patternToProcess
     *
     * @return string
     */
    private function processRegexSlashC($patternToProcess)
    {
        // Any character except those matched by '\c'.
        $patternToProcess = str_replace('\C', '[^\c]', $patternToProcess);
        // Any character that might appear in the built-in NMTOKEN datatype.
        // See the XML Recommendation for the complex specification of a NameChar.
        $patternToProcess = str_replace('\c-[:]', self::$Letter . '|' . self::$Digit . '|.|-|_|' . self::$CombiningChar . '|'
            . self::$Extender, $patternToProcess);
        $patternToProcess = str_replace('\c', '(' . self::$NameChar . ')', $patternToProcess);
        return $patternToProcess;
    }

    /**
     * @param string $patternToProcess
     *
     * @return string
     */
    private function processRegexSlashD($patternToProcess)
    {
        // Any character except those matched by '\d'.
        $patternToProcess = str_replace('\D', '[^(\d)]', $patternToProcess);
        // Any Decimal digit. A shortcut for '\p{Nd}'.
        $patternToProcess = str_replace('\d', '\p{Nd)', $patternToProcess);
        return $patternToProcess;
    }

    /**
     * @param string $patternToProcess
     *
     * @return string
     */
    private function processRegexSlashW($patternToProcess)
    {
        // Any character except those matched by '\w'.
        $patternToProcess = str_replace('\W', '[^\w]', $patternToProcess);
        // Any character that might appear in a word. A shortcut for '[#X0000-#x10FFFF]-[\p{P}\p{Z}\p{C}]'
        // (all characters except the set of "punctuation", "separator", and "other" characters).
        $patternToProcess = str_replace('\w', '([\x{0000}-\x{10FFFF}]-[\p{P}\p{Z}\p{C}])',
            $patternToProcess);
        return $patternToProcess;
    }

    /**
     * @param string $pattern
     *
     * @return bool
     */
    private function checkRegexValidPattern($pattern)
    {
        return !(false === @preg_match($pattern, null));
    }

    /**
     * @param string $value
     */
    private function checkPattern($value)
    {
        if (!empty($this->pattern)) {
            foreach ($this->pattern as $pattern) {
                if (!$this->matchesRegexPattern($pattern, $value)) {
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
