<?php
include_once("database.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
if(isset($postdata) && !empty($postdata))
{
$pwd = mysqli_real_escape_string($mysqli, trim($request->password));
$whatsapp_no = mysqli_real_escape_string($mysqli, trim($request->username));
$sql = "SELECT * FROM user_master where whatsapp_no='$whatsapp_no' and password='$pwd'";
if($result = mysqli_query($mysqli,$sql))
{
$rows = array();
while($row = mysqli_fetch_assoc($result))
{
$rows[] = $row;
}
echo json_encode($rows);
}
else
{
http_response_code(404);
}
}
?>
