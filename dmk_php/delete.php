<?php

include("database.php");
$postdata = file_get_contents("php://input");
//if(isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);
    $user_id = $request->user_id;
    $result = $mysqli->query("SELECT COUNT(user_maser_id ) as total FROM  role_change WHERE user_maser_id = $user_id");
    $data = $result->fetch_assoc();
    $total = $data['total'];
    // echo "Total number of rows: " . $total;
    if ($total <= 1) {
        $sql1 = "DELETE FROM role_change WHERE user_maser_id = $user_id";
        if ($mysqli->query($sql1) === TRUE) {
            $sql = "DELETE FROM user_master WHERE id= $user_id";
            if ($mysqli->query($sql) === TRUE) {
                echo json_encode(" Record deleted successfully");

            } else {
                echo json_encode("Error delete record: " . $mysqli->connect_error);
            }
        } else {
            $sql = "DELETE FROM user_master WHERE id=$user_id";
            if ($mysqli->query($sql) === TRUE) {
                echo json_encode(" Record deleted successfully");

            } else {
                echo json_encode("Error delete record: " . $mysqli->connect_error);
            }
        }

    }
?>
