<?php

namespace App\Validation\Rules;

/**
 * La valeur peut être optionnel. Si la valeur ne respecte pas les autres différentes règles de 
 * validateur, la valeur par défaut sera "null" et on ne renverra pas de message d'erreur.
 */
class NullableRule extends AbstractRule{
    public function isRuleValid(): bool
    {
        return true;
    }
}