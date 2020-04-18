<?php

class ShiftTime
{


    private $ShiftTimeId;
    private $ShiftOfWork;


    public function setShiftTimeId(int $ShiftTimeId)
    {

        $this->ShiftTimeId = $ShiftTimeId;
    }
    public function setShiftOfWork(string $ShiftOfWork)
    {
        $this->ShiftOfWork = $ShiftOfWork;
    }


    public function getShiftTimeId(): int
    {

        return $this->ShiftTimeId;
    }
    public function getShiftOfWork(): string
    {
        return $this->ShiftOfWork;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
