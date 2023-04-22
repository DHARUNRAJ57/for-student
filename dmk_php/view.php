<?php

include("database.php");
// state admin view
$postdata = file_get_contents("php://input");
if (isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);
    $user_id = $request->user_id;
    $view_user = [];

    $mode = $_GET['mode'];
    if ($mode == 0) {

        $sql = "SELECT  *,CONCAT(firstname,' ',lastname) as name FROM user_master where mode = 0 and id =$user_id and deleted = 0";

        if ($result = mysqli_query($mysqli, $sql)) {
            $cr = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $view_user[$cr]['id'] = $row['id'];
                $view_user[$cr]['mode'] = $row['mode'];
                 $view_user[$cr]['email'] = $row['email'];
                 $view_user[$cr]['password'] = $row['password'];
                 $view_user[$cr]['category'] = $row['category'];
                 $view_user[$cr]['name'] = $row['name'];
                 $view_user[$cr]['father_name'] = $row['father_name'];
                 $view_user[$cr]['mother_name'] = $row['mother_name'];
                 $view_user[$cr]['age'] = $row['age'];
                 $view_user[$cr]['flat_no'] = $row['flat_no'];
                 $view_user[$cr]['address1'] = $row['address1'];
                 $view_user[$cr]['address2'] = $row['address2'];
                 $view_user[$cr]['location_id'] = $row['location_id'];
                 $view_user[$cr]['district'] = $row['district'];
                 $view_user[$cr]['pincode'] = $row['pincode'];
                 $view_user[$cr]['contact_no'] = $row['contact_no'];
                 $view_user[$cr]['whatsapp_no'] = $row['whatsapp_no'];
                 $view_user[$cr]['date_of_birth'] = $row['date_of_birth'];
                 $view_user[$cr]['educational_qualification'] = $row['educational_qualification'];
                 $view_user[$cr]['profession'] = $row['profession'];
                 $view_user[$cr]['additional_qualification'] = $row['additional_qualification'];
                 $view_user[$cr]['applied_role'] = $row['applied_role'];
                 $view_user[$cr]['approval_status'] = $row['approval_status'];
                 $view_user[$cr]['party_designation'] = $row['party_designation'];
                 $view_user[$cr]['designation'] = $row['designation'];
                 $view_user[$cr]['party_comments'] = $row['party_comments'];
                $cr++;
            }
            echo json_encode(['data' =>  $view_user]);
        } else {
            http_response_code(404);
        }
    }
    // district admin view
    else if ($mode == 1) {
        $sql = "SELECT  *,CONCAT(firstname,' ',lastname) as name FROM user_master where mode = 1 and id =$user_id and deleted = 0";

        if ($result = mysqli_query($mysqli, $sql)) {
            $cr = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                 $view_user[$cr]['id'] = $row['id'];
                 $view_user[$cr]['mode'] = $row['mode'];
                 $view_user[$cr]['email'] = $row['email'];
                 $view_user[$cr]['password'] = $row['password'];
                 $view_user[$cr]['category'] = $row['category'];
                 $view_user[$cr]['name'] = $row['name'];
                 $view_user[$cr]['father_name'] = $row['father_name'];
                 $view_user[$cr]['mother_name'] = $row['mother_name'];
                 $view_user[$cr]['age'] = $row['age'];
                 $view_user[$cr]['flat_no'] = $row['flat_no'];
                 $view_user[$cr]['address1'] = $row['address1'];
                 $view_user[$cr]['address2'] = $row['address2'];
                 $view_user[$cr]['location_id'] = $row['location_id'];
                 $view_user[$cr]['district'] = $row['district'];
                 $view_user[$cr]['pincode'] = $row['pincode'];
                 $view_user[$cr]['contact_no'] = $row['contact_no'];
                 $view_user[$cr]['whatsapp_no'] = $row['whatsapp_no'];
                 $view_user[$cr]['date_of_birth'] = $row['date_of_birth'];
                 $view_user[$cr]['educational_qualification'] = $row['educational_qualification'];
                 $view_user[$cr]['profession'] = $row['profession'];
                 $view_user[$cr]['additional_qualification'] = $row['additional_qualification'];
                 $view_user[$cr]['applied_role'] = $row['applied_role'];
                 $view_user[$cr]['approval_status'] = $row['approval_status'];
                 $view_user[$cr]['party_designation'] = $row['party_designation'];
                 $view_user[$cr]['designation'] = $row['designation'];
                 $view_user[$cr]['party_comments'] = $row['party_comments'];
                $cr++;
            }
            echo json_encode(['data' =>  $view_user]);
        } else {
            http_response_code(404);
        }
    }
    //office bearer
    else {
        $sql = "SELECT  *,CONCAT(firstname,' ',lastname) as name FROM user_master where mode = 2 and id =$user_id and deleted = 0";

        if ($result = mysqli_query($mysqli, $sql)) {
            $cr = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                 $view_user[$cr]['id'] = $row['id'];
                 $view_user[$cr]['mode'] = $row['mode'];
                 $view_user[$cr]['email'] = $row['email'];
                 $view_user[$cr]['password'] = $row['password'];
                 $view_user[$cr]['category'] = $row['category'];
                 $view_user[$cr]['name'] = $row['name'];
                 $view_user[$cr]['father_name'] = $row['father_name'];
                 $view_user[$cr]['mother_name'] = $row['mother_name'];
                 $view_user[$cr]['age'] = $row['age'];
                 $view_user[$cr]['flat_no'] = $row['flat_no'];
                 $view_user[$cr]['address1'] = $row['address1'];
                 $view_user[$cr]['address2'] = $row['address2'];
                 $view_user[$cr]['location_id'] = $row['location_id'];
                 $view_user[$cr]['district'] = $row['district'];
                 $view_user[$cr]['pincode'] = $row['pincode'];
                 $view_user[$cr]['contact_no'] = $row['contact_no'];
                 $view_user[$cr]['whatsapp_no'] = $row['whatsapp_no'];
                 $view_user[$cr]['date_of_birth'] = $row['date_of_birth'];
                 $view_user[$cr]['educational_qualification'] = $row['educational_qualification'];
                 $view_user[$cr]['profession'] = $row['profession'];
                 $view_user[$cr]['additional_qualification'] = $row['additional_qualification'];
                 $view_user[$cr]['applied_role'] = $row['applied_role'];
                 $view_user[$cr]['approval_status'] = $row['approval_status'];
                 $view_user[$cr]['party_designation'] = $row['party_designation'];
                 $view_user[$cr]['designation'] = $row['designation'];
                 $view_user[$cr]['party_comments'] = $row['party_comments'];
                $cr++;
            }

            echo json_encode(['data' =>  $view_user]);
        } else {
            http_response_code(404);
        }
    }
} else {
    http_response_code(404);
}
?>