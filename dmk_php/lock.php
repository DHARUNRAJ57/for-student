
<?php
include_once("database.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
 $whatsapp_no = mysqli_real_escape_string($mysqli, trim($request->whatsapp_no));
// $whatsapp_no='9791603352';
$sql = "UPDATE user_master SET profile_status= '1' WHERE whatsapp_no='$whatsapp_no'";
if ($mysqli->query($sql) === TRUE) {
   
     echo json_encode("Your profile is locked please contact admin");
    }
else
{
http_response_code(404);
}

?>