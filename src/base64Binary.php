<?php

namespace AlgoWeb\xsdTypes;

/*
 * The value space of xsd:base64Binary is the set of arbitrary binary contents.
 * Its lexical space is the same set after base64 coding. This coding is described in Section 6.8 of RFC 2045.
 */
class base64Binary extends SimpleTypeBase
{
    /**
     * Construct
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->whiteSpaceHandle = "collapse";
        // In base64 encoding, the character set is [A-Z, a-z, 0-9, and + /].
        // If the rest length is less than 4, the string is padded with '=' characters.
        // ^([A-Za-z0-9+/]{4})* means the string starts with 0 or more base64 groups
        // ([A-Za-z0-9+/]{4}|[A-Za-z0-9+/]{3}=|[A-Za-z0-9+/]{2}==)$
        // means the string ends in one of three forms: [A-Za-z0-9+/]{4}, [A-Za-z0-9+/]{3}= or [A-Za-z0-9+/]{2}==
        //$this->pattern = "/^([A-Za-z0-9+/]{4})*([A-Za-z0-9+/]{4}|[A-Za-z0-9+/]{3}=|[A-Za-z0-9+/]{2}==)$/";
        parent::__construct($value);
    }
    // RFC 2045 describes the transfer of binary contents over text-based mail systems.
    // It imposes a line break at least every 76 characters to avoid the inclusion of
    // arbitrary line breaks by the mail systems. Sending base64 content without line breaks is
    // nevertheless a common usage for applications such as SOAP and the W3C XML Schema Working Group.
    // After a request from other W3C Working Groups, the W3C XML Schema Working Group decided to
    // remove the obligation to include these line breaks from the constraints on the lexical space.
    // (This decision was made after the publication of the W3C XML Schema Recommendation.
    // It is now noted in the errata.)
    //TODO: we could probably add more checks to a base64 encoded string see commented pattern
    protected function isValid($v)
    {
        if (!is_scalar($v) && !is_string($v)) {
            throw new \InvalidArgumentException("you must assign a valid value to base64Binary " . __CLASS__);
        }
    }
}
