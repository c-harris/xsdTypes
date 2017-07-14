<?php

namespace Tests\AlgoWeb\xsdTypes;

use PHPUnit_Framework_TestCase;

class scratchTest extends PHPUnit_Framework_TestCase
{
    public function testRegexForDayMonth()
    {
        /**
         * '--(1[0-2]|0[1-9]|[1-9])-(0[1-9]|1[0-9]|2[0-9]|3[0-1]|[1-9])([-+][0-1]\d:[0-6]\d|Z*)'
         * -- matches the characters -- literally (case sensitive)
         * 1st Capturing Group (1[0-2]|0[1-9]|[1-9])
         *** 1st Alternative 1[0-2]
         ***** 1 matches the character 1 literally (case sensitive)
         ***** Match a single character present in the list below [0-2]
         *        0-2 a single character in the range between 0 (index 48) and 2 (index 50) (case sensitive)
         *** 2nd Alternative 0[1-9]
         ***** 0 matches the character 0 literally (case sensitive)
         ***** Match a single character present in the list below [1-9]
         *        1-9 a single character in the range between 1 (index 49) and 9 (index 57) (case sensitive)
         *** 3rd Alternative [1-9]
         ***** Match a single character present in the list below [1-9]
         *        1-9 a single character in the range between 1 (index 49) and 9 (index 57) (case sensitive)
         * - matches the character - literally (case sensitive)
         * 2nd Capturing Group (0[1-9]|1[0-9]|2[0-9]|3[0-1]|[1-9])
         *** 1st Alternative 0[1-9]
         ***** 0 matches the character 0 literally (case sensitive)
         ***** Match a single character present in the list below [1-9]
         *        1-9 a single character in the range between 1 (index 49) and 9 (index 57) (case sensitive)
         *** 2nd Alternative 1[0-9]
         ***** 1 matches the character 1 literally (case sensitive)
         ***** Match a single character present in the list below [0-9]
         *        0-9 a single character in the range between 0 (index 48) and 9 (index 57) (case sensitive)
         *** 3rd Alternative 2[0-9]
         ***** 2 matches the character 2 literally (case sensitive)
         ***** Match a single character present in the list below [0-9]
         *        0-9 a single character in the range between 0 (index 48) and 9 (index 57) (case sensitive)
         *** 4th Alternative 3[0-1]
         ***** 3 matches the character 3 literally (case sensitive)
         ***** Match a single character present in the list below [0-1]
         *        0-1 a single character in the range between 0 (index 48) and 1 (index 49) (case sensitive)
         *** 5th Alternative [1-9]
         ***** Match a single character present in the list below [1-9]
         *        1-9 a single character in the range between 1 (index 49) and 9 (index 57) (case sensitive)
         * 3rd Capturing Group ([-+][0-1]\d:[0-6]\d|Z*)
         *** 1st Alternative [-+][0-1]\d:[0-6]\d
         ***** Match a single character present in the list below [-+]
         *        -+ matches a single character in the list -+ (case sensitive)
         ***** Match a single character present in the list below [0-1]
         *        0-1 a single character in the range between 0 (index 48) and 1 (index 49) (case sensitive)
         ***** \d matches a digit (equal to [0-9])
         ***** : matches the character : literally (case sensitive)
         ***** Match a single character present in the list below [0-6]
         * 0-6 a single character in the range between 0 (index 48) and 6 (index 54) (case sensitive)
         *        \d matches a digit (equal to [0-9])
         *** 2nd Alternative Z*
         ***** Z* matches the character Z literally (case sensitive)
         ***** Quantifier — Matches between zero and unlimited times, as many times as possible, giving back as needed
         *        (greedy)
         */
        $re = '/--(1[0-2]|0[1-9]|[1-9])-(0[1-9]|1[0-9]|2[0-9]|3[0-1]|[1-9])([-+][0-1]\d:[0-6]\d|Z*)/';
        $str = '--12-25Z';

        preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
        $this->assertEquals(1, count($matches));
        $this->assertEquals('--12-25Z', $matches[0][0]);
        $this->assertEquals('12', $matches[0][1]);
        $this->assertEquals('25', $matches[0][2]);
        $this->assertEquals('Z', $matches[0][3]);

        $str = '--12-25+10:30';

        preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
        $this->assertEquals(1, count($matches));
        $this->assertEquals('--12-25+10:30', $matches[0][0]);
        $this->assertEquals('12', $matches[0][1]);
        $this->assertEquals('25', $matches[0][2]);
        $this->assertEquals('+10:30', $matches[0][3]);

        $str = '--12-25-08:30';

        preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
        $this->assertEquals(1, count($matches));
        $this->assertEquals('--12-25-08:30', $matches[0][0]);
        $this->assertEquals('12', $matches[0][1]);
        $this->assertEquals('25', $matches[0][2]);
        $this->assertEquals('-08:30', $matches[0][3]);

        $str = '--12-25';

        preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
        $this->assertEquals(1, count($matches));
        $this->assertEquals('--12-25', $matches[0][0]);
        $this->assertEquals('12', $matches[0][1]);
        $this->assertEquals('25', $matches[0][2]);
        $this->assertEquals('', $matches[0][3]);
    }
}
