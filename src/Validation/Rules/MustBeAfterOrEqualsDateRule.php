<?php

namespace App\Validation\Rules;

use DateTime;
use App\Helper\DateTimeHelper;

class MustBeAfterOrEqualsDateRule extends MustBeAfterDateRule{
    public function isRuleValid(): bool
    {
        $$value = $this->getValue();
        $this->setMessage("La date donnée n'est pas valide ou n'est pas plus tard ou égal dans le temps que le " . DateTime::createFromFormat($this->format, $this->dateToCompare)->format("d/m/Y"));

        if(!is_string($value)){
            return false;
        }

        if(DateTimeHelper::validateDate($value, $this->format) == false || DateTimeHelper::validateDate($this->dateToCompare, $this->format) == false){
            return false;
        }
        return DateTimeHelper::isFirstDateLaterOrEqualsThanSecond($value, $this->dateToCompare, $this->format);
    }
}