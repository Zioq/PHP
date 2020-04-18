<?php

// Tong
// jsonSerialize() for outputing a stdClass object

class Admin{

    private $AdminUserId = '';
    private $FirstName = '';
    private $LastName = '';
    private $Email = '';
    private $Phone = '';
    private $CompanyName = '';

    public function getAdminUserId() { return $this->AdminUserId; }
    public function getFirstName() { return $this->FirstName; }
    public function getLastName() { return $this->LastName; }
    public function getEmail() { return $this->Email; }
    public function getPhone() { return $this->Phone; }
    public function getCompanyName() { return $this->CompanyName; }

    public function setAdminUserId($id) { $this->AdminUserId = $id; }
    public function setFirstName($fName) { $this->FirstName = $fName; }
    public function setLastName($lName) { $this->LastName = $lName; }
    public function setEmail($email) { $this->Email = $email; }
    public function setPhone($phone) { $this->Phone = $phone; }
    public function setCompanyName($company) { $this->CompanyName = $company; }

    public function jsonSerialize(){
        return get_object_vars($this); 
    }

}
