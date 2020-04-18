<?php
class AdminLogin{

    //For Admin
    private $AdminUserId="";
    private $AdminPassword="";
    

    //Setter
    public function setAdminUserId($newAdminUserId) {
        $this->AdminUserId = $newAdminUserId;
    }
    public function setAdminPassword($newAdminPassword) {
        $this->AdminPassword = $newAdminPassword;
    }
   
    
    //Getter 
    public function getAdminUserId():string {
        return $this->AdminUserId;
    }
    public function getAdminUserPassword():string {
        return $this->AdminPassword;
    }

    //Verify the Admin password
    public function verifyAdminPassword(string $passwordToVerify) {
        return password_verify($passwordToVerify, $this->AdminPassword);
    }
    
    public function jsonSerialize(){
        return get_object_vars($this); 
    }

}
