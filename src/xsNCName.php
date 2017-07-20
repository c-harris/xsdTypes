<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:NCName represents an XML non-colonized name, which is simply a name that does not contain colons.
 * An xsd:NCName value must start with either a letter or underscore (_) and may contain only letters, digits,
 * underscores (_), hyphens (-), and periods (.).  This is equivalent to the Name type, except that colons are not
 * permitted.
 *
 * @package AlgoWeb\xsdTypes
 */
class xsNCName extends xsName
{
    /**
     * Construct.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setPatternFacet('(\i-[:]\c-[:])[^:-:]*');
    }

    protected function isOK()
    {
        parent::isOK();
        if (in_array($this->value[0], ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '.', '-'])) {
            throw new \InvalidArgumentException('NCName cannot begin with a number, dot or minus character although' .
                ' they can appear later in an NCName.');
        }
    }
}
