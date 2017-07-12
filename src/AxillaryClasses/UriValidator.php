<?php

namespace AlgoWeb\xsdTypes\AxillaryClasses;


class UriValidator
{
    const URI_REGEXP = '/^(([^:\/?#]+):)?(\/\/([^\/?#]*))?([^?#]*)(\?([^#]*))?(#?(.*))?/';

    /**
     * Validate a URI according to RFC 3986 (+errata)
     * (See: http://www.rfc-editor.org/errata_search.php?rfc=3986)
     *
     * @param string $uri the URI to validate
     *
     * @return boolean TRUE when the URI is valid, FALSE when invalid
     */
    public static function validate($uri)
    {
        if (substr_count($uri, '#') > 1) {
            return false;
        }
        if (filter_var($uri, FILTER_VALIDATE_URL) !== false) {
            return true;
        }
        $lastPos = 0;
        while (($lastPos = strpos($uri, '%', $lastPos)) !== false) {
            if (!(ctype_xdigit($uri[$lastPos + 1]) && ctype_xdigit($uri[$lastPos + 2]))) {
                return false;
            }
            $lastPos = $lastPos + strlen('%');
        }
        return (bool)preg_match(self::URI_REGEXP, $uri);
    }
}