<?php

include("database.php");

$district=[];

$sql="SELECT district, COUNT(*) as count  FROM user_master WHERE category ='EN'GROUP BY district";
 $result = mysqli_query($mysqli, $sql);
// $row = mysqli_fetch_assoc($result);
// $graph=  $row['district'];
$cr=0;
while ($row = mysqli_fetch_assoc($result)) {
    $district[$cr]['district'] = $row['district'];
    $district[$cr]['count'] = $row['count'];
    $cr++;

}
echo json_encode($district);

?>