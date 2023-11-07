<?php

namespace App\Validation\Rules;

use BadMethodCallException;

abstract class AbstractRule
{
    private string $message = "";
    private mixed $value = null;
    private ?string $type = null;
    private ?string $key = null;
    
    public function __invoke(mixed $value, string $key) : bool
    {

        if(is_string($value))
            trim($value);

        $this->setValue($value);
        $this->setKey($key);
        
        return $this->isRuleValid();
    }
    
    public abstract function isRuleValid(): bool;

    public function getMessage(): string
    {
        return $this->message;
    }

    protected function getKey(){
        return $this->key;
    }

    private function setKey(string $key){
        $this->key = $key;
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

    public function getValue($shouldCastValue = false){
        if(is_null($this->type) && $shouldCastValue){
            throw new BadMethodCallException("The type for the casting isn't set.");
        }

        if($shouldCastValue){
            settype($this->value, $this->type);
            return $this->value;
        }

        return $this->value;
    }

    // public function getCastedValue(){
    //     if(is_null($this->type)){
    //         throw new BadMethodCallException("The type for the casting isn't set.");
    //     }

    //     settype($this->value, $this->type);
    //     return $this->value;
    // }

    // protected function getValueUncasted(){
    //     return $this->value;
    // }
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

}
