<?php

namespace App\Validation\Rules;

use App\Helper\NumberHelper;
use App\Validation\Rules\AbstractRule;

class MinRule extends AbstractRule{
    private float $minValue;

    public function __construct(float $minValue)
    {
        $this->setType("float");
        $this->minValue = $minValue;
    }

    public function validateRule(mixed $value): bool
    {
        $this->setValue($value);
        $this->setMessage("La valeur ne peut pas être plus petite que : " . $this->minValue);

        if(NumberHelper::isFloat($value) == false || (float)$value < $this->minValue){
            return false;
        }

        return true;
    }
}