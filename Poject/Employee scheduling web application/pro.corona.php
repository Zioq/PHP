<?php

// by Robert
// $_SESSION 2d array adjusted by Tong

require_once("inc/config.inc.php");
require_once("inc/Entities/AdminLogin.class.php");
require_once("inc/Entities/EmployeeLogin.class.php");
require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/AdminLoginDAO.class.php");
require_once("inc/Utilities/EmployeeLoginDAO.class.php");
require_once("inc/Utilities/Page.class.php");

//Check if the form was poasted

if(!empty($_POST)) {

    if($_POST["action"]=="login") {
        //Initialize the DAO
        AdminLoginDAO::initialize();
        EmployeeLoginDAO::initialize();
        
        if(AdminLoginDAO::getAdmin($_POST['username']))
        {
            $authAdmin = AdminLoginDAO::getAdmin($_POST['username']);
            
            if($authAdmin->verifyAdminPassword(($_POST['password'])))
            {   
                //Start the session
                session_start();
                //Set the user to logged in
                if (!empty($_POST)) {
                    $_SESSION["loggedin"]["username"] = $_POST["username"];
                    $_SESSION["loggedin"]["user"]="admin";
                }
                header('Location: AdminHomePage.php');
            }
            else{
                
                echo "<ul><li><h5> Please Enter a valid username and password </h5></li></ul>";
                // header('Location:pro.corona.php');
            }

        }
        elseif(EmployeeLoginDAO::getEmployee($_POST['username']))
        {
            $authEmployee = EmployeeLoginDAO::getEmployee($_POST['username']);
            
            if($authEmployee->verifyEmployeePassword(($_POST['password']))) {
                 
                //Start the session
                session_start();
                //Set the user to logged in
                if (!empty($_POST)) {
                     $_SESSION["loggedin"]["username"] = $_POST["username"];
                     $_SESSION["loggedin"]["user"]="employee";
                }
                header('Location: EmployeeHomePage.php');
            }
            else {
                Page::notify('Please Enter a valid username and password.');
                // header('Location:pro.corona.php');
            }
        }
        else { 
            Page::notify('Please Enter a valid username and password.');


        } 

    }


}

//Set the age Title
Page::$_title ="Corona Project";
Page::header();
Page::showLogin();
Page::footer();
