<?php

class EmployeeDAO
{
  private static $_db;

  static function initialize()
  {
    self::$_db = new PDOService("Employee");
  }

  static function getEmployees()
  {
    $sql = "SELECT * FROM employee;";
    self::$_db->query($sql);
    self::$_db->execute();
    return  self::$_db->resultSet();
  }
  static function getEmployeesJobTitle($adminId)
  {
    $sql = "SELECT employee.EmployeeUserId, employee.FirstName, employee.LastName, employee.Email, employee.Phone, employee.JobTitleId, employee.AdminUserId, title.JobTitleName FROM employee LEFT JOIN title ON  employee.JobTitleId=title.JobTitleId where employee.AdminUserId=:id;";
    self::$_db->query($sql);
    self::$_db->bind(":id", $adminId);
    self::$_db->execute();
    return  self::$_db->resultSet();
  }
  static function getEmployee(string $id)
  {
    $sql = "SELECT * FROM employee WHERE EmployeeUserId=:id;";
    self::$_db->query($sql);
    self::$_db->bind(":id", $id);
    self::$_db->execute();
    return  self::$_db->singleResult();
  }

  // get all employees created by a certain admin
  public static function getEmployeesByManager($adminId)
  {
    $sql = "SELECT * FROM employee 
                  WHERE AdminUserId = :adminid;";
    self::$_db->query($sql);
    self::$_db->bind(':adminid', $adminId);
    self::$_db->execute();
    return self::$_db->resultSet();
  }

  static function setEmployee(Employee $emp)
  {
    $sql = "INSERT INTO Employee(EmployeeUserId,FirstName,LastName,Email,Phone,JobtitleId,AdminUserId) VALUES(:id,:fname,:lname,:email,:phone, :jobTitle,:adminId );";
    self::$_db->query($sql);
    self::$_db->bind(":id", $emp->getEmployeeUserId());
    self::$_db->bind(":fname", $emp->getFirstName());
    self::$_db->bind(":lname", $emp->getLastName());
    self::$_db->bind(":email", $emp->getEmail());

    self::$_db->bind(":phone", $emp->getPhone());
    self::$_db->bind(":jobTitle", $emp->getJobTitleId());
    self::$_db->bind(":adminId", $emp->getAdminUserId());

    self::$_db->execute();
    return  self::$_db->lastInsertedId();
  }

  static function UpdateEmployee(Employee $emp)
  {
    $sql = "UPDATE Employee SET FirstName=:fname,LastName=:lname,Email=:email,Phone=:phone,JobtitleId=:jobTitle,AdminUserId=:adminId WHERE EmployeeUserId=:id ;";
    self::$_db->query($sql);
    self::$_db->bind(":id", $emp->getEmployeeUserId());
    self::$_db->bind(":fname", $emp->getFirstName());
    self::$_db->bind(":lname", $emp->getLastName());
    self::$_db->bind(":email", $emp->getEmail());

    self::$_db->bind(":phone", $emp->getPhone());
    self::$_db->bind(":jobTitle", $emp->getJobTitleId());
    self::$_db->bind(":adminId", $emp->getAdminUserId());

    self::$_db->execute();
    return  self::$_db->lastInsertedId();
  }




  static function DeleteEmployee($id)
  {
    $sql = "DELETE FROM employee WHERE EmployeeUserId=:id;";
    self::$_db->query($sql);
    self::$_db->bind(":id", $id);
    self::$_db->execute();
    return  self::$_db->rowCount();
  }
  static function checkEmployeeUserName($id)
  {
    $sql = "SELECT * FROM employee WHERE EmployeeUserId=:id;";
    self::$_db->query($sql);
    self::$_db->bind(":id", $id);
    self::$_db->execute();
$result= self::$_db->singleResult();
    return is_object($result) ;
  }
static  function getEmployeeTiltBase($jobTitleId,$adminId){
  $sql = "SELECT * FROM employee 
  WHERE JobtitleId = :jobid AND AdminUserId = :adminid;";
self::$_db->query($sql);
self::$_db->bind(':jobid', $jobTitleId);
self::$_db->bind(':adminid', $adminId);
self::$_db->execute();
return self::$_db->resultSet();



}



}