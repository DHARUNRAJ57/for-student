<?php
 $whatsapp_no=[];
include("database.php");  
$sql = "SELECT whatsapp_no FROM user_master";
 if ($result = mysqli_query($mysqli, $sql)) {
    $cr = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $whatsapp_no[$cr]['whatsapp_no'] = $row['whatsapp_no'];
        $cr++;
    }
    echo json_encode($whatsapp_no);
}
?>