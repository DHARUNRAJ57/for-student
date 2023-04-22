<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");
// $db_host = '217.21.87.205';
// $db_username = 'u852023448_dmk_evm_db';
// $db_password = 'Password@2023';
// $db_name = 'u852023448_dmk_evm_db';
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'engineer_db';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);

if ($mysqli->connect_error) {
die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>
