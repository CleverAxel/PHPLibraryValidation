<?php

namespace App\Validation\Rules;

use App\Helper\NumberHelper;

class MaxRule extends AbstractRule{
    private float $maxValue;

    public function __construct(float $maxValue)
    {
        $this->setType("float");
        $this->maxValue = $maxValue;
    }

    public function validateRule(mixed $value): bool
    {
        $this->setValue($value);
        $this->setMessage("La valeur ne peut pas être plus grande que : " . $this->maxValue);

        if(NumberHelper::isFloat($value) == false || (float)$value > $this->maxValue){
            return false;
        }

        return true;
    }
}