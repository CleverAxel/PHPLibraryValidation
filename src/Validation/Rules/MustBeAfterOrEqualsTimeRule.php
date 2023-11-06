<?php

namespace App\Validation\Rules;

use App\Helper\DateTimeHelper;
use App\Validation\Rules\MustBeAfterTimeRule;

class MustBeAfterOrEqualsTimeRule extends MustBeAfterTimeRule{

    public function isRuleValid(): bool
    {
        $value = $this->getValue();
        $this->setMessage("L'heure donnée n'est pas valide ou n'est pas plus tard ou égal dans le temps que " . $this->timeToCompare);
        
        if(!is_string($value)){
            return false;
        }

        if(DateTimeHelper::validateTime($value, $this->format) == false || DateTimeHelper::validateTime($this->timeToCompare, $this->format) == false){
            return false;
        }

        return DateTimeHelper::isFirstTimeLaterOrEqualsThanSecond($value, $this->timeToCompare);
    }
}