<?php
abstract class Drink    {

    public $item = "";
    public $description = "";

    public function setItem(string $item)    {
        $this->item = $item;
    }

    public function setDescription(string $description)   {
        $this->description = $description;
    }

    abstract function getType() : string;
    
}



?>