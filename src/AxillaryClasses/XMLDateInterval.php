<?php

namespace AlgoWeb\xsdTypes\AxillaryClasses;

class XMLDateInterval extends \DateInterval
{
    /**
     * formating string like ISO 8601 (PnYnMnDTnHnMnS).
     */
    const INTERVAL_ISO8601 = 'P%yY%mM%dDT%hH%iM%sS';
    private $pattern;
    private $patternLen;

    private $fractionOfSecond;

    public function __construct($intervalSpec, $pattern = 'PnYnMnDTnHnMnS')
    {
        if (-1 === version_compare(PHP_VERSION, '7.1.0')) {
            $intervalSpec = $this->handleFractionOfSecond($intervalSpec);
        }
        parent::__construct(trim($intervalSpec, '-'));
        if ($intervalSpec[0] == '-') {
            $this->invert = 1;
        }
        $this->pattern = trim($pattern);
        $this->patternLen = strlen($this->pattern);
    }

    private function handleFractionOfSecond($intervalSpec)
    {
        $re = '/(?:[0-5][0-9]|60)(.\d+)S/';
        preg_match_all($re, $intervalSpec, $matches, PREG_SET_ORDER, 0);
        if (1 != count($matches) || strpos($intervalSpec, '.') === false) {
            return $intervalSpec;
        }
        $this->fractionOfSecond = trim($matches[0][1], '.');
        return str_replace($matches[0][1], '', $intervalSpec);
    }

    /**
     * formating the interval like ISO 8601 (PnYnMnDTnHnMnS).
     *
     * @return string|null
     */
    public function __toString()
    {
        $sReturn = $this->handleSign();
        $tSeen = false;
        for ($i = 0; $i < $this->patternLen; $i++) {
            $sReturn .= $this->handleChar($i, $tSeen);
        }
        return $sReturn;
    }

    /**
     * @return string
     */
    private function handleSign()
    {
        if ($this->invert === 1) {
            return '-';
        }
        return '';
    }

    /**
     * @param int  $i
     * @param bool $tSeen
     *
     * @return string
     */
    private function handleChar($i, &$tSeen)
    {
        switch ($this->pattern[$i]) {
            case 'n':
                return $this->handleN($i, $tSeen);
            case 'T':
                return $this->handleT($tSeen);
            default:
                return $this->handleOther($i);
        }
    }

    /**
     * @param int  $i
     * @param bool $tSeen
     *
     * @return string
     */
    private function handleN($i, $tSeen)
    {
        $componentProperty = ($this->pattern[$i + 1] == 'M' && $tSeen) ? 'i' : strtolower($this->pattern[$i + 1]);
        if ('s' === $componentProperty) {
            return $this->f === 0 ? $this->$componentProperty : trim($this->$componentProperty . '.' . $this->f, '.');
        }
        return $this->$componentProperty;
    }

    /**
     * @param bool $tSeen
     *
     * @return string
     */
    private function handleT(&$tSeen)
    {
        $tSeen = true;
        return 'T';
    }

    /**
     * @param int $i
     *
     * @return string
     */
    private function handleOther($i)
    {
        return $this->pattern[$i];
    }

    public function __get($name)
    {
        if ($name == 'f') {
            return $this->fractionOfSecond;
        }
    }
}
