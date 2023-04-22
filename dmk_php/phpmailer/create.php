<?php
include("database.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$postdata = file_get_contents("php://input");
function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}
$category=$_GET['category'];
if($category=='SA')
{
    if(isset($postdata) && !empty($postdata))
    {
    $request = json_decode($postdata);
    $email = mysqli_real_escape_string($mysqli, trim($request->email));
    $firstname=$request->firstname;
    $lastname=$request->lastname;
    $location_id=$request->location_id;
    // $district=$request->district;
     $designation=$request->designation;
    $party_designation=$request->party_designation;
    $status_approval=$request->approval_status;
    $mode=$request->mode;
    $whatsapp_no=$request->whatsapp_no;
    $password=randomPassword();

    $sql = "INSERT INTO user_master(mode,email,password,category,firstname,lastname,location_id,approval_status,party_designation,whatsapp_no) 
    VALUES ($mode,'$email','$password','SA','$firstname','$lastname',$location_id,'$status_approval','$party_designation','$whatsapp_no')";
    if ($mysqli->query($sql) === TRUE) {
    $authdata = [
    'mode'=>$mode,
    'password'=>$password,
    'category'=>'SA',
    'firstname' => $firstname,
    'lastname' => $lastname,
    'location_id'=>$location_id,
    // 'district' => $district,
    'approval_status' =>$status_approval,
    'party_designation' => $party_designation,
    // 'designation' =>$designation,
    'whatsapp_no'=>$request->whatsapp_no,
    ];
    echo json_encode($authdata);
    send_mail($email,$whatsapp_no,$password,$firstname,$lastname,$category);
    }
    }
}
else if($category=='DA')
{
    if(isset($postdata) && !empty($postdata))
{
$request = json_decode($postdata);
$email = mysqli_real_escape_string($mysqli, trim($request->email));
$firstname=$request->firstname;
$lastname=$request->lastname;
//$father_name=$request->father_name;
//$parent_number=$request->parent_number;
$location_id=$request->location_id;
$district=$request->district;
// $designation=$request->designation;
$whatsapp_no=$request->whatsapp_no;
$party_designation=$request->party_designation;
$status_approval=$request->approval_status;
// $constituency=$request->constituency;
$mode=$request->mode;
$password=randomPassword();

$sql = "INSERT INTO user_master(mode,email,category,firstname,lastname,location_id,district,approval_status,party_designation,whatsapp_no,password)VALUES ($mode,'$email','DA','$firstname','$lastname',$location_id,'$district','$status_approval','$party_designation','$whatsapp_no','$password')";
if ($mysqli->query($sql) === TRUE) {
$authdata = [
'mode'=>$mode,
'email'=>$email,
'category'=>'DA',
'firstname' => $firstname,
'lastname' => $lastname,
'location_id'=>$location_id,
'district' => $district,
'approval_status' =>$status_approval,
'party_designation' => $party_designation,
'whatsapp_no' =>$whatsapp_no,
// 'constituency'=>$constituency
//'id' => mysqli_insert_id($mysqli)
];
echo json_encode($authdata);
send_mail($email,$whatsapp_no,$password,$firstname,$lastname,$category);
}
}
}

else{
    if(isset($postdata) && !empty($postdata))
{
$request = json_decode($postdata);
$email = mysqli_real_escape_string($mysqli, trim($request->email));
$firstname=$request->firstname;
$lastname=$request->lastname;
$father_name=$request->father_name;
$mother_name = $request->mother_name;
$age=$request->age;
$educational_qualification=$request->educational_qualification;
$date_of_birth=$request->date_of_birth;
$additional_qualification=$request->additional_qualification;
$contact_no=$request->contact_no;
$whatsapp_no=$request->whatsapp_no;
$profession=$request->profession;
$address1=$request->address1;
$applied_role=$request->applied_role;
$party_comments=$request->party_comments;
$location_id=$request->location_id;
$mode=$request->mode;
$constituency=$request->constituency;
$district=$request->district;


$sql = "INSERT INTO user_master(mode,email,firstname,lastname,father_name,mother_name,age,address1,location_id,contact_no,whatsapp_no,date_of_birth,educational_qualification,profession,additional_qualification,applied_role,party_comments,category,constituency,district) VALUES ($mode,'$email','$firstname','$lastname','$father_name','$mother_name','$age','$address1',$location_id,$contact_no,$whatsapp_no,'$date_of_birth','$educational_qualification','$profession','$additional_qualification','$applied_role','$party_comments','OB','$constituency','$district')";
if ($mysqli->query($sql) === TRUE) {
$authdata = [

//'id' => mysqli_insert_id($mysqli)
'category'=>'OB',
'mode'=>$mode,
'firstname' =>  $firstname,
'lastname'  =>  $lastname,
'father_name'   =>  $father_name,
'mother_name'=>$mother_name,
'age'   =>  $age,
'educational_qualification' =>  $educational_qualification,
'date_of_birth' =>  $date_of_birth,
'additional_qualification'  =>  $additional_qualification,
'contact_no'    =>  $contact_no,
'whatsapp_no'   =>  $whatsapp_no,
'profession'    =>  $profession,
'address1'  =>  $address1,
'applied_role'  =>  $applied_role,
'party_comments'    =>  $party_comments,
'location_id'   =>  $location_id,
'constituency'=>$constituency,
'district'=>$district

];
echo json_encode($authdata);
// send_mail($email,$whatsapp_no,$password,$firstname,$lastname,$category);
}
}
}

// send_mail('ragasudhaambayeram@gmail.com','9791603352','$password','RAGASUDHA','AMBAYERAM','DA');
function send_mail($email,$whatsapp_no,$password,$firstname,$lastname,$category){
$emailId = $email;
$mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='balasuryas44210@gmail.com';
    $mail->Password='tkecxutkxbkuincq';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->setFrom('EW ADMIN');
    $mail->addAddress($emailId);
    $mail->isHTML(true);
    $mail->Subject="EW Admin";
    // $mail->Body="hi"; file_get_contents('path/to/email-template.html');
    // $mail->Body="'<b>$firstname $lastname</b>' was self registered in DMK WINGS portal by <b>$email</b>.";
    if($category=='SA'){
    $mail->Body="Dear $firstname $lastname,<br>You have been added as a <b>State Admin </b>in Engineer Wing Portal.<br>
      Please access the portal with the following credentials:<br>
         <b>App Link:https://redmindtech.github.io/Dmk-Wings/<br>
	         UserName: $whatsapp_no<br>
		    Password:$password<br></b>

	Please contact Admin (Phone) for queries.<br>

Thanks,<br>
EW Admin.";
    }
    else{
        $mail->Body="Dear $firstname $lastname,<br>You have been added as a <b>District Admin</b> in Engineer Wing Portal.<br>
        Please access the portal with the following credentials:<br>
        <b> App Link:https://redmindtech.github.io/Dmk-Wings/<br>
      	UserName: $whatsapp_no<br>
        Password:$password<br></b>
  
      Please contact Admin (Phone) for queries.<br>
  
  Thanks,<br>
  EW Admin.";
    }
    $mail->send();
    echo "MAIL SEND";
    // echo json_encode("hi");
}
?>
