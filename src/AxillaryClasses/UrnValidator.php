<?php

namespace AlgoWeb\xsdTypes\AxillaryClasses;

class UrnValidator
{
    const URN_REGEXP = '/^urn:[a-z0-9][a-z0-9-]{1,31}:([a-z0-9()+,-.:=@;$_!*\']|%(0[1-9a-f]|[1-9a-f][0-9a-f]))+$/i';

    /**
     * Validate a URN according to RFC 2141.
     *
     * @param string $urn the URN to validate
     *
     * @return bool TRUE when the URN is valid, FALSE when invalid
     */
    public static function validate($urn)
    {
        return (bool)preg_match(self::URN_REGEXP, $urn);
    }
}
