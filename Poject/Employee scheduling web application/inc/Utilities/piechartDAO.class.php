<?php

class piechartDAO{
    private static $_db;

    static function initialize()    {
      self::$_db= new PDOService("piechart");
        
    }

    static function piechartData($adminId){
        $sql="SELECT title.JobTitleName, COUNT(*) as number FROM employee,title WHERE employee.JobTitleId=title.JobTitleId && employee.AdminUserId=:id GROUP BY title.jobTitleId;";
        self::$_db->query( $sql);
        self::$_db->bind(":id",$adminId);
        self::$_db->execute();
     return  self::$_db->resultSet();
     }





}
