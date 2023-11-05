<?php

namespace App\Validation\Rules;

use DateTime;
use App\Helper\DateTimeHelper;

class MustBeBeforeDateRule extends AbstractRuleThrowableException{
    protected string $format;
    protected string $dateToCompare;

    public function __construct(string $dateToCompare, string $format = "Y/m/d")
    {
        $this->format = $format;
        $this->dateToCompare = $dateToCompare;
        $this->tryThrowRuleException();
    }

    public function validateRule(mixed $value): bool
    {
        $this->setValue($value);
        $this->setMessage("La date donnée n'est pas valide ou n'est pas plus tôt dans le temps que le " . DateTime::createFromFormat($this->format, $this->dateToCompare)->format("d/m/Y"));
        
        if(!is_string($value)){
            return false;
        }

        if(DateTimeHelper::validateDate($value, $this->format) == false || DateTimeHelper::validateDate($this->dateToCompare, $this->format) == false){
            return false;
        }

        return DateTimeHelper::isFirstDateSoonerThanSecond($value, $this->dateToCompare, $this->format);
    }

    protected function tryThrowRuleException()
    {
        if(str_contains($this->format, "Y") == false || str_contains($this->format, "m") == false | str_contains($this->format, "Y") == false){
            throw new RuleException("The format need to incorporate at least Y/m/d");
        }
    }
}