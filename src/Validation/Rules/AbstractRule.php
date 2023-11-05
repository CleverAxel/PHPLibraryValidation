<?php

namespace App\Validation\Rules;

use BadMethodCallException;

abstract class AbstractRule
{
    private string $message = "";
    private mixed $value = null;
    private ?string $type = null;

    public function getMessage(): string
    {
        return $this->message;
    }

    protected function setMessage(string $message){
        $this->message = $message;
    }

    protected function setValue(mixed $value){
        $this->value = $value;
    }

    public function getShouldCastValue(){
        return is_null($this->type) == false;
    }

    public function getValue(){
        if(is_null($this->type)){
            return $this->value;
        }

        settype($this->value, $this->type);
        return $this->value;
    }

    protected function getValueUncasted(){
        return $this->value;
    }
    /**
     * @param string $type Possibles types :
     * - "int"
     * - "float"
     * - "bool"
     * - "string"
     * - "array"
     * - "null"
     */
    protected function setType(string $type){
        if(!in_array($type, ["bool", "float", "int", "string", "array", "null"])){
            throw new BadMethodCallException("The type can only be one of those : [\"bool\", \"float\", \"int\", \"string\", \"array\", \"null\"]");
        }

        $this->type = $type;
    }
    
    public abstract function validateRule(mixed $value): bool;
}
