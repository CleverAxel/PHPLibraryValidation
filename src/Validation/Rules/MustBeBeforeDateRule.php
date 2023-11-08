<?php

namespace App\Validation\Rules;

use DateTime;
use App\Helper\DateTimeHelper;

class MustBeBeforeDateRule extends AbstractRuleDateOperation{
    // protected string $format;
    // protected string $dateToCompare;
    // protected bool $isFromInput;
    // protected ?string $keyDateToCompare = null;

    // public function __construct(string $dateToCompare,bool $isFromInput = false, ?string $keyDateToCompare = null, string $format = "Y/m/d")
    // {
    //     $this->format = $format;
    //     $this->dateToCompare = $dateToCompare;
    //     $this->isFromInput = $isFromInput;
    //     $this->keyDateToCompare = $keyDateToCompare;
    //     $this->tryThrowRuleException();
    // }

    public function isRuleValid(): bool
    {
        $value = $this->getValue();

        $this->setMessage("Date au format invalide. Doit être sous chaine de charactères au format " . $this->format);
        if(!is_string($value)){
            return false;
        }

        $this->messageInvalideDate($value);
        if(DateTimeHelper::validateDate($value, $this->format) == false){
            return false;
        }

        $this->messageInvalideDateFromInput($this->dateToCompare);
        if($this->dateToCompare != null && DateTimeHelper::validateDate($this->dateToCompare, $this->format) == false && $this->isFromInput){
            return false;
        }

        if($this->isFromInput){
            $this->setMessage("La date donnée venant du champs " . $this->getPlaceHolder() . ", " . $value . ", doit être plus tôt dans le temps que la date que vous avez fournie depuis le champs " . $this->getPlaceHolder($this->dateToCompare) . ", dont la date est le " . $this->dateToCompare);
        }else{
            $this->setMessage("La date donnée venant du champs " . $this->getPlaceHolder() . ", " . $value . ", doit être plus tôt dans le temps que le " . $this->dateToCompare);
        }

        if($this->dateToCompare != null)
            return DateTimeHelper::isFirstDateSoonerThanSecond($value, $this->dateToCompare, $this->format);

        return true;
    }

    // protected function tryThrowRuleException()
    // {
    //     if(str_contains($this->format, "Y") == false || str_contains($this->format, "m") == false | str_contains($this->format, "Y") == false){
    //         throw new RuleException("The format need to incorporate at least Y/m/d");
    //     }

    //     if($this->isFromInput == false && DateTimeHelper::validateDate($this->dateToCompare, $this->format) == false){
    //         throw new RuleException("The date given for comparison is invalid.");
    //     }
    //     if($this->isFromInput && is_null($this->keyDateToCompare)){
    //         throw new RuleException("No key given with the input");
    //     }
    // }

    // protected function messageInvalideDate(string $date){
    //     $this->setMessage("La date (" . ($date == "" ? "INCONNUE" : $date) . ") venant du champs :" . $this->getKey() . " est invalide.");
    // }
    // protected function messageInvalideDateFromInput(string $date){
    //     $this->setMessage("La date (" . ($date == "" ? "INCONNUE" : $date) . ") venant du champs :". $this->keyDateToCompare ." est invalide.");
    // }
}