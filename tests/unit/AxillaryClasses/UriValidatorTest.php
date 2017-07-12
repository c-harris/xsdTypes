<?php
/**
 * Created by PhpStorm.
 * User: Barnso
 * Date: 12/07/2017
 * Time: 8:46 PM
 */

namespace AlgoWeb\xsdTypes\AxillaryClasses;


class UriValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validUriProvider
     */
    public function testValidUri($Uri)
    {
        $this->assertEquals(TRUE, UriValidator::validate($Uri));
    }

    /**
     * @dataProvider invalidUriProvider
     */
    public function testInvalidUri($Uri)
    {
        $this->assertEquals(FALSE, UriValidator::validate($Uri));
    }

    public function validUriProvider()
    {
        return array(
            array('http://datypic.com', 'http://datypic.com', 'absolute URI (also a URL)'),
            array('mailto:info@datypic.com', 'mailto:info@datypic.com', 'absolute URI'),
            array('../%C3%A9dition.html', '../%C3%A9dition.html', 'relative URI containing escaped non-ASCII character'),
            array('../édition.html', '../édition.html', 'relative URI containing unescaped non-ASCII character'),
            array('http://datypic.com/prod.html#shirt', 'http://datypic.com/prod.html#shirt', 'URI with fragment identifier'),
            array('../prod.html#shirt', 'relative URI with fragment identifier'),
        );
    }

    public function invalidUriProvider()
    {
        return array(
            array("http://datypic.com#frag1#frag2"),
            array("http://datypic.com#f% rag"),
        );
    }
}
