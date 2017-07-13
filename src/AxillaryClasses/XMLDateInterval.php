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
        if ($intervalSpec[0] == '-') {
            $intervalSpec = substr($intervalSpec, 1);
            $this->invert = true;
        }
        parent::__construct($intervalSpec);
        $this->pattern = trim($pattern);

        $this->patternLen = strlen($this->pattern);
    }

    /**
     * formating the interval like ISO 8601 (PnYnMnDTnHnMnS).
     *
     * @return string
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

    private function handleSign()
    {
        if ($this->invert === 1) {
            return '-';
        }
    }

    private function handleChar($i, &$tSeen)
    {
        switch ($this->pattern[$i]) {
            case 'n':
                $v = ($this->pattern[$i + 1] == 'M' && $tSeen) ? 'i' : strtolower($this->pattern[$i + 1]);
                return $this->$v;
            case 'T':
                $tSeen = true;
                return 'T';
            default:
                return $this->pattern[$i];
        }
    }
}
