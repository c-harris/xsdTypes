<?php
/**
 * Created by PhpStorm.
 * User: Barnso
 * Date: 30/06/2017
 * Time: 8:29 PM
 */

namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:NMTOKEN represents a single string token. xsd:NMTOKEN values may consist of letters, digits, periods (.), hyphens (-), underscores (_), and colons (:). They may start with any of these characters. xsd:NMTOKEN has a whiteSpace facet value of collapse, so any leading or trailing whitespace will be removed. However, no whitespace may appear within the value itself.
 *
 * @package AlgoWeb\xsdTypes
 */
class xsNMTOKEN extends xsToken
{
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setPatternFacet("\c+");
    }
}
