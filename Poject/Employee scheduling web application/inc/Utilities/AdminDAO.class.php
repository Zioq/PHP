<?php

// Tong

require_once __DIR__ . "/../Entities/Admin.class.php";  // ? 

class AdminDAO{
   
    private static $_db;

    static function initialize()    {
      self::$_db= new PDOService("Admin");
    }

    // for get
    static function getAdmins(){
      $sql = 'SELECT * FROM admin;';
      self::$_db->query($sql);
      self::$_db->execute();
      return self::$_db->resultSet();
    }

    static function getAdmin($id){
      $sql = 'SELECT * FROM admin WHERE AdminUserId = :id;';
      self::$_db->query($sql);
      self::$_db->bind(':id', $id);
      self::$_db->execute();
      return self::$_db->singleResult();
    }

    // for post
    static function createAdmin(Admin $newAdmin){
      $sql = 'INSERT INTO admin
              VALUES (:id, :fname, :lname, :email, :phone, :company);';
      self::$_db->query($sql);
      self::$_db->bind(':id', $newAdmin->getAdminUserId());
      self::$_db->bind(':fname', $newAdmin->getFirstName());
      self::$_db->bind(':lname', $newAdmin->getLastName());
      self::$_db->bind(':email', $newAdmin->getEmail());
      self::$_db->bind(':phone', $newAdmin->getPhone());
      self::$_db->bind(':company', $newAdmin->getCompanyName());
      self::$_db->execute();
      return self::$_db->lastInsertedId();
    }

    static function updateAdmin(Admin $newAdmin){
      $sql = 'UPDATE admin 
              SET FirstName = :fname, LastName = :lname, Email = :email, Phone = :phone, CompanyName = :company
              WHERE AdminUserId = :id;';
      self::$_db->query($sql);
      self::$_db->bind(':id', $newAdmin->getAdminUserId());
      self::$_db->bind(':fname', $newAdmin->getFirstName());
      self::$_db->bind(':lname', $newAdmin->getLastName());
      self::$_db->bind(':email', $newAdmin->getEmail());
      self::$_db->bind(':phone', $newAdmin->getPhone());
      self::$_db->bind(':company', $newAdmin->getCompanyName());
      self::$_db->execute();
      return self::$_db->rowCount();
    }
}
