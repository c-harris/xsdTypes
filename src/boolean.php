<?php

namespace AlgoWeb\xsdTypes;

/**
 * The value space of xsd:boolean is true and false. Its lexical space accepts true, false, and also 1 (for true) and 0 (for false).
 * @package AlgoWeb\xsdTypes
 */
class boolean
{
    /**
     * Construct
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->whiteSpace = "replace";
        parent::__construct($value);
    }

    protected function fixValue($v)
    {
        if (is_bool($v)) {
            return $v;
        }
        $v = parent::fixValue($v);
        if (is_string($v)) {
            $v = trim($v);
        }
        if ($v == 0 || $v == 1) {
            return (bool)$v;
        }
        if (0 === strcasecmp($v, "true")) {
            return true;
        }
        if (0 === strcasecmp($v, "false")) {
            return false;
        }
        return $v;
    }

    //This datatype can't be localized—for instance, it can't accept the French vrai and faux instead of the English true and false.

    protected function isValid($v)
    {
        if ($v === true || $v === false) {
            return;
        }
        throw new \InvalidArgumentException("invalid assignment to boolean" . __CLASS__);
    }
}
