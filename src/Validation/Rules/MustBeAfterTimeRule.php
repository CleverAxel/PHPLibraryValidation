<?php

namespace App\Validation\Rules;

use App\Helper\DateTimeHelper;

class MustBeAfterTimeRule extends AbstractRule{
    protected string $format = "H:i";
    protected string $timeToCompare;

    public function __construct(string $timeToCompare)
    {
        $this->timeToCompare = $timeToCompare;
    }

    public function validateRule(mixed $value): bool
    {
        $this->setValue($value);
        $this->setMessage("L'heure donnée n'est pas valide ou n'est pas plus tard dans le temps que " . $this->timeToCompare);
        
        if(!is_string($value)){
            return false;
        }

        if(DateTimeHelper::validateTime($value, $this->format) == false || DateTimeHelper::validateTime($this->timeToCompare, $this->format) == false){
            return false;
        }

        return DateTimeHelper::isFirstTimeLaterThanSecond($value, $this->timeToCompare);
    }
}