<?php

namespace App\Validation\Rules;

use App\Helper\DateTimeHelper;
use App\Validation\Rules\MustBeAfterTimeRule;

class MustBeAfterOrEqualsTimeRule extends MustBeAfterTimeRule{

    public function validateRule(mixed $value): bool
    {
        $this->setValue($value);
        $this->setMessage("L'heure donnée n'est pas valide ou n'est pas plus tard ou égal dans le temps que " . $this->timeToCompare);
        if(DateTimeHelper::validateTime($value, $this->format) == false || DateTimeHelper::validateTime($this->timeToCompare, $this->format) == false){
            return false;
        }

        return DateTimeHelper::isFirstTimeLaterOrEqualsThanSecond($value, $this->timeToCompare);
    }
}