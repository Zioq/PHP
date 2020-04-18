<?php
require_once("inc/config.inc.php");
require_once("inc/Entities/JobTitle.class.php");
require_once("inc/Entities/Days.class.php");
require_once("inc/Entities/ShiftTime.class.php");
require_once("inc/Entities/Employee.class.php");
require_once("inc/Entities/EmployeeAvailability.class.php");

require_once("inc/Utilities/JobTitleDAO.class.php");
require_once("inc/Utilities/DaysDAO.class.php");
require_once("inc/Utilities/ShiftTimeDAO.class.php");
require_once("inc/Utilities/EmployeeDAO.class.php");
require_once("inc/Utilities/employeeAvailabilityDAO.class.php");
require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/Page.class.php");
EmployeeDAO::initialize();
JobTitleDAO::initialize();
ShiftTimeDAO::initialize();
DaysDAO::initialize();
EmployeeDAO::initialize();    
EmployeeAvailabilityDAO::initialize();
$requestData = json_decode(file_get_contents('php://input'));

switch ($_SERVER["REQUEST_METHOD"])   {
    case "POST":  
        $empObj= new Employee();
        $empObj->setAdminUserId($requestData->AdminUserId);
        $empObj->setFirstName($requestData->FirstName);
        $empObj->setLastName($requestData->LastName);
        $empObj->setEmployeeUserId($requestData->EmployeeUserId);
        $empObj->setPhone(strval($requestData->Phone));
        $empObj->setEmail($requestData->Email);
        $empObj->setJobTitleId($requestData->JobTitleId);
        $result= EmployeeDAO::setEmployee($empObj);
         header('Content-Type: application/json');

    
         echo json_encode($result);
     
         break;
         case "GET":
            if (isset($requestData->AdminUserId))    {
                $employees=EmployeeDAO::getEmployeesJobTitle($requestData->AdminUserId);
                $serializedEmployees = array();

                foreach ($employees as $employee)    {
                    $serializedEmployees[] = $employee->jsonSerialize();
                }
                header('Content-Type: application/json');
            //Return the entire array
            echo json_encode($serializedEmployees);   

            
            }
            else{
                 $employees=EmployeeDAO::getEmployees();
                $serializedEmployees = array();

                foreach ($employees as $employee)    {
                    $serializedEmployees[] = $employee->jsonSerialize();
                }
            }
                header('Content-Type: application/json');
            //Return the entire array
            echo json_encode($serializedEmployees);
        break;
        case "PUT":
            $empObj= new Employee();
            $empObj->setAdminUserId($requestData->AdminUserId);
            $empObj->setFirstName($requestData->FirstName);
            $empObj->setLastName($requestData->LastName);
            $empObj->setEmployeeUserId($requestData->EmployeeUserId);
            $empObj->setPhone(strval($requestData->Phone));
            $empObj->setEmail($requestData->Email);
            $empObj->setJobTitleId($requestData->JobTitleId);
        $result=  EmployeeDAO::updateEmployee($empObj);
        header('Content-Type: application/json');
        //Return the number of rows affected
        echo json_encode($result);
    break;
    case "DELETE":
        $result=  EmployeeDAO::DeleteEmployee($requestData->EmployeeUserId);
        header('Content-Type: application/json');
        //return the confirmation of deletion
        echo json_encode($result);
    break; 
    
    default:
    echo json_encode(array("message"=> "Você fala HTTP?"));
break;



       
}
