<?php 
class ShiftTimeDAO{
    private static $_db;

    static function initialize()    {
      self::$_db= new PDOService("ShiftTime");

        
    }

    static function getShiftTimes(){
      $sql="SELECT * FROM shift;";
       self::$_db->query($sql);
       self::$_db->execute();
    return  self::$_db->resultSet();


    }

    static function getShiftTime(int $id){
      $sql="SELECT * FROM title WHERE ShiftTimeId=:id;";
       self::$_db->query($sql);
       self::$_db->bind(":id",$id);
       self::$_db->execute();
    return  self::$_db->singleResult();


    }









  }
