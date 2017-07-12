<?php

namespace AlgoWeb\xsdTypes\AxillaryClasses;

class XMLDateInterval
{
    /**
     * formating string like ISO 8601 (PnYnMnDTnHnMnS).
     */
    const INTERVAL_ISO8601 = 'P%yY%mM%dDT%hH%iM%sS';
    public $pattern = 'PnYnMnDTnHnMnS';

    /**
     * formating the interval like ISO 8601 (PnYnMnDTnHnMnS).
     *
     * @return string
     */
    public function __toString()
    {
        $sReturn = '';
        for ($i = 0; $i < strlen($this->pattern); $i++) {
            if ($this->pattern[$i] == 'n') {
                $v = strtolower($this->pattern[$i + 1]);
                $sReturn .= $this->$v;
                continue;
            }
            $sReturn .= $this->pattern[$i];
        }
        return $sReturn;
    }
}
