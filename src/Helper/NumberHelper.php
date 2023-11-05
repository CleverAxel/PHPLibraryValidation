<?php
namespace App\Helper;

class NumberHelper{
    public static function isInteger(mixed $value){
        if(!is_numeric($value))
            return false;

        return (bool)preg_match("/^[+-]?\d+$/", (string)$value);
    }

    public static function isFloat(mixed $value){
        if(!is_numeric($value))
            return false;

        return (bool)preg_match("/^[+-]?([0-9]*[.])?[0-9]+$/", (string)$value);
    }
    
}