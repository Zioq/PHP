<?php

class Employee
{
    private $EmployeeUserId;
    private $FirstName;
    private $LastName;
    private $Email;
    private $Phone;
    private $JobTitleId;
    private $AdminUserId;
    private $JobTitleName;


    public function getEmployeeUserId(): string
    {
        return $this->EmployeeUserId;
    }



    public function getFirstName(): string
    {
        return $this->FirstName;
    }
    public function getJobTitleName()
    {
        return $this->JobTitleName;
    }

    public function getLastName(): string
    {
        return $this->LastName;
    }

    public function getEmail(): string
    {
        return $this->Email;
    }

    public function getJobTitleId()
    {
        return $this->JobTitleId;
    }

    public function getAdminUserId(): string
    {
        return $this->AdminUserId;
    }

    public function getPhone(): string
    {
        return $this->Phone;
    }

    public function setEmployeeUserId(string $EmployeeUserId)
    {
        $this->EmployeeUserId = $EmployeeUserId;
    }



    public function setFirstName(string $FirstName)
    {
        $this->FirstName = $FirstName;
    }

    public function setLastName(string $LastName)
    {
        $this->LastName = $LastName;
    }

    public function setEmail(string $Email)
    {
        $this->Email = $Email;
    }

    public function setJobTitleId(int $JobTitleId)
    {
        $this->JobTitleId = $JobTitleId;
    }

    public function setAdminUserId(string $AdminUserId)
    {
        $this->AdminUserId = $AdminUserId;
    }

    public function setPhone(string $Phone)
    {
        $this->Phone = $Phone;
    }
    public function jsonSerialize()
    {



        $vars = get_object_vars($this);

        return $vars;
    }
}