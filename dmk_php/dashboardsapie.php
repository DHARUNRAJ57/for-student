<?php

include("database.php");


//CSE
$sql = "SELECT COUNT(*) AS cse FROM `user_master`WHERE category ='EN' AND  educational_qualification ='B.E' AND  degree_major ='CSE' ";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
$cse=  $row['cse'];
// ECHO $cse;
// echo json_encode("dacse:".$cse);
//EEE
$sql1 = "SELECT COUNT(*) AS eee FROM `user_master` WHERE  category ='EN' AND educational_qualification ='B.E' AND degree_major ='EEE'";
$result1 = mysqli_query($mysqli, $sql1);
$row1= mysqli_fetch_assoc($result1);
$eee=  $row1['eee'];
// echo json_encode("daeee:".$eee);
//ECE
$sql2 = "SELECT COUNT(*) AS ece FROM `user_master` WHERE  category ='EN' AND educational_qualification ='B.E' AND degree_major ='ECE'";
$result2 = mysqli_query($mysqli, $sql2);
$row2= mysqli_fetch_assoc($result2);
$ece=  $row2['ece'];
// echo json_encode("daece:".$ece);
//MECH
$sql3 = "SELECT COUNT(*) AS mech FROM `user_master` WHERE  category ='EN' AND educational_qualification ='B.E' AND degree_major ='MECH'";
$result3 = mysqli_query($mysqli, $sql3);
$row3= mysqli_fetch_assoc($result3);
$mech=  $row3['mech'];
// echo json_encode("damech:".$mech);

//CIVIL
$sql4 = "SELECT COUNT(*) AS civil FROM `user_master` WHERE   category ='EN' AND educational_qualification ='B.E' AND degree_major ='CIVIL'";
$result4 = mysqli_query($mysqli, $sql4);
$row4= mysqli_fetch_assoc($result4);
$civil=  $row4['civil'];
// echo json_encode("dacivil:".$civil);
//others
$sql5 = "SELECT COUNT(*) AS others FROM `user_master` WHERE   category ='EN' AND educational_qualification ='B.E' AND degree_major ='OTHERS'";
$result5 = mysqli_query($mysqli, $sql5);
$row5= mysqli_fetch_assoc($result5);
$others=  $row5['others'];

    


echo json_encode(['CSE' => $cse ,'EEE'=>$eee,'ECE'=>$ece,'MECH'=>$mech,'CIVIL'=>$civil,'OTHERS'=>$others ]);
    


// echo json_encode("datacse:".$cse. ",daeee:".$eee.",damech:".$mech.",dacivil:".$civil.",daothers:".$others);
?>