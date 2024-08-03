<?php

namespace app;

class RomanNumerals
{
    private static $decimals = [1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1];
    private static $romans = ['M', 'CM', 'D', 'CD', 'C', 'XC', 'L', 'XL', 'X', 'IX', 'V', 'IV', 'I'];

    public static function fromRoman(string $str): int
    {   
        $str = mb_strtoupper($str);
        $result = 0;
        $i = 0;
        $length = strlen($str);

        while ($i < $length) {
            if ($i + 1 < $length && in_array(substr($str, $i, 2), self::$romans)) {
                $result += self::$decimals[array_search(substr($str, $i, 2), self::$romans)];
                $i += 2;
            } else {
                $result += self::$decimals[array_search(substr($str, $i, 1), self::$romans)];
                $i += 1;
            }
        }

        return $result;
    }

    public static function toRoman(int $num): string
    {
        $result = '';
        foreach (self::$decimals as $index => $value) {
            while ($num >= $value) {
                $result .= self::$romans[$index];
                $num -= $value;
            }
        }
        return $result;
    }
}
