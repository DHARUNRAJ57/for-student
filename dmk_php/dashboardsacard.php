
<?php

include("database.php");
// $postdata = file_get_contents("php://input");


$sql6 = "SELECT COUNT(*) AS redob FROM `user_master` WHERE category ='OB'";
$result6 = mysqli_query($mysqli, $sql6);
$row6= mysqli_fetch_assoc($result6);
$regob=  $row6['redob'];

$sql7 = "SELECT COUNT(*) AS appob FROM `role_change` WHERE approval ='approved'";
$result7 = mysqli_query($mysqli, $sql7);
$row7= mysqli_fetch_assoc($result7);
$appob=  $row7['appob'];

$sql8 = "SELECT COUNT(*) AS activeob FROM `user_master` WHERE approval_status ='Active'AND category ='OB'";
$result8 = mysqli_query($mysqli, $sql8);
$row8= mysqli_fetch_assoc($result8);
$activeob=$row8['activeob'];

echo json_encode(['REGOB'=>$regob,'APPOB'=>$appob,'ACTIVEOB'=>$activeob]);
?>