<?php

namespace app;

class RomanConverter
{
    private $conversionResult = '';
    private $conversionType = '';
    private $error = '';

    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->conversionType = filter_input(INPUT_POST, 'conversion_type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $inputValue = trim(filter_input(INPUT_POST, 'input_value', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

            if(strlen($inputValue) < 1){
                $this->error = 'Número inválido.';
                return;
            }

            if ($this->conversionType === 'roman_to_integer') {
                if (!Validator::hasValidateRomanFormat($inputValue)) {
                    $this->error = 'Número romano inválido.';
                } else {
                    $this->conversionResult = RomanNumerals::fromRoman($inputValue);
                }
            } elseif ($this->conversionType === 'integer_to_roman') {
                if (!Validator::hasValidIntegerFormat($inputValue)) {
                    $this->error = 'Número inválido.';
                } else {
                    $inputValue = intval($inputValue);
                    $this->conversionResult = RomanNumerals::toRoman($inputValue);
                }
            }
        }
    }

    public function getConversionResult()
    {
        return $this->conversionResult;
    }

    public function getConversionType()
    {
        return $this->conversionType;
    }

    public function getError()
    {
        return $this->error;
    }
}
