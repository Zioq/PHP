<?php
require_once("inc/config.inc.php");
require_once("inc/Utilities/LoginManager.php");
require_once("inc/Entities/JobTitle.class.php");
require_once("inc/Entities/Days.class.php");
require_once("inc/Entities/ShiftTime.class.php");
require_once("inc/Entities/Employee.class.php");
require_once("inc/Entities/EmployeeLogin.class.php");
require_once("inc/Entities/EmployeeAvailability.class.php");

require_once("inc/Utilities/JobTitleDAO.class.php");
require_once("inc/Utilities/DaysDAO.class.php");
require_once("inc/Utilities/ShiftTimeDAO.class.php");
require_once("inc/Utilities/EmployeeDAO.class.php");
require_once("inc/Utilities/EmployeeLoginDAO.class.php");
require_once("inc/Utilities/employeeAvailabilityDAO.class.php");
require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/Page.class.php");
require_once("inc/Utilities/EmployeeRestClient.php");
JobTitleDAO::initialize();
ShiftTimeDAO::initialize();
DaysDAO::initialize();
EmployeeDAO::initialize();    
EmployeeAvailabilityDAO::initialize();
EmployeeLoginDAO::initialize();
session_start();
if (LoginManager::verifyLogin()==true && $_SESSION['loggedin']['user']=="admin" ){
if(isset($_POST["action"]) && !empty($_POST["action"]) ){
    if($_POST["action"]=="add"){
        
        
        if(EmployeeDAO::checkEmployeeUserName($_POST["userId"])==true){
           Page::$suc=" ";
            Page::$errors="Operation not succesfull. Employee User Id already excist, Try new one";
        }
        else{
            
            $postData= array(
                
                "AdminUserId"=>$_SESSION['loggedin']['username'],
                "FirstName"=>$_POST["firstName"],
                "LastName"=>$_POST["lastName"],
                "EmployeeUserId"=>$_POST["userId"],
                "Phone"=>strval($_POST["phone"]),
                "Email"=>$_POST["email"],
                "JobTitleId"=>$_POST["JobTitle"],
            );
            EmployeeRestClient::call("POST",$postData);
            // var_dump(password_hash($_POST["password"], PASSWORD_DEFAULT));
            
            EmployeeLoginDAO::setEmployeePas( $_POST["userId"],password_hash($_POST["password"], PASSWORD_DEFAULT));
            $days=DaysDAO::getDays();
            for ($i=0; $i < count($days) ; $i++) { 
                if(isset($_POST[$days[$i]->getDayId()]) && !empty($_POST[$days[$i]->getDayId()])){
                    for ($a=0; $a < count($_POST[$days[$i]->getDayId()]) ; $a++) { 
          EmployeeAvailabilityDAO::setEmployeeAvailability($_POST["userId"],$days[$i]->getDayId(),$_POST[$days[$i]->getDayId()][$a],$_POST["JobTitle"]);
        }
        
        }
    }
    Page::$errors=" ";
   Page::notify("Employee Added Sucessfully");
    }
    
    
    
}
}
Page::$_title="Add Empoyee";
Page::header();
Page::menubar();


Page::AddEmployee(JobTitleDAO::getJobTitleByAdmin($_SESSION['loggedin']['username']),ShiftTimeDAO::getShiftTimes(),DaysDAO::getDays());
Page::footer();
}
else{
    header('Location: pro.corona.php');
}
