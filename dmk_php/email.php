<?php
 $user_email=[];
include("database.php");  $user_email = [];
$sql = "SELECT email FROM user_master";
 if ($result = mysqli_query($mysqli, $sql)) {
    $cr = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $user_email[$cr]['email'] = $row['email'];
        $cr++;
    }
    echo json_encode($user_email);
}
?>