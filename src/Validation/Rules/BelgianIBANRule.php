<?php

namespace App\Validation\Rules;

class BelgianIBANRule extends AbstractRule{
    public function validateRule(mixed $value): bool
    {
        $this->setValue($value);
        $this->setMessage("Ce numéro de compte IBAN belge n'est pas valide. Vérifiez que les deux premières lettres BE soient en majuscules et respectez les espaces ou n'en mettez pas.");
        
        if(!is_string($value))
            return false;
        
        return preg_match("/^BE\d{2}\s*?\d{4}\s*?\d{4}\s*?\d{4}$/", $value);
    }
}