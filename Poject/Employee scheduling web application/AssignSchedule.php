<?php

require_once "inc/config.inc.php";

require_once "inc/Entities/Admin.class.php";
require_once "inc/Entities/AdminLogin.class.php";
require_once "inc/Entities/JobTitle.class.php";
require_once "inc/Entities/ShiftTime.class.php";

require_once "inc/Utilities/LoginManager.php";
require_once "inc/Utilities/PDOService.class.php";
require_once "inc/Utilities/AdminDAO.class.php";
require_once "inc/Utilities/AdminLoginDAO.class.php";
require_once "inc/Utilities/ShiftTimeDAO.class.php";
require_once "inc/Utilities/AdminRestClient.php";
require_once "inc/Utilities/Page.class.php";

session_start();

Page::header();
Page::menubar();

// assign form
$sJobs = AdminRestClient::call('GET', [ 'resource' => 'job', 'adminId' => $_SESSION['loggedin']['username']]);
$sShifts = AdminRestClient::call('GET', [ 'resource' => 'shift' ]);

// var_dump(($sJobs));
// var_dump(($sShifts));

Page::assign($sJobs, $sShifts);


// list available employees
if (isset($_POST['action']) && $_POST['action'] == 'listEmployees'){

    // if date empty, report
    if (!isset($_POST['date']) || empty($_POST['date'])){
        Page::notify('Empty date.');
    }

    // select employees who are available on certain DAY & shift
    // and don't have assignment on selected date

    // get day from some date
    $timestamp = strtotime($_POST['date']);
    $day = date('w', $timestamp);   // stackoverflow

    $data = [
        'resource' => 'employee',
        'date' => $_POST['date'],
        'day_id' => $day,
        'shift_id' => $_POST['shift'],
        'job_id' => $_POST['job'],
        'manager_id' => $_SESSION['loggedin']['username'],
    ];
    $sEmployees = AdminRestClient::call('GET', $data);
    // var_dump($sEmployees);

    if (is_null($sEmployees)){
        Page::notify('No available employees found.');
    }else{

        // pass date, shift to assigning using session
        $_SESSION['date'] = $_POST['date'];
        $_SESSION['shift_id'] = $_POST['shift'];
        
        Page::listAvailableEmployees($sEmployees);
    }
}

// assign work to selected employees
if (isset($_POST['action']) && $_POST['action'] == 'assign'){
    $checkedEmpIds = array_keys($_POST, 'checked');
  //  var_dump($_POST);
    //var_dump($checkedEmpIds);
    foreach ($checkedEmpIds as $id){
        $data = [
            'resource' => 'schedule',
            'employee_id' => $id,
            'date' => $_SESSION['date'],
            'shift_id' => $_SESSION['shift_id'],
        ];
        //var_dump($data);
        $insertIds[] = AdminRestClient::call('POST', $data);
    }
    // var_dump($insertIds);
    $result = 'Employee ';
    foreach ($insertIds as $insertId){
        if (!is_null($insertId)){
            $result .= $insertId . ' ';
        }
    }
    $result .= 'assigned.';

    if (!empty($result != 'Employee assigned.')){
        Page::notify($result);
    }else{
        Page::notify('Nobody assigned.');
    }
}


Page::footer();