<?php
include_once("database.php");
$db_host = "localhost";
$db_username = "root";
$password = '';
$dbname="for_student";
$conn = new mysqli($db_host, $db_username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO master_date (name, dob, email,year)
VALUES ('John', '12-09-2003', 'john@example.com',8797889079)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>