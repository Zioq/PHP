<?php 
class EmployeeLogin {

    //For Employee
    private $EmployeeUserId="";
    private $EmployeePassword="";

    // Setter
    public function setEmployeeUserId($newEmployeeUserId) {
        $this->EmployeeUserId = $newEmployeeUserId;
    }
    public function setEmployeeUserPassword($newEmployeeUserPassword) {
        $this->EmployeePassword = $newEmployeeUserPassword;
    }
    // Getter
    public function getEmployeeUserId():string {
        return $this->EmployeeUserId;
    }
    public function getEmployeeUserPassword():string {
        return $this->EmployeePassword;
    }

    //Verify the Employee password 
    public function verifyEmployeePassword(string $passwordToVerify) {
        return password_verify($passwordToVerify, $this->EmployeePassword);
    }   
}
