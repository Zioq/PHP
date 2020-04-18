<?php

class Schedule{
    private $AssignedShiftId;
    private $EmployeeUserId;
    private $Date;
    private $ShiftTimeId;
    private $ShiftOfWork;
  
    public function getAssignedShiftId() { return $this->AssignedShiftId; }
    public function getEmployeeUserId() { return $this->EmployeeUserId; }
    public function getDate() { return $this->Date; }
    public function getShiftTimeId() { return $this->ShiftTimeId; }
    public function getShiftOfWork() :string { return $this->ShiftOfWork; }

    public function setAssignedShiftId($id) { $this->AssignedShiftId = $id; }
    public function setEmployeeUserId($id) { $this->EmployeeUserId = $id; }
    public function setDate($date) { $this->Date = $date; }
    public function setShiftTimeId($id) { $this->ShiftTimeId = $id; }
    public function setShiftOfWork($ShiftOfWork) { $this->ShiftOfWork = $ShiftOfWork; }

    public function jsonSerialize(){
        return get_object_vars($this); 
    }

}
