<?php

namespace App\Validation\Rules;

use App\Validation\Rules\AbstractRule;

class RequiredRule extends AbstractRule{

    public function __construct()
    {
        $this->setMessage("Le champs, :value, est obligatoire");
    }

    public function isRuleValid(): bool
    {
        $value = $this->getValue();
        if(isset($value) == false || is_null($value)){
            return false;
        }

        if(is_string($value) && strlen(trim($value)) == 0){
            return false;
        }

        if(is_array($value) && count($value) == 0){
            return false;
        }

        return true;
    }
}