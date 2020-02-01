<?php

session_start();

// $db['db_host'] = 'localhost';
// $db['db_user'] = 'root';
// $db['db_pass'] = '';
// $db['db_name'] = 'oluakaportal';
// foreach($db as $key => $value){
//     define(strtoupper($key), $value);
// }

// $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
set_exception_handler(function($e) {
	error_log($e->getMessage());
	exit('Something Weird Just Happened');
});

$conn = new mysqli("localhost", "root", "", "oluakaportal");
$conn->set_charset("utf8mb4");

?>