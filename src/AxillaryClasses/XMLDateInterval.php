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

    public function __construct($intervalSpec, $pattern = 'PnYnMnDTnHnMnS')
    {
        parent::__construct(trim($intervalSpec, '-'));
        if ($intervalSpec[0] == '-') {
            $this->invert = 1;
        }
        $this->pattern = trim($pattern);
        $this->patternLen = strlen($this->pattern);
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
}
