<?php

namespace App\Validation\Rules;

use App\Helper\DateTimeHelper;

class TimeRule extends AbstractRule{
    private string $format;
    /**
     * H -> pour les heures
     * i -> pour les minutes
     * s -> pour les secondes
     */
    public function __construct($format= "H:i:s")
    {
        $this->format = $format;
    }

    public function validateRule(mixed $value): bool
    {
        $this->setValue($value);
        $this->setMessage("L'heure donnée n'est pas valide.");
        return DateTimeHelper::validateTime($this->getValue(), $this->format);
    }
}