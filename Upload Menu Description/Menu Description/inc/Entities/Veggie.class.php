<?php
class Veggie extends Pizza{

    public $type = "Veggie";

    function getType(): string {
        return $this->type;
    }

}


?>