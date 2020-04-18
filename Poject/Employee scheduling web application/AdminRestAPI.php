<?php

// Tong
// Last edit: Apr 10

require_once "inc/config.inc.php";

require_once "inc/Entities/Admin.class.php";
require_once "inc/Entities/Employee.class.php";
require_once "inc/Entities/AdminLogin.class.php";
require_once "inc/Entities/JobTitle.class.php";
require_once "inc/Entities/Schedule.class.php";
require_once "inc/Entities/ShiftTime.class.php";
require_once "inc/Entities/EmployeeAvailability.class.php";

require_once "inc/Utilities/PDOService.class.php";
require_once "inc/Utilities/AdminDAO.class.php";
require_once "inc/Utilities/EmployeeDAO.class.php";
require_once "inc/Utilities/AdminLoginDAO.class.php";
require_once "inc/Utilities/JobTitleDAO.class.php";
require_once "inc/Utilities/ScheduleDAO.class.php";
require_once "inc/Utilities/ShiftTimeDAO.class.php";
require_once "inc/Utilities/employeeAvailabilityDAO.class.php";
require_once "inc/Utilities/AdminRestClient.php";
require_once "inc/Utilities/Page.class.php";

AdminDAO::initialize();
EmployeeDAO::initialize();
AdminLoginDAO::initialize();
JobTitleDAO::initialize();
ScheduleDAO::initialize();
ShiftTimeDAO::initialize();
employeeAvailabilityDAO::initialize();

// get and decode request data
$requestData = json_decode(file_get_contents('php://input'));

// when requested source is admin
$hasExisted = false;

if ($requestData->resource == 'admin') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // check if adminId already existed
        $admins = AdminDAO::getAdmins();
        foreach ($admins as $admin){
            if ($requestData->adminId == $admin->getAdminUserId()){
                $hasExisted = true;
                header('Content-Type: application/json');
                echo json_encode('Admin Id already exists');  
            }
        }

        // if adminId doesn't exist, insert data to adminLogin
        if (!$hasExisted){
                        
            $newAdmin = new Admin();
            $newAdmin->setAdminUserId($requestData->adminId);
            $newAdmin->setFirstName($requestData->firstName);
            $newAdmin->setLastName($requestData->lastName);
            $newAdmin->setEmail($requestData->email);
            $newAdmin->setPhone($requestData->phone);
            $newAdmin->setCompanyName($requestData->companyName);
            // insert to admin
            $result = AdminDAO::createAdmin($newAdmin);

            header('Content-Type: application/json');
            echo json_encode($result);  
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        if (isset($requestData->adminId)){
            // get one
            $admin = AdminDAO::getAdmin($requestData->adminId);

            header('Content-Type: application/json');
            echo json_encode($admin->jsonSerialize());  
        }else{
            // get all
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'PUT'){
        if (isset($requestData->adminId)){
            // only when an id is provided
            // if (!isset)
            $newAdmin = new Admin();
            $newAdmin->setAdminUserId($requestData->adminId);
            $newAdmin->setFirstName($requestData->firstName);
            $newAdmin->setLastName($requestData->lastName);
            $newAdmin->setEmail($requestData->email);
            $newAdmin->setPhone($requestData->phone);
            $newAdmin->setCompanyName($requestData->companyName);
            $result = AdminDAO::updateAdmin($newAdmin);

            header('Content-Type: application/json');
            echo json_encode($result);  
        }
    }
}

if ($requestData->resource == 'adminLogin'){
    if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $newAdminLogin = new AdminLogin();
        $newAdminLogin->setAdminUserId($requestData->adminId);
        $newAdminLogin->setAdminPassword($requestData->password);
        // insert to adminLogin
        $result = AdminLoginDAO::createAdmin($newAdminLogin);

        header('Content-Type: application/json');
        echo json_encode($result);  
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        if (isset($requestData->adminId)){
            // get one
            $adminLogin = AdminLoginDAO::getAdmin($requestData->adminId);

            header('Content-Type: application/json');
            echo json_encode($adminLogin->jsonSerialize());  
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'PUT'){
        if (isset($requestData->adminId)){
            $newAdminLogin = new AdminLogin();
            $newAdminLogin->setAdminUserId($requestData->adminId);
            $newAdminLogin->setAdminPassword($requestData->password);
            $result = AdminLoginDAO::updateAdmin($newAdminLogin);

            header('Content-Type: application/json');
            echo json_encode($result);  
        }
    }
}

if ($requestData->resource == 'job'){
    if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $newJobTitle = new JobTitle();
        $newJobTitle->setJobtitleName($requestData->jobTitle);
        $newJobTitle->setAdminUserId($requestData->adminId);
        // insert to adminLogin
        $result = JobTitleDAO::createJobTitle($newJobTitle);

        header('Content-Type: application/json');
        echo json_encode($result);  
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        if (isset($requestData->adminId)){
            // get jobs by adminId
            $jobs = JobTitleDAO::getJobTitleByAdmin($requestData->adminId);

            $stdJobs = [];
            foreach ($jobs as $job){
                $stdJobs[] = $job->jsonSerialize();
            }
            header('Content-Type: application/json');
            echo json_encode($stdJobs);  
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        if (isset($requestData->jobId)){
            $result = JobTitleDAO::deleteJobTitle($requestData->jobId);
            header('Content-Type: application/json');
            echo json_encode($result);  
        }
    }
}

if ($requestData->resource == 'schedule') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $newSchedule = new Schedule();
        $newSchedule->setEmployeeUserId($requestData->employee_id);
        $newSchedule->setDate($requestData->date);
        $newSchedule->setShiftTimeId($requestData->shift_id);
        $result = ScheduleDAO::createSchedule($newSchedule);
        header('Content-Type: application/json');
        echo json_encode($result);
    }
    else if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if(isset($requestData->AssignedShiftId)){
           $sch= ScheduleDAO::getSchedule($requestData->AssignedShiftId);
           $serialize=$sch->jsonSerialize();
           header('Content-Type: application/json');
           echo json_encode($serialize);

        }
    }
    else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        var_dump($requestData);
        $rslt=ScheduleDAO::UpdateSchedule($requestData->AssignedShiftId,$requestData->shift_id,$requestData->date);
        header('Content-Type: application/json');
        echo json_encode($rslt);
    }

}

if ($requestData->resource == 'shift') {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // get single
        if (isset($requestData->shift_id)) {

        } else if(isset($requestData->employeeUserId)){
            $employeeShifts=ScheduleDAO::getEmployeeSchedulesJobTilt($requestData->employeeUserId,$requestData->fromDate,$requestData->toDate);
            $employeeShiftSerial=Array();
           
            foreach ($employeeShifts as $shift) {
                $employeeShiftSerial[] = $shift->jsonSerialize();
            }
            // return json array
            header('Content-Type: application/json');
            echo json_encode($employeeShiftSerial);

        }
        else {
       

            // get all
            $shifts = ShiftTimeDAO::getShiftTimes(); 

            $sShifts = [];
            foreach ($shifts as $shift) {
                $sShifts[] = $shift->jsonSerialize();
            }
            // return json array
            header('Content-Type: application/json');
            echo json_encode($sShifts);
        }
    }
}

if ($requestData->resource == 'employee') {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        // get single when username is provided
        if (isset($requestData->username)) {
            $employee = EmployeeDAO::getEmployee($requestData->username);
            header('Content-Type: application/json');
            echo json_encode($employee->jsonSerialize());

        // get eligible employees for a certain day, job and shift when date is provided (for assigning work)
        } else if (isset($requestData->date) && 
                    isset($requestData->shift_id) && 
                    isset($requestData->day_id) &&
                    isset($requestData->manager_id) &&
                    isset($requestData->job_id)) {

            $empsDayShift = employeeAvailabilityDAO::getEmployeesAvailable($requestData->day_id, $requestData->shift_id, $requestData->job_id);
            $empsManager = EmployeeDAO::getEmployeesByManager($requestData->manager_id);
            $empsDate = ScheduleDAO::getEmployeesAssigned($requestData->date, $requestData->shift_id);
                        
            // different objs
            // but they all have emp_id
            // fetch emp_id
            $e1 = [];
            $e2 = [];
            $e3 = [];
            $employees = [];
            
            foreach ($empsDayShift as $e){
                $e1[] = $e->getEmployeeUserId();
            }
            foreach ($empsManager as $e){
                $e2[] = $e->getEmployeeUserId();
            }
            foreach ($empsDate as $e){
                $e3[] = $e->getEmployeeUserId();
            }

            // e1 intersects e2 and then exclude e3
            $empIds = array_diff(array_intersect($e1, $e2), $e3);

            // get Employee objs by id then convert to stdClass objs
            foreach ($empIds as $empId){
                $sEmployees[] = EmployeeDAO::getEmployee($empId)->jsonSerialize();
            }

            header('Content-Type: application/json');
            echo json_encode($sEmployees);
            
        // get all
        } else if (isset($requestData->manager_id)){
            $employees = EmployeeDAO::getEmployeesByManager($requestData->manager_id);
            $sEmployees = [];
            foreach ($employees as $employee){
                $sEmployees[] = $employee->jsonSerialize();
            }
            header('Content-Type: application/json');
            echo json_encode($sEmployees);

        // query in availability & assignment to get available employees
        }
        else if(isset($requestData->job_id)){
            $Jemployees= EmployeeDAO::getEmployeeTiltBase($requestData->job_id,$requestData->adminId);
            $Jserlize =  Array();
            foreach($Jemployees as $Jemployee){
                $Jserlize[]=$Jemployee->jsonSerialize();
            }
                header('Content-Type: application/json');
                echo json_encode($Jserlize);
        }
        else{
            $employees = EmployeeDAO::getEmployees(); // Admin objects

            // convert to json
            $stdEmployees = [];
            foreach ($$employees as $$employee) {
                $stdEmployees[] = $$employee->standardize();
            }
            // return json array
            header('Content-Type: application/json');
            echo json_encode($stdEmployees);
        }
    }
}