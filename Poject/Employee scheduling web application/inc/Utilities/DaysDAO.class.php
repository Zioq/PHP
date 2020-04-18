<?php 
class DaysDAO{
    private static $_db;

    static function initialize()    {
      self::$_db= new PDOService("Days");

        
    }

    static function getDays(){
      $sql="SELECT * FROM availability;";
       self::$_db->query( $sql);
       self::$_db->execute();
    return  self::$_db->resultSet();


    }

    static function getDay(int $id){
      $sql="SELECT * FROM title WHERE DayId=:id;";
       self::$_db->query( $sql);
       self::$_db->bind(":id",$id);
       self::$_db->execute();
    return  self::$_db->singleResult();


    }









  }
