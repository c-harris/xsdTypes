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
     * @return TRUE when the URI is valid, FALSE when invalid
     */
    public static function validate($uri)
    {
        return (bool)preg_match(self::URI_REGEXP, $uri);
    }
}