<?php
class EmployeeAvailability{

    private $DayId;
    private $ShiftTimeId;
    private $JobTitleId;
    private $EmployeeUserId;

    public function getEmployeeUserId(): string
    {
        return $this->EmployeeUserId;
    }

    public function getJobTitleId(): string
    {
        return $this->JobTitleId;
    }
    public function getDayId(): int
    {
        return $this->DayId;
    }

    public function getShiftTimeId(): int
    {
        return $this->ShiftTimeId;
    }

    public function setDayId(int $DayId)
    {
        $this->DayId = $DayId;
    }

    public function setShiftTimeId(int $ShiftTimeId)
    {
        $this->ShiftTimeId = $ShiftTimeId;
    }

    public function setJobTitleId(string $JobTitleId)
    {
        $this->JobTitleId = $JobTitleId;
    }







}
