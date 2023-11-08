<?php

namespace App\Validation\Rules;

use App\Helper\DateTimeHelper;

class MustBeBeforeTimeRule extends AbstractRuleTimeOperation{
    public function isRuleValid(): bool
    {
        $value = $this->getValue();

        $this->setMessage("Heure au format invalide. Doit être sous chaine de charactères au format " . $this->format);
        if(!is_string($value)){
            return false;
        }

        $this->messageInvalideTime($value);
        if(DateTimeHelper::validateDate($value, $this->format) == false){
            return false;
        }

        $this->messageInvalideTimeFromInput($this->timeToCompare);
        if(DateTimeHelper::validateDate($this->timeToCompare, $this->format) == false && $this->isFromInput){
            return false;
        }

        if($this->isFromInput){
            $this->setMessage("L'heure donnée venant du champs " . $this->getPlaceHolder() . ", " . $value . ", doit être plus tôt dans le temps que l'heure que vous avez fournie depuis le champs " . $this->getPlaceHolder($this->keytimeToCompare) . ", dont l'heure est " . $this->timeToCompare);
        }else{
            $this->setMessage("L'heure donnée venant du champs " . $this->getPlaceHolder() . ", " . $value . ", doit être plus tôt dans le temps que " . $this->timeToCompare);
        }

        return DateTimeHelper::isFirstTimeSoonerThanSecond($value, $this->timeToCompare);
    }
}