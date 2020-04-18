<?php



require_once "inc/config.inc.php";

require_once "inc/Entities/Admin.class.php";
require_once "inc/Entities/AdminLogin.class.php";

require_once "inc/Utilities/PDOService.class.php";
require_once "inc/Utilities/AdminDAO.class.php";
require_once "inc/Utilities/AdminLoginDAO.class.php";
require_once "inc/Utilities/AdminRestClient.php";
require_once "inc/Utilities/Page.class.php";

if (!empty($_POST) && $_POST['action'] == 'createAdmin') {


    $secretKey = "6LfQ9ugUAAAAAN_xIERl6aGAyjcZoXkvDScX8cyM";
    $responseKey = $_POST['g-recaptcha-response'];
    $url ="https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
    $response = file_get_contents($url);
    $response = json_decode($response);

    if($response->success) {

        if ($_POST['password'] != $_POST['confirmedPassword']) {
            echo 'Please make sure that you input the same password for confirmation.';
        } else {
    
            $postData = [
                'resource' => 'admin',  // specify what resource to deal with
                'adminId' => $_POST['adminId'],
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'companyName' => $_POST['companyName'],
            ];
            $resultAdmin = AdminRestClient::call('POST', $postData);
    
            //var_dump($resultAdmin);
    
            // if insert admin successful
            // insert adminLogin accordingly
            if (is_numeric($resultAdmin)) {
                $postData = [
                    'resource' => 'adminLogin',
                    'adminId' => $_POST['adminId'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                ];
                AdminRestClient::call('POST', $postData);
                // report success
                Page::notify('Admin ' . $_POST['adminId'] . ' signed up.');
                header('Location: pro.corona.php');

            } else {
                Page::notify($resultAdmin);
            }
        }


    }
    else {
        Page::notify('Please check the reCAPTCHA');
    }


    
}


Page::$_title = 'Sign up';
Page::header();
Page::signUp();
Page::footer();
