<?php

namespace App\Validation\Rules;

use App\Helper\DateTimeHelper;

class TimeRule extends AbstractRule{
    private string $format = "H:i";

    public function validateRule(mixed $value): bool
    {
        $this->setValue($value);
        $this->setMessage("L'heure donnée n'est pas valide.");
        
        if(!is_string($value)){
            return false;
        }
        
        return DateTimeHelper::validateTime($value, $this->format);
    }
}