<?php
namespace AlgoWeb\xsdTypes\Facets;

trait WhiteSpaceTrait
{
    /**
     * @Exclude
     * @var string specifies how whitespace (line feeds, tabs, spaces, and carriage returns) is handled
     */
    private $whiteSpace = 'preserve';

    /**
     * Changes the input value in accordance with the defined white space handler.
     * @param  string $val
     * @return string
     */
    protected function fixWhitespace($val)
    {
        switch ($this->whiteSpace) {
            case 'preserve':
                return $val;
            case 'replace':
                return preg_replace('/\s/', ' ', $val);
            case 'collapse':
                return trim(preg_replace('/\s+/', ' ', $val));
        }
        return '';
    }

    /**
     * @param string $value
     */
    protected function setWhiteSpaceFacet($value)
    {
        if (!in_array($value, ['preserve', 'replace', 'collapse'])) {
            throw new \InvalidArgumentException('Invalid whitespace handling method ' . get_class($this));
        }
        $this->whiteSpace = $value;
    }
}
