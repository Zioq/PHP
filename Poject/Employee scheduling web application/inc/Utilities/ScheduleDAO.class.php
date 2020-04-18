<?php

class ScheduleDAO{
    private static $_db;

    public static function initialize(){
        self::$_db = new PDOService('Schedule');
    }

    public static function getSchedules(){
        $sql = "SELECT * FROM assignedshift;";
        
        self::$_db->query($sql);
        self::$_db->execute();
        return self::$_db->resultSet();
    }

    
    public static function createSchedule(Schedule $s){
        $sql = "INSERT INTO assignedshift(EmployeeUserId, Date, ShiftTimeId)
                VALUES(:employeeid, :date, :shiftid);";
        
        self::$_db->query($sql);
        self::$_db->bind(':employeeid', $s->getEmployeeUserId());
        self::$_db->bind(':date', $s->getDate());
        self::$_db->bind(':shiftid', $s->getShiftTimeId());
        self::$_db->execute();
        return self::$_db->lastInsertedId();
    }

    public static function getEmployeesAssigned($date, $shift){
        $sql = "SELECT * FROM assignedshift 
                WHERE date = :date AND ShiftTimeId = :shift;";
        self::$_db->query($sql);
        self::$_db->bind(':date', $date);
        self::$_db->bind(':shift', $shift);
        self::$_db->execute();
        return self::$_db->resultSet();
    }
    public static function getEmployeeSchedules($userId){
        $sql = "SELECT Date ,ShiftOfWork From assignedShift, Shift WHERE assignedShift.ShiftTimeId=Shift.ShiftTimeId && EmployeeUserId=:id ORDER BY date ;";
        
        self::$_db->query($sql);
        self::$_db->bind(':id', $userId);

        self::$_db->execute();
        return self::$_db->resultSet();
    }

    public static function getEmployeeSchedulesJobTilt($userId,$from,$to){
        $sql = "SELECT  employee.FirstName,employee.LastName,AssignedShift.AssignedShiftId, AssignedShift.Date, Shift.ShiftOfWork
        FROM AssignedShift,Shift,employee
        WHERE assignedShift.EmployeeUserId=:id &&
        date BETWEEN :fdate AND :ldate && assignedShift.ShiftTimeId=Shift.ShiftTimeId && assignedShift.EmployeeUserId=employee.EmployeeUserId ORDER BY date ;";
        
        self::$_db->query($sql);
        self::$_db->bind(':id', $userId);
        self::$_db->bind(':fdate', $from);
        self::$_db->bind(':ldate', $to);

        self::$_db->execute();
        return self::$_db->resultSet();
    }
    public static function DeleteSchedule( $shiftId){
       
        $sql = "DELETE   FROM assignedshift WHERE AssignedShiftId=:id;";
        self::$_db->query($sql);
        self::$_db->bind(':id',$shiftId);
        self::$_db->execute();
       self::$_db->rowCount();
    }

    public static function getSchedule($shiftId){
        $sql = "SELECT * FROM assignedshift Where AssignedShiftId=:id ;";
        
        self::$_db->query($sql);
        self::$_db->bind(':id',$shiftId);
        self::$_db->execute();
        return self::$_db->singleResult();
    }
    public static function UpdateSchedule($shiftId,$time,$da){
        $sql = "UPDATE assignedshift SET  Date=:date,ShiftTimeId=:shiftid Where AssignedShiftId=:id;";
              
        
        self::$_db->query($sql);
     
        self::$_db->bind(':date',$da );
        self::$_db->bind(':shiftid',$time);
        self::$_db->bind(':id',$shiftId);
        self::$_db->execute();
        return self::$_db->lastInsertedId();
    }


}