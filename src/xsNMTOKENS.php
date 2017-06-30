<?php
/**
 * Created by PhpStorm.
 * User: Barnso
 * Date: 30/06/2017
 * Time: 8:32 PM
 */

namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:NMTOKENS represents a list of NMTOKEN values separated by whitespace. There must be at least one NMTOKEN in the list.
 *
 * @package AlgoWeb\xsdTypes
 */
class xsNMTOKENS extends xsAnySimpleType
{
    /**
     * Construct
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setWhiteSpaceFacet("collapse");
        $this->setMinLengthFacet(1);

    }
    protected function fixValue($value)
    {
        if (is_string($value)) {
            $parts = explode(" ", $value);
            $value = [];
            foreach($parts as $part){
                $value[] = new xsnmtoken($part);
            }
        }
        foreach($value as $v){
            $v->fixValue($v);
        }
    }

    protected function isOK($value)
    {
        if (!is_array($value)) {
            throw new \InvalidArgumentException(
                "the provided value for " . __CLASS__ . " Must be an array of type xsNMTOKEN "
            );
        }
        foreach($value as $v){
            $v->isOKInternal();
        }
    }
}
