<?php

namespace App\Validation\Rules;

use App\Helper\NumberHelper;

class FloatRule extends AbstractRule{

    public function __construct()
    {
        $this->setType("float");
    }

    public function isRuleValid(): bool
    {
        $this->setMessage("La valeur donnée doit être un nombre à virgule");
        return NumberHelper::isFloat($this->getValue());
    }
}