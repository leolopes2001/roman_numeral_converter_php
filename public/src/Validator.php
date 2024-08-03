<?php

namespace app;

class Validator
{
    private static $romanRegex = '/^M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/';

    public static function hasValidateRomanFormat(string $value): bool
    {
        return preg_match(self::$romanRegex, mb_strtoupper($value));
    }

    public static function hasValidIntegerFormat(string $value): bool
    {
        return (bool) preg_match('/^-?[0-9]+$/', $value);
    }
}
