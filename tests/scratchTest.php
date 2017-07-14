<?php

namespace Tests\AlgoWeb\xsdTypes;

use PHPUnit_Framework_TestCase;

class scratchTest extends PHPUnit_Framework_TestCase
{
    public function testRegexForDayMonth()
    {
        $re = '/--(\d\d)-(\d\d)([-+][0-1]\d:[0-6]\d|Z*)/';
        $str = '--20-50Z';

        preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
        $this->assertEquals(1, count($matches));
        $this->assertEquals('--20-50Z', $matches[0][0]);
        $this->assertEquals('20', $matches[0][1]);
        $this->assertEquals('50', $matches[0][2]);
        $this->assertEquals('Z', $matches[0][3]);

        $str = '--20-50+10:30';

        preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
        $this->assertEquals(1, count($matches));
        $this->assertEquals('--20-50+10:30', $matches[0][0]);
        $this->assertEquals('20', $matches[0][1]);
        $this->assertEquals('50', $matches[0][2]);
        $this->assertEquals('+10:30', $matches[0][3]);

        $str = '--20-50-08:30';

        preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
        $this->assertEquals(1, count($matches));
        $this->assertEquals('--20-50-08:30', $matches[0][0]);
        $this->assertEquals('20', $matches[0][1]);
        $this->assertEquals('50', $matches[0][2]);
        $this->assertEquals('-08:30', $matches[0][3]);
    }
}
