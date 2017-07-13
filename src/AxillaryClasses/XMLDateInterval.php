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

    public function __construct($interval_spec, $pattern = 'PnYnMnDTnHnMnS')
    {
        parent::__construct($interval_spec);

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
        $sReturn = '';
        $tSeen = false;
        for ($i = 0; $i < $this->patternLen; $i++) {
            switch ($this->pattern[$i]) {
                case 'n':
                    $v = ($this->pattern[$i + 1] == 'M' && $tSeen) ? 'i' : strtolower($this->pattern[$i + 1]);
                    $sReturn .= $this->$v;
                    break;
                case 'T':
                    $tSeen = true;
                    $sReturn .= 'T';
                    break;
                default:
                    $sReturn .= $this->pattern[$i];
            }
        }
        return $sReturn;
    }
}
