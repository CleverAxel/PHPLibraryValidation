<?php

namespace App\Validation\Rules;

use App\Helper\NumberHelper;

class IntegerRule extends AbstractRule{

    public function __construct()
    {
        $this->setType("int");
    }

    public function isRuleValid(): bool
    {
        $this->setMessage("La valeur donnée doit être un nombre entier");

        return NumberHelper::isInteger($this->getValue());
    }
}