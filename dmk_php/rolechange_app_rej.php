<?php

include("database.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$status= $request->status;
$user_id = $request->user_id;
// approve
if ($status == "approve") {
    if (isset($postdata) && !empty($postdata)) {
     
       
        $party_designation =$request->new_role;
        $sql = "UPDATE role_change SET approval = 'approved' where user_maser_id =  ".$user_id;
        
        // if ($mysqli->query($sql) === TRUE) {
        //     $authdata = [
        //         'approval' => 'approved'
        //     ];
        //     echo json_encode($authdata);

        // } else {
        //     echo "Error updating record: " . $mysqli->connect_error;
        // }
        $sql1 = "UPDATE user_master SET applied_role = '".$party_designation."',role_change_status='approved' where id =  ".$user_id;
        if ($mysqli->query($sql1) === TRUE && $mysqli->query($sql) === TRUE) {
            $authdata = [
                'message' => "New role change approved!."
            ];
            echo json_encode($authdata);

        } else {
            echo "Error updating record: " .$mysqli->connect_error;
        }
   }
}
//REJECT
 else {
    $sql = "UPDATE role_change SET approval = 'rejected' where user_maser_id = ".$user_id;
    $sql1 = "UPDATE user_master SET role_change_status='rejected' where id =  ".$user_id;

    if ($mysqli->query($sql1) === TRUE && $mysqli->query($sql) === TRUE) {
        $authdata = [
                'message' => "records updated successfully!."
            ];
        echo json_encode($authdata);

    } else {
        echo "Error updating record: " . $mysqli->connect_error;
    }
}
?>