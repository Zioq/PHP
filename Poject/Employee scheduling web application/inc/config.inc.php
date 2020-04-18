<?php

// DB
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_NAME','project');
define('DB_PASS','');

// REST API
$lastSlashIndex = strrpos($_SERVER['REQUEST_URI'], '/');
$pathAdmin = 'http://localhost' . substr($_SERVER['REQUEST_URI'], 0, $lastSlashIndex) . '/AdminRestAPI.php';
$pathEmployee = 'http://localhost' . substr($_SERVER['REQUEST_URI'], 0, $lastSlashIndex) . '/EmployeeRestAPI.php';

define('ADMIN_API_URL', $pathAdmin);
define('EmployeeAPI_URL', $pathEmployee);
