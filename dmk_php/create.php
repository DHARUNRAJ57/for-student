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
    $name=$firstname.$lastname;
    $location_id=$request->location_id;
    // $district=$request->district;
    //   $designation=$request->designation;
    $party_designation=$request->party_designation;
    $status_approval=$request->approval_status;
    $mode=$request->mode;
    $phone_no=$request->whatsapp_no;
    $code='91';
     $whatsapp_no=$code.$phone_no;
     $contact_no=$request->contact_no;
    $password=randomPassword();

    $sql = "INSERT INTO user_master(mode,email,password,category,firstname,lastname,location_id,approval_status,party_designation,whatsapp_no,profile_status,contact_no) 
    VALUES ('$mode','$email','$password','SA','$firstname','$lastname','$location_id','$status_approval','$party_designation','$phone_no','0',$contact_no)";
    if ($mysqli->query($sql) === TRUE) {
    $authdata = [
    'email'=>$email,
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
    'whatsapp_no'=>$phone_no,
    'password'=>$password,
    ];
    // $authdata='success';
    $admin="State admin";
     send_mail($email,$phone_no,$password,$firstname,$lastname,$category);
     whatsapp($whatsapp_no,$password,$admin,$phone_no);
echo json_encode($authdata);
}
    else{
        echo json_encode("Error delete record: " . $mysqli->connect_error);
    }
    // send_mail($email,$whatsapp_no,$password,$firstname,$lastname,$category);
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
$name=$firstname.$lastname;
//$father_name=$request->father_name;
//$parent_number=$request->parent_number;
$location_id=$request->location_id;
$district=$request->district;
// $designation=$request->designation;
$phone_no=$request->whatsapp_no;
$code='91';
 $whatsapp_no=$code.$phone_no;
$party_designation=$request->party_designation;
$status_approval=$request->approval_status;
// $constituency=$request->constituency;
$mode=$request->mode;
$contact_no=$request->contact_no;
$password=randomPassword();

$sql = "INSERT INTO user_master(mode,email,category,firstname,lastname,location_id,district,approval_status,party_designation,whatsapp_no,password,profile_status,contact_no)
VALUES ($mode,'$email','DA','$firstname','$lastname',$location_id,'$district','$status_approval','$party_designation','$phone_no','$password','0','$contact_no')";
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
'whatsapp_no' =>$phone_no,
'password'=>$password,
// 'constituency'=>$constituency
//'id' => mysqli_insert_id($mysqli)
];
$admin="District admin";
send_mail($email,$phone_no,$password,$firstname,$lastname,$category);
whatsapp($whatsapp_no,$password,$admin,$phone_no);
echo json_encode($authdata);

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
$name=$firstname.$lastname;
$father_name=$request->father_name;
$mother_name = $request->mother_name;
$age=$request->age;
$educational_qualification=$request->educational_qualification;
$date_of_birth=$request->date_of_birth;
$additional_qualification=$request->additional_qualification;
$contact=$request->contact_no;
$code='91';
 $contact_no=$code.$contact;
 $approval_status=$request->approval_status;
 $phone_no=$request->whatsapp_no;
$code='91';
 $whatsapp_no=$code.$phone_no;
$profession=$request->profession;
$address1=$request->flat_no;
$applied_role=$request->applied_role;
$party_comments=$request->party_comments;
$location_id=$request->location_id;
$mode=$request->mode;
$constituency=$request->constituency;
$district=$request->district;
$category='OB';
 $street_name=$request->street_name;
$password=randomPassword();
$town_city=$request->town_city;
$taluk=$request->taluk;
$pincode=$request->pincode;
 $applied_posting=$request->applied_posting;
 $other_qualification=$request->other_qualification;
$degree_major=$request->degree_major;


$sql = "INSERT INTO user_master(mode,email,firstname,lastname,father_name,mother_name,age,flat_no,location_id,contact_no,whatsapp_no,date_of_birth,educational_qualification,profession,additional_qualification,applied_role,party_comments,category,constituency,district,password,approval_status,profile_status,address1,town_city,taluk,pincode,applied_posting,other_qualification,degree_major) 
VALUES ($mode,'$email','$firstname','$lastname','$father_name','$mother_name','$age','$address1',$location_id,$contact,$phone_no,'$date_of_birth','$educational_qualification','$profession','$additional_qualification','$applied_role','$party_comments','OB','$constituency','$district','$password','$approval_status','0','$street_name','$town_city','$taluk','$pincode','$applied_posting','$other_qualification','$degree_major')";
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
'contact_no'    =>  $contact,
'whatsapp_no'   =>  $phone_no,
'profession'    =>  $profession,
'flat_no'  =>  $address1,
'applied_role'  =>  $applied_role,
'party_comments'    =>  $party_comments,
'location_id'   =>  $location_id,
'constituency'=>$constituency,
'district'=>$district,
'password'=>$password,
'approval_status'=>$approval_status,
 'address1'=>$street_name,
 'town_city'=>$town_city,
 'taluk'=>$taluk,
 'pincode'=>$pincode,
 'applied_posting'=>$applied_posting,
 'other_qualification'=>$other_qualification,
'degree_major'=>$degree_major
];
$admin="Office bearer";

// send_mail($email,$phone_no,$password,$firstname,$lastname,$category);
// whatsapp($whatsapp_no,$password,$admin,$phone_no);
echo json_encode($authdata);
}
// 
}
}

// send_mail('ragasudhaambayeram@gmail.com','9791603352','$password','RAGASUDHA','AMBAYERAM','DA');
function send_mail($email,$phone_no,$password,$firstname,$lastname,$category){
$emailId = $email;
$mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='balasuryas44210@gmail.com';
    $mail->Password='tkecxutkxbkuincq';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->setFrom("balarsuyas44210@gmail.com");//put mail from
    // $mail->addAddress("balasuryas44208@gmail.com");
    $mail->addAddress($emailId);
    $mail->isHTML(true);
    $mail->Subject="EW Admin";
    // $mail->Body="hi"; file_get_contents('path/to/email-template.html');
    // $mail->Body="'<b>$firstname $lastname</b>' was self registered in DMK WINGS portal by <b>$email</b>.";
    if($category=='SA'){
    $mail->Body="Dear $firstname $lastname,<br>You have been added as a <b>State Admin </b>in Engineer Wing Portal.<br>
             Please access the portal with the following credentials:<br>
              <b>App Link:https://redmindtech.github.io/Dmk-Wings/<br>
	         UserName: $phone_no<br>
		    Password:$password<br></b>
	        Please contact Admin (Phone) for queries.<br>
            Thanks,<br>
            EW Admin.";
    }
   else if($category=='DA'){        
        $mail->Body="Dear $firstname $lastname,<br>You have been added as a <b>District Admin</b> in Engineer Wing Portal.<br>
        Please access the portal with the following credentials:<br>
        <b> App Link:https://redmindtech.github.io/Dmk-Wings/<br>
      	UserName: $phone_no<br>
        Password:$password<br></b>  
        Please contact Admin (Phone) for queries.<br>  
        Thanks,<br>
        EW Admin.";
    }
    else{
        $mail->Body="Dear $firstname $lastname,<br>You have been added as a <b>Office Bearer</b> in Engineer Wing Portal.<br>
        Please access the portal with the following credentials:<br>
        <b> App Link:https://redmindtech.github.io/Dmk-Wings/<br>
      	UserName: $phone_no<br>
        Password:$password<br></b>  
        Please contact Admin (Phone) for queries.<br>  
        Thanks,<br>
        EW Admin.";  
    }
    $mail->send();
    // return  "MAIL SEND";
    //  echo json_encode("MAIL SEND");
}

function whatsapp($whatsapp_no,$password,$admin,$phone_no){
    $curl = curl_init();



        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://graph.facebook.com/v15.0/115641688109792/messages',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS     => json_encode(array(
                'messaging_product' => "whatsapp",
                'recipient_type'    => "individual",
                'to'                => $whatsapp_no,
                'type'              => "template",
               
                'template'          => array(
                    'name'     => "account_created",
               
                
                    'language' => array(                    
                        'code' => "en_US"
                     
                    ),
                    'components'=> array(
                        array(
                            'type'=>"body",
                            'parameters'=> array(
                                array(
                                'type'=>"text",
                                'text'=>$admin,
                ),
                array(
                    'type'=>"text",
                    'text'=>'https://redmindtech.github.io/Dmk-Wings/',
                ),
                array(
                    'type'=>"text",
                    'text'=>$phone_no,
                ),
                array(
                    'type'=>"text",
                    'text'=>$password,
                ),
                  )
                 )
             )
             )
            )),
           
           
            CURLOPT_HTTPHEADER     => array(
                'Authorization: Bearer EAAHROdmfOsUBADMW76O5ORtgWiNfWSsZBOKqxF6qtgmYyMBE9vcsc1fUCzF2eMRfDwpLp9v82CjxQfcvFo8jRunWC3IXhkP1dFhYl83x9smVBmvjfXgDEoZC6cw4UYLL5esjxZBIm5cSq1tpDOLIPYCP24nNoBNth3qvFPrUAOe5H44zZBIZAZAO1zD8E8ttmzbgypejNioQZDZD',
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        //  echo $response;

}
?>
