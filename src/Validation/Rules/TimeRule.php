<?php

namespace App\Validation\Rules;

use App\Helper\DateTimeHelper;

class TimeRule extends AbstractRule{
    private string $format = "H:i";

    public function validateRule(mixed $value): bool
    {
        $this->setValue($value);
        $this->setMessage("L'heure donnée n'est pas valide.");
        return DateTimeHelper::validateTime($value, $this->format);
    }
}