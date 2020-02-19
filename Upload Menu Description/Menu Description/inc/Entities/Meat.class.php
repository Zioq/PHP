<?php
class Meat extends Chicken{

    public $type = "Meat";

    function getType(): string {
        return $this->type;
    }

}


?>