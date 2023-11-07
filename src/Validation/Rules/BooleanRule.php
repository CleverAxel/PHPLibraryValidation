<?php

namespace App\Validation\Rules;

class BooleanRule extends AbstractRule{
    public function __construct()
    {
        $this->setType("bool");
    }

    public function isRuleValid(): bool
    {
        $this->setMessage("La valeur booléenne n'est pas correct.");
        if(in_array($this->getValue(), ["1", "0", 1, 0, true, false, "true", "false"])){
            return true;
        }

        $value = true;
        if($this->getValue() == null){
            $value = false;
        }
        
        $this->setValue($value);
        // return true;
        return in_array($value, ["1", "0", 1, 0, true, false, "true", "false"]);
    }
}