<?php

namespace AlgoWeb\xsdTypes;

/*
 * This datatype corresponds normatively to the XLink href attribute.
 * Its value space includes the URIs defined by RFCs 2396 and 2732, but its lexical space doesn't require the character
 * escapes needed to include non-ASCII characters in a URIs.
 */
class anyURI extends SimpleTypeBase
{// TODO: Relative URIs aren't absolutized by the W3C XML Schema.
    // The Recommendation states that "it is impractical for processors to check that a value is
    // a context-appropriate URI reference," thus freeing schema processors from having to validate
    // the correctness of the URI.
    // But i think we should.
    protected function isValid($v)
    {
        if (!is_scalar($v) && !is_string($v)) {
            throw new \InvalidArgumentException("you must assign a valid uri to anyURI " . __CLASS__);
        }

    }
}
