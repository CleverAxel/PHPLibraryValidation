<?php

namespace App\Validation\Rules;

use App\Helper\StringHelper;

class BelgianPhoneNumberRule extends AbstractRule{

    public function validateRule(mixed $value): bool
    {
        $this->setValue($value);
        $this->setMessage("Le numéro de téléphone donné n'est pas valide ou n'est pas belge.");

        if(!is_string($value))
        return false;
        
        return (bool)preg_match("/^(((\+|00)32[ ]?(?:\(0\)[ ]?)?)|0){1}(4(60|[789]\d)\/?(\s?\d{2}\.?){2}(\s?\d{2})|(\d\/?\s?\d{3}|\d{2}\/?\s?\d{2})(\.?\s?\d{2}){2})$/", StringHelper::removeCommonsSeparations($value));
    }
}