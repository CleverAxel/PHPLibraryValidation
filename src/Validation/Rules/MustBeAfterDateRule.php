<?php

namespace App\Validation\Rules;

use App\Helper\DateTimeHelper;
use DateTime;

class MustBeAfterDateRule extends AbstractRule{

    protected string $format;
    protected string $dateToCompare;

    public function __construct(string $dateToCompare, string $format = "Y/m/d")
    {
        $this->format = $format;
        $this->dateToCompare = $dateToCompare;
    }

    public function validateRule(mixed $value): bool
    {
        $this->setValue($value);
        $this->setMessage("La date donnée n'est pas valide ou n'est pas plus tard dans le temps que le " . DateTime::createFromFormat($this->format, $this->dateToCompare)->format("d/m/Y"));
        if(DateTimeHelper::validateDate($this->getValue(), $this->format) == false || DateTimeHelper::validateDate($this->dateToCompare, $this->format) == false){
            return false;
        }
        return DateTimeHelper::isFirstDateLaterThanSecond($this->getValue(), $this->dateToCompare, $this->format);
    }
}