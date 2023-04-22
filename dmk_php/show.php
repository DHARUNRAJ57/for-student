<?php

include("database.php");
// state admin view
 $show_user = [];

$mode=$_GET['mode'];
if($mode == 0)
{
  
$sql = "SELECT  * , CONCAT(firstname,' ',lastname) as name FROM user_master where mode = 0  and profile_status =0 ORDER BY  date_added  DESC";

if ($result = mysqli_query($mysqli, $sql)) {
  $cr = 0;
  while ($row = mysqli_fetch_assoc($result)) {
     $show_user[$cr]['id'] = $row['id'];
     $show_user[$cr]['mode'] = $row['mode'];
     $show_user[$cr]['email'] = $row['email'];
     $show_user[$cr]['password'] = $row['password'];
     $show_user[$cr]['category'] = $row['category'];
     $show_user[$cr]['name'] = $row['name'];
     $show_user[$cr]['firstname'] = $row['firstname'];
     $show_user[$cr]['lastname'] = $row['lastname'];
     $show_user[$cr]['father_name'] = $row['father_name'];
     $show_user[$cr]['mother_name'] = $row['mother_name'];
     $show_user[$cr]['age'] = $row['age'];
     $show_user[$cr]['flat_no'] = $row['flat_no'];
     $show_user[$cr]['address1'] = $row['address1'];
     $show_user[$cr]['address2'] = $row['address2'];
     $show_user[$cr]['location_id'] = $row['location_id'];
     $show_user[$cr]['district'] = $row['district'];
     $show_user[$cr]['pincode'] = $row['pincode'];
     $show_user[$cr]['contact_no'] = $row['contact_no'];
     $show_user[$cr]['whatsapp_no'] = $row['whatsapp_no'];
     $show_user[$cr]['date_of_birth'] = $row['date_of_birth'];
     $show_user[$cr]['educational_qualification'] = $row['educational_qualification'];
     $show_user[$cr]['profession'] = $row['profession'];
     $show_user[$cr]['additional_qualification'] = $row['additional_qualification'];
     $show_user[$cr]['applied_role'] = $row['applied_role'];
     $show_user[$cr]['approval_status'] = $row['approval_status'];
     $show_user[$cr]['party_designation'] = $row['party_designation'];
     $show_user[$cr]['designation'] = $row['designation'];
     $show_user[$cr]['party_comments'] = $row['party_comments'];   
     $show_user[$cr]['constituency'] = $row['constituency'];
    $cr++;
  }
  echo json_encode(['data' =>  $show_user]);
} else {
  http_response_code(404);
}
}
// district admin view
else if($mode == 1)
{
  $sql = "SELECT  * , CONCAT(firstname,' ',lastname) as name FROM user_master where mode =1 and profile_status =0 ORDER BY  date_added  DESC";

  if($result = mysqli_query($mysqli,$sql))
 {
   $cr = 0;
   while($row = mysqli_fetch_assoc($result))
   {
     $show_user[$cr]['id'] = $row['id'];
     $show_user[$cr]['mode'] = $row['mode'];
     $show_user[$cr]['email'] = $row['email'];
     $show_user[$cr]['password'] = $row['password'];
     $show_user[$cr]['category'] = $row['category'];
     $show_user[$cr]['name'] = $row['name'];
     $show_user[$cr]['firstname'] = $row['firstname'];
     $show_user[$cr]['lastname'] = $row['lastname'];
     $show_user[$cr]['father_name'] = $row['father_name'];
     $show_user[$cr]['mother_name'] = $row['mother_name'];
     $show_user[$cr]['age'] = $row['age'];
     $show_user[$cr]['flat_no'] = $row['flat_no'];
     $show_user[$cr]['address1'] = $row['address1'];
     $show_user[$cr]['address2'] = $row['address2'];
     $show_user[$cr]['location_id'] = $row['location_id'];
     $show_user[$cr]['district'] = $row['district'];
     $show_user[$cr]['pincode'] = $row['pincode'];
     $show_user[$cr]['contact_no'] = $row['contact_no'];
     $show_user[$cr]['whatsapp_no'] = $row['whatsapp_no'];
     $show_user[$cr]['date_of_birth'] = $row['date_of_birth'];
     $show_user[$cr]['educational_qualification'] = $row['educational_qualification'];
     $show_user[$cr]['profession'] = $row['profession'];
     $show_user[$cr]['additional_qualification'] = $row['additional_qualification'];
     $show_user[$cr]['applied_role'] = $row['applied_role'];
     $show_user[$cr]['approval_status'] = $row['approval_status'];
     $show_user[$cr]['party_designation'] = $row['party_designation'];
     $show_user[$cr]['designation'] = $row['designation'];
     $show_user[$cr]['party_comments'] = $row['party_comments'];
     $show_user[$cr]['constituency'] = $row['constituency'];

     $cr++;
  }

    echo json_encode(['data'=>  $show_user]);
 }
 else
 {
   http_response_code(404);
 }
}
//office bearer
else{
  $sql ="SELECT  * , CONCAT(firstname,' ',lastname) as name FROM user_master where mode =2 and profile_status =0 ORDER BY  date_added  DESC";

  if($result = mysqli_query($mysqli,$sql))
 {
   $cr = 0;
   while($row = mysqli_fetch_assoc($result))
   {
     $show_user[$cr]['id'] = $row['id'];
     $show_user[$cr]['mode'] = $row['mode'];
     $show_user[$cr]['email'] = $row['email'];
     $show_user[$cr]['password'] = $row['password'];
     $show_user[$cr]['category'] = $row['category'];
     $show_user[$cr]['name'] = $row['name'];
     $show_user[$cr]['firstname'] = $row['firstname'];
     $show_user[$cr]['lastname'] = $row['lastname'];
     $show_user[$cr]['father_name'] = $row['father_name'];
     $show_user[$cr]['mother_name'] = $row['mother_name'];
     $show_user[$cr]['age'] = $row['age'];
     $show_user[$cr]['flat_no'] = $row['flat_no'];
     $show_user[$cr]['address1'] = $row['address1'];
     $show_user[$cr]['address2'] = $row['address2'];
     $show_user[$cr]['location_id'] = $row['location_id'];
     $show_user[$cr]['district'] = $row['district'];
     $show_user[$cr]['pincode'] = $row['pincode'];
     $show_user[$cr]['contact_no'] = $row['contact_no'];
     $show_user[$cr]['whatsapp_no'] = $row['whatsapp_no'];
     $show_user[$cr]['date_of_birth'] = $row['date_of_birth'];
     $show_user[$cr]['educational_qualification'] = $row['educational_qualification'];
     $show_user[$cr]['profession'] = $row['profession'];
     $show_user[$cr]['additional_qualification'] = $row['additional_qualification'];
     $show_user[$cr]['applied_role'] = $row['applied_role'];
     $show_user[$cr]['approval_status'] = $row['approval_status'];
     $show_user[$cr]['party_designation'] = $row['party_designation'];
     $show_user[$cr]['flat_no'] = $row['flat_no'];
     $show_user[$cr]['designation'] = $row['designation'];
     $show_user[$cr]['party_comments'] = $row['party_comments'];
     $show_user[$cr]['constituency'] = $row['constituency'];
     $show_user[$cr]['town_city'] = $row['town_city'];
     $show_user[$cr]['taluk'] = $row['taluk'];
     $show_user[$cr]['pincode'] = $row['pincode'];
     $show_user[$cr]['applied_posting'] = $row['applied_posting'];
     $show_user[$cr]['degree_major'] = $row['degree_major'];
     $show_user[$cr]['other_qualification'] = $row['other_qualification'];

     $cr++;
  }

    echo json_encode(['data'=>  $show_user]);
 }
 else
 {
   http_response_code(404);
 }
}
?>