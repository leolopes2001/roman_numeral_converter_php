<?php

use PHPUnit\Framework\TestCase;
use app\RomanNumerals;

class RomanNumeralsTest extends TestCase
{
    public function testFromRoman()
    {
        $this->assertEquals(1, RomanNumerals::fromRoman('I'));
        $this->assertEquals(4, RomanNumerals::fromRoman('IV'));
        $this->assertEquals(9, RomanNumerals::fromRoman('IX'));
        $this->assertEquals(58, RomanNumerals::fromRoman('LVIII'));
        $this->assertEquals(1994, RomanNumerals::fromRoman('MCMXCIV'));
    }

    public function testToRoman()
    {
        $this->assertEquals('I', RomanNumerals::toRoman(1));
        $this->assertEquals('IV', RomanNumerals::toRoman(4));
        $this->assertEquals('IX', RomanNumerals::toRoman(9));
        $this->assertEquals('LVIII', RomanNumerals::toRoman(58));
        $this->assertEquals('MCMXCIV', RomanNumerals::toRoman(1994));
    }
}
