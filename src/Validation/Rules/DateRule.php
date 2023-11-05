<?php

namespace App\Validation\Rules;

use App\Helper\DateTimeHelper;

class DateRule extends AbstractRule{

    private string $format;

    public function __construct($format= "Y/m/d")
    {
        $this->format = $format;
        $this->setMessage("La date donnée n'est pas valide");
    }

    public function validateRule(mixed $value): bool
    {
        $this->setValue($value);
        return DateTimeHelper::validateDate($value, $this->format);
    }
    
}