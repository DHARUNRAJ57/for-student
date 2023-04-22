<?php
include("database.php");
$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);
    $email = mysqli_real_escape_string($mysqli, trim($request->email));
    $user_email = [];
    $sql = "SELECT email FROM user_master";
    if ($result = mysqli_query($mysqli, $sql)) {
        $cr = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $user_email[$cr]['email'] = $row['email'];
            $table_email = $user_email[$cr]['email'];

            if ($table_email == $email) {
               echo json_encode ("true");
            } else {
                  echo "false";
                $cr++;
            }



        }
    } else {
        http_response_code(404);
    }
}
else {
    http_response_code(404);
}

?>