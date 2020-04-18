<?php

// createAdmin() by Tong
// updateAdmin() by Tong
// getter coded by Robert

class AdminLoginDAO{
  private static $_db;

  static function initialize()    {
    self::$_db= new PDOService("AdminLogin");
      
  }

  //Get the AdminUsers 
  static function getAdmins(): array {

    //query
    $sql = "SELECT * FROM AdminAccount;";
    self::$_db->query($sql);
    //Execute 
    self::$_db->execute();
    //Return the results;
    return self::$_db->resultSet();
    
  }

  static function getAdmin(string $userName) {
    //Query!
    $sql = "SELECT * FROM AdminAccount WHERE AdminUserId = :adminuserid;";
    self::$_db->query($sql);
    //Bind!
    self::$_db->bind(":adminuserid",$userName);
    //Execute!
    self::$_db->execute();
    //Return the reuslts!
    return self::$_db->singleResult();

  }

  static function createAdmin(AdminLogin $newAdminLogin){
    $sql = "INSERT INTO AdminAccount(AdminUserId, AdminPassword)
            VALUES (:adminuserid, :adminpassword);";
    self::$_db->query($sql);
    self::$_db->bind(':adminuserid', $newAdminLogin->getAdminUserId());
    self::$_db->bind(':adminpassword', $newAdminLogin->getAdminUserPassword());
    self::$_db->execute();
    return self::$_db->lastInsertedId();
  }

  static function updateAdmin(AdminLogin $newAdminLogin){
    $sql = 'UPDATE adminaccount 
            SET AdminPassword = :password
            WHERE AdminUserId = :id;';
    self::$_db->query($sql);
    self::$_db->bind(':id', $newAdminLogin->getAdminUserId());
    self::$_db->bind(':password', $newAdminLogin->getAdminUserPassword());
    self::$_db->execute();
    return self::$_db->rowCount();
  }
}
