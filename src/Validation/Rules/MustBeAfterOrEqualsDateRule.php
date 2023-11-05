<?php

namespace App\Validation\Rules;

use DateTime;
use App\Helper\DateTimeHelper;

class MustBeAfterOrEqualsDateRule extends MustBeAfterDateRule{
    public function validateRule(mixed $value): bool
    {
        $this->setValue($value);
        $this->setMessage("La date donnée n'est pas valide ou n'est pas plus tard ou égal dans le temps que le " . DateTime::createFromFormat($this->format, $this->dateToCompare)->format("d/m/Y"));
        if(DateTimeHelper::validateDate($this->getValue(), $this->format) == false || DateTimeHelper::validateDate($this->dateToCompare, $this->format) == false){
            return false;
        }
        return DateTimeHelper::isFirstDateLaterOrEqualsThanSecond($this->getValue(), $this->dateToCompare, $this->format);
    }
}