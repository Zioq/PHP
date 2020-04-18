<?php 
class JobTitleDAO{
    private static $_db;

    static function initialize()    {
      self::$_db= new PDOService("JobTitle");

        
    }

    static function getJobTiles(){
      $sql="SELECT * FROM title;";
       self::$_db->query( $sql);
       self::$_db->execute();
    return  self::$_db->resultSet();


    }

    static function getJobTile(int $id){
      $sql="SELECT * FROM title WHERE JobTitleId=:id;";
       self::$_db->query( $sql);
       self::$_db->bind(":id",$id);
       self::$_db->execute();
    return  self::$_db->singleResult();
    }

    // Tong Apr 10: BELOW
    
    static function getJobTitleByAdmin($adminId){
      $sql = "SELECT * FROM title WHERE AdminUserId = :adminid;";
      self::$_db->query($sql);
      self::$_db->bind(':adminid', $adminId);
      self::$_db->execute();
      return self::$_db->resultSet();
    }

    static function createJobTitle($newJob){
      $sql = "INSERT INTO title (JobTitleName, AdminUserId) 
              VALUES (:jobtitle, :adminid);";
      self::$_db->query($sql);
      self::$_db->bind(':jobtitle', $newJob->getJobTitleName());
      self::$_db->bind(':adminid', $newJob->getAdminUserId());
      self::$_db->execute();
      return self::$_db->lastInsertedId();
    }

    static function deleteJobTitle($id){
      $sql = "DELETE FROM title WHERE JobTitleId = :jobid;";
      self::$_db->query($sql);
      self::$_db->bind(':jobid', $id);
      self::$_db->execute();
      return self::$_db->rowCount();
    }

  }
