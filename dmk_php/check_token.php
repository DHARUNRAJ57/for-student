<?php

include("database.php");
// state admin view
 $show_user = [];

$email=$_GET['email'];

$sql = "SELECT * FROM user_master WHERE email='$email'";

if ($result = mysqli_query($mysqli, $sql)) {
  $cr = 0;
  while ($row = mysqli_fetch_assoc($result)) {
     $show_user[$cr]['id'] = $row['id'];
     $show_user[$cr]['mode'] = $row['mode'];
     $show_user[$cr]['email'] = $row['email'];
     //$show_user[$cr]['expiry_link']=$row['expiry_link'];
     $show_user[$cr]['token']=$row['token'];
     $cr++;
  }
  echo json_encode(['data' =>  $show_user]);
} else {
  http_response_code(404);
}
?>