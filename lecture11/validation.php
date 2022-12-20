<?php

class validation {
    
    private string $text; 
    private array $criteria =[];
    private array $errors =[];

    private function sanitizing () : void {
        $this->text= trim(htmlentities(htmlspecialchars($this->text))); 
    }

    public function require (string $text) : object{
        $this->text=$text; 
        if (empty($this->text) || ctype_space($this->text)) {
            $this->errors[] = 'Filed is Empty';
            $this->criteria['require']= false; 
        }
        return $this; 
    }

    public function min (int $min) : object{
        if (strlen($this->text) < $min) {
            $this->errors[] = "require minimum length : $min characters";
            $this->criteria['min']= false; 
        } 
        return $this; 
    }
    
    public function max (int $max) : object {
        if (strlen($this->text) > $max) {
            $this->errors[] = "require maxmum length : $max characters";
            $this->criteria['max']= false; 
        } 
        return $this; 
    }

    public function isValid () : bool{
        return !in_array(false , $this->criteria); 
    }
    public function getCriteria (){
        return $this->criteria; 
    }

    public function showErrors () : array {
        return $this->errors; 
    }
    
}

