<?php

class EmployeeLoginDAO {
    private static $_db;

    static function initialize()    {
      self::$_db= new PDOService("EmployeeLogin");
        
    }

    //Get the Employees
    static function getEmployees(): array {

        //query
        $sql = "SELECT * FROM EmployeeAccount;";
        self::$_db->query($sql);
        //Execute 
        self::$_db->execute();
        //Return the results;
        return self::$_db->Resultset();
 
     }
 
     static function getEmployee(string $userName) {
       //Query!
       $sql = "SELECT * FROM EmployeeAccount WHERE EmployeeUserId = :employeeuserid ;";
       self::$_db->query($sql);
       //Bind!
       self::$_db->bind(":employeeuserid",$userName);
       //Execute!
       self::$_db->execute();
       //Return the reuslts!
       return self::$_db->singleResult();
 
     }

     static function setEmployeePas( $user,$pas) {
      //Query!

      $sql ="INSERT INTO employeeaccount(EmployeeUserId,EmployeePassword) VALUES(:id,:pass);";
      
      self::$_db->query($sql);
     
      self::$_db->bind(":id",$user);
      self::$_db->bind(":pass",$pas);
     
      self::$_db->execute();
     
      return self::$_db->lastInsertedId();

    }





}
