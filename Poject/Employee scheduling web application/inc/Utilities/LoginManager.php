<?php

class LoginManager{

    //This function check if the user is login 
    static function verifyLogin() {

        //Check for a session
        if(session_id() =='' && !isset($_SESSION)) {

            //session start
            session_start();
        }
        if(isset($_SESSION['loggedin'])) {

            return true;


        } else {
            //Destory any session
            session_destroy();
            //Send back to the login page
            header('Location: pro.corona.php');

            return false;
        }
    }
    
}
