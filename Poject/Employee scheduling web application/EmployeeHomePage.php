<?php
require_once("inc/config.inc.php");
require_once("inc/Utilities/LoginManager.php");
require_once("inc/Entities/Schedule.class.php");
require_once("inc/Entities/Employee.class.php");
require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/ScheduleDAO.class.php");
require_once("inc/Utilities/EmployeeDAO.class.php");
require_once("inc/Utilities/Page.class.php");

session_start();
if (LoginManager::verifyLogin()==true && $_SESSION['loggedin']['user']=="employee" ){
ScheduleDAO::initialize();
EmployeeDAO::initialize();
Page::header();
Page::Employemenubar();
Page::showCalenderEmployee(ScheduleDAO::getEmployeeSchedules( $_SESSION["loggedin"]["username"]),EmployeeDAO::getEmployee($_SESSION["loggedin"]["username"]));


Page::footer();
}
else{
    header('Location: pro.corona.php');
}






?>