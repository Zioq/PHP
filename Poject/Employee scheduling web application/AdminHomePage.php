<?php
require_once("inc/config.inc.php");
require_once("inc/Utilities/LoginManager.php");
require_once("inc/Entities/JobTitle.class.php");
require_once("inc/Entities/Days.class.php");
require_once("inc/Entities/ShiftTime.class.php");
require_once("inc/Entities/Employee.class.php");
require_once("inc/Entities/EmployeeAvailability.class.php");
require_once("inc/Entities/piechart.class.php");

require_once("inc/Utilities/JobTitleDAO.class.php");
require_once("inc/Utilities/DaysDAO.class.php");
require_once("inc/Utilities/ShiftTimeDAO.class.php");
require_once("inc/Utilities/EmployeeDAO.class.php");
require_once("inc/Utilities/piechartDAO.class.php");
require_once("inc/Utilities/employeeAvailabilityDAO.class.php");
require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/Page.class.php");
session_start();
if (LoginManager::verifyLogin()==true && $_SESSION['loggedin']['user']=="admin" ){
JobTitleDAO::initialize();
ShiftTimeDAO::initialize();
DaysDAO::initialize();
EmployeeDAO::initialize();    
EmployeeAvailabilityDAO::initialize();
EmployeeDAO::initialize();
piechartDAO::initialize();

if (isset($_GET["action"]) && $_GET["action"] == "delete")  {
    //Call the DAO and delete the respecitve Section
   
    EmployeeDAO::DeleteEmployee($_GET["id"]);
  
}
if (!empty($_POST)) {
    //If there was an edit action....
    if ($_POST["action"] == "edit") {
        $empObj= new Employee();
        $empObj->setAdminUserId($_SESSION['loggedin']['username']);
        $empObj->setFirstName($_POST["EditfirstName"]);
        $empObj->setLastName($_POST["EditlastName"]);
        $empObj->setEmployeeUserId($_POST["EdituserId"]);
        $empObj->setPhone(strval($_POST["Editphone"]));
        $empObj->setEmail($_POST["Editemail"]);
        $empObj->setJobTitleId($_POST["EditJobTitle"]);
         EmployeeDAO::updateEmployee($empObj);
         EmployeeAvailabilityDAO::DeleteEmployeeAvialabilty($_POST["EdituserId"]);
       $days=DaysDAO::getDays();
    for ($i=0; $i < count($days) ; $i++) { 
        if(isset($_POST[$days[$i]->getDayId()]) && !empty($_POST[$days[$i]->getDayId()])){
            for ($a=0; $a < count($_POST[$days[$i]->getDayId()]) ; $a++) { 
          EmployeeAvailabilityDAO::setEmployeeAvailability($_POST["EdituserId"],$days[$i]->getDayId(),$_POST[$days[$i]->getDayId()][$a],$_POST["EditJobTitle"]);
            }

        }
    }
}

}
Page::$_title="Organization";
Page::header();
Page::menubar();
$data=piechartDAO::piechartData($_SESSION['loggedin']['username']);


// var_dump($pie);


if(isset($_GET["action"]) && $_GET["action"] == "edit"){
    // var_dump(EmployeeAvailabilityDAO::getEmployeeAvialabilty($_GET["id"]));
   Page::EditEmployeeForm(JobTitleDAO::getJobTitleByAdmin($_SESSION['loggedin']['username']),ShiftTimeDAO::getShiftTimes(),DaysDAO::getDays(),EmployeeDAO::getEmployee($_GET["id"]),EmployeeAvailabilityDAO::getEmployeeAvialabilty($_GET["id"]));

}
else{
    Page::showOrganization(EmployeeDAO::getEmployeesJobTitle($_SESSION['loggedin']['username']));
    Page::pieChart($data);
}
    
Page::footer();








}
else{
    header('Location: pro.corona.php');
}

?>