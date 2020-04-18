<?php

// by Tong
// not finished

require_once "inc/config.inc.php";
require_once("inc/Entities/Employee.class.php");
require_once("inc/Entities/Schedule.class.php");
require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/EmployeeDAO.class.php");
require_once("inc/Utilities/ScheduleDAO.class.php");
require_once "inc/Utilities/AdminRestClient.php";
require_once "inc/Utilities/LoginManager.php";
require_once "inc/Utilities/Page.class.php";


session_start();
if (LoginManager::verifyLogin() == true && $_SESSION['loggedin']['user'] == "admin") {

    //if (LoginManager::verifyLogin()==true && $_SESSION['loggedin']['user']=="admin" ){
    EmployeeDAO::initialize();
    ScheduleDAO::initialize();


    Page::$_title = "Admin page";
    Page::header();
    Page::menubar();
    if (isset($_GET) && !empty($_GET)) {
        if ($_GET["action"] == "delete") {
            ScheduleDAO::DeleteSchedule($_GET["id"]);
            Page::notify("Shift Delted SuccessFully");
        } else if ($_GET["action"] == "edit") {
            $sShifts = AdminRestClient::call('GET', ['resource' => 'shift']);
            $emp = AdminRestClient::call("GET", ["resource" => "schedule", "AssignedShiftId" => $_GET["id"]]);
            Page::editShift($sShifts, $emp);
        }
    }




    if (isset($_POST) && !empty($_POST)) {
        if ($_POST['action'] == 'lookEmployee') {
            $checkedEmpIds = array_keys($_POST, 'checked');
            if ($checkedEmpIds == []) {
                Page::notify('Please select one employee at least.');
            }
            $insertIds = [];
            foreach ($checkedEmpIds as $id) {
                $fdata = [
                    'resource' => 'shift',
                    'employeeUserId' => $id,
                    'fromDate' => $_POST["fromdate"],
                    'toDate' => $_POST["todate"]

                ];

                $insertIds[] = AdminRestClient::call('GET', $fdata);
            }
            Page::showShiftsTable($insertIds);
        }
        if ($_POST["action"] == "listEmployees") {

            Page::listAvailableEmployeesLookUp(AdminRestClient::call("GET", ["resource" => "employee", "job_id" => $_POST["job"], "adminId" => $_SESSION['loggedin']['username']]));
        }

        if ($_POST["action"] == "editShift") {

            //  $rs=AdminRestClient::call("PUT",["resource" => "schedule","AssignedShiftId"=>$_POST["AssignedShiftId"],"shift_id"=>$_POST["shift"],"date"=>$_POST["date"]]);
            $rs = ScheduleDAO::UpdateSchedule($_POST["AssignedShiftId"], $_POST["shift"], $_POST["date"]);
            header('Location: AdminHomePage.php');
            Page::notify("Shift Updated");
        }
    }
    if (empty($_POST) && empty($_GET)) {
        $ldata = [
            "resource" => "job",
            "adminId" => $_SESSION['loggedin']['username']
            //$_SESSION['loggedin']['username']
        ];

        $jobs = AdminRestClient::call('GET', $ldata);
        Page::lookupShifts($jobs);
    }
    // $currentAdmin = AdminRestClient::call('GET', $data);
    // Page::showAdminInfo($currentAdmin);


    Page::footer();
} else {
    header('Location: pro.corona.php');
}

//}
