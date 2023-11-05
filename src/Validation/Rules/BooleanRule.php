<?php

namespace App\Validation\Rules;

class BooleanRule extends AbstractRule{
    public function __construct()
    {
        $this->setType("bool");
    }
    public function validateRule(mixed $value): bool
    {
        $this->setValue($value);
        $this->setMessage("La valeur booléenne n'est pas correct.");
        return in_array($value, ["1", "0", 1, 0, true, false, "true", "false"]);
    }
}