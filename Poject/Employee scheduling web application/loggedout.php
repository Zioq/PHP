<?php

// Tong

require_once "inc/Utilities/LoginManager.php";

if (LoginManager::verifyLogin()) {
    session_destroy();
    
    header('Refresh:1; URL=pro.corona.php');
    echo 'You have logged out. You will be redirected to login page in 1 seconds.';
}else{
    echo 'something wrong';
}
