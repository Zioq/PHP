<?php
class Chicken extends Pizza{

    public $type = "Chicken";

    function getType(): string {
        return $this->type;
    }

}


?>