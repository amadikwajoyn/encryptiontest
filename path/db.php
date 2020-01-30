<?php

session_start();
// $db['db_host'] = 'localhost';
// $db['db_user'] = 'oluakain';
// $db['db_pass'] = 'e4T5q!n&yzUD';
// $db['db_name'] = 'oluakain_portal';

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = '';
$db['db_name'] = 'oluakaportal';
foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

?>