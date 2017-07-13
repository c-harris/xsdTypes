<?php

namespace Tests\AlgoWeb\xsdTypes\Facets;

use PHPUnit_Framework_TestCase;

class WhiteSpaceTraitTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider testWhiteSpacePreserveDataProvider
     *
     * @param string $input
     * @param string $expected
     */
    public function testWhiteSpacePreserve($input, $expected)
    {
        $mock = $this->getMockForTrait('AlgoWeb\xsdTypes\Facets\WhiteSpaceTrait');
        $this->invokeMethod($mock, 'setWhiteSpaceFacet', ["preserve"]);
        $fixed = $this->invokeMethod($mock, "fixWhitespace", [$input]);
        $this->assertEquals($expected, $fixed);
    }

    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    public function testWhiteSpacePreserveDataProvider()
    {
        return array(
            array("\t\n", "\t\n"),
            array(" \r\n string \t more string \n", " \r\n string \t more string \n"),
            array("stop\thammer\r\ntime", "stop\thammer\r\ntime"),
        );
    }

    /**
     * @dataProvider testWhiteSpaceReplaceDataProvider
     *
     * @param string $input
     * @param string $expected
     */
    public function testWhiteSpaceReplace($input, $expected)
    {
        $mock = $this->getMockForTrait('AlgoWeb\xsdTypes\Facets\WhiteSpaceTrait');
        $this->invokeMethod($mock, 'setWhiteSpaceFacet', ["replace"]);
        $fixed = $this->invokeMethod($mock, "fixWhitespace", [$input]);
        $this->assertEquals($expected, $fixed);
    }

    public function testWhiteSpaceReplaceDataProvider()
    {
        return array(
            array("\t \n", "   "),
            array("stop\thammer\r\ntime", "stop hammer  time"),
        );
    }

    /**
     * @dataProvider testWhiteSpaceCollapseDataProvider
     *
     * @param string $input
     * @param string $expected
     */
    public function testWhiteSpaceCollapse($input, $expected)
    {
        $mock = $this->getMockForTrait('AlgoWeb\xsdTypes\Facets\WhiteSpaceTrait');
        $this->invokeMethod($mock, 'setWhiteSpaceFacet', ["collapse"]);
        $fixed = $this->invokeMethod($mock, "fixWhitespace", [$input]);
        $this->assertEquals($expected, $fixed);
    }

    public function testWhiteSpaceCollapseDataProvider()
    {
        return array(
            array("\t \n", ""),
            array("stop\thammer\r\ntime", "stop hammer time"),
        );
    }
}
