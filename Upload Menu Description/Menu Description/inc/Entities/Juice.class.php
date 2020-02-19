<?php
class Juice extends Drink{

    public $type = "Juice";

    function getType(): string {
        return $this->type;
    }

}


?>