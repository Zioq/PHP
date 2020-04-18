
<?php
class EmployeeAvailabilityDAO
{
  private static $_db;

  static function initialize()
  {
    self::$_db = new PDOService("EmployeeAvailability");
  }

  static function setEmployeeAvailability($id, $day, $shift, $jobTitle)
  {

    $sql = "INSERT INTO employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES (:id,:day,:shift,:jobTitle);";
    self::$_db->query($sql);
    self::$_db->bind(":id", $id);
    self::$_db->bind(":day", $day);
    self::$_db->bind(":shift", $shift);
    self::$_db->bind(":jobTitle", $jobTitle);
    self::$_db->execute();
    return  self::$_db->lastInsertedId();
  }





  static function getEmployeeAvialabilty(string $id)
  {
    $sql = "SELECT * FROM employeeavailable WHERE EmployeeUserId=:id;";
    self::$_db->query($sql);
    self::$_db->bind(":id", $id);
    self::$_db->execute();
    return  self::$_db->resultSet();
  }



  static function DeleteEmployeeAvialabilty(string $id)
  {
    $sql = "DELETE FROM employeeavailable WHERE EmployeeUserId=:id;";
    self::$_db->query($sql);
    self::$_db->bind(":id", $id);
    self::$_db->execute();
    return  self::$_db->rowCount();
  }

  public static function getEmployeesAvailable(int $day, int $shift, int $job)
  {
    $sql = "SELECT * FROM employeeavailable 
          WHERE DayId = :day AND ShiftTimeId = :shift AND JobTitleId = :job;";
    self::$_db->query($sql);
    self::$_db->bind(':day', $day);
    self::$_db->bind(':shift', $shift);
    self::$_db->bind(':job', $job);
    self::$_db->execute();
    return self::$_db->resultSet();
  }
}

?>
