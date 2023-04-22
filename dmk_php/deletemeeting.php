<?php

include("database.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
    $user_id = $request->id;
    $sql = "UPDATE meetings SET status='cancel' WHERE id= $user_id";
    if ($mysqli->query($sql) === TRUE) {
        echo json_encode(" Record updated successfully");
    }
    else {
        echo json_encode("Error delete record: " . $mysqli->connect_error);
    }
?>