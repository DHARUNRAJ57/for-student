<?php
include("database.php");
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
$request = json_decode($postdata);
$email = mysqli_real_escape_string($mysqli, trim($request->email));
$firstname=$request->firstname;
$lastname=$request->lastname;
$name=$firstname.$lastname;
$father_name=$request->father_name;
//$parent_number=$request->parent_number;
$location_id=$request->location_id;
$district=$request->district;

$phone_no=$request->contact_no;
$code='91';
 $contact_no=$code.$phone_no;
$date_of_birth=$request->date_of_birth;
$educational_qualification=$request->educational_qualification;
$additional_qualification=$request->profession;
$age=$request->age;
$address1=$request->address1;
$flat_no=$request->flat_no;
$town_city=$request->town_city;
$taluk=$request->taluk;
$pincode=$request->pincode;
$degree_major=$request->degree_major;
$other_qaulification=$request->other_qualification;

$sql = "INSERT INTO user_master(email,firstname,lastname,father_name,location_id,district,whatsapp_no,date_of_birth,educational_qualification,additional_qualification,mode,category,age,address1,flat_no,town_city,taluk,pincode,degree_major,other_qualification) VALUES 
                            ('$email','$firstname','$lastname','$father_name','$location_id','$district','$phone_no','$date_of_birth','$educational_qualification','$additional_qualification','3','EN','$age','$address1','$flat_no','$town_city','$taluk','$pincode','$degree_major','$other_qaulification')";
if ($mysqli->query($sql) === TRUE) {
$authdata = [
'email' => $email,
'firstname' => $firstname,
'lastname' => $lastname,
'father_name' => $father_name,
//'parent_number' => $parent_number,
'location_id'=>$location_id,
'district' => $district,
'whatsapp_no' =>$contact_no,
'date_of_birth' => $date_of_birth,
'educational_qualification' =>$educational_qualification,
'additional_qualification' =>$additional_qualification,
'mode'=>'3',
'category'=>'EN',
'age '=>$age,
'degree_major'=>$degree_major
//'id' => mysqli_insert_id($mysqli)
];
// whatsapp($name,$contact_no);
echo json_encode($authdata);
}
}
// function whatsapp($name,$contact_no)
// {
// $curl = curl_init();


//         curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://graph.facebook.com/v15.0/105852852434085/messages',
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => '',
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 0,
//             CURLOPT_FOLLOWLOCATION => true,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => 'POST',
//             CURLOPT_POSTFIELDS     => json_encode(array(
//                 'messaging_product' => "whatsapp",
//                 'recipient_type'    => "individual",
//                 'to'                =>$contact_no,
//                 'type'              => "template",
               
//                 'template'          => array(
//                     'name'     => "create_meeting",
//                     'language' => array(
//                         'code' => "en_US",
//                     ),
//                     'components'=> array(
//                         array(
//                             'type'=>"body",
//                             'parameters'=> array(
//                                 array(
//                                 'type'=>"text",
//                                 'text'=>$name
//                 ),
//                 array(
//                     'type'=>"text",
//                     'text'=>"12/3/2023"
//                      )
//                   )
//                  )
//              ))
//             )),           
           
//             CURLOPT_HTTPHEADER     => array(
//                 'Authorization: Bearer EAAV28ZAOnmikBABLQcRefayunzHjzhr2SBOZBOC6SldytEcYPFVZADUrCbGkulfC46dNx38dmNIhaZBa8KlNeqn25QRvk4SZAHoof11Vn0YAsbZCFtdeVoOEEYUEQXQdw7yy1SZBHdGJ8Iz5dPqLj1XXQ1atbTpELgeuzL43cLZAst2pzGxZBgl9ATkUZAErBvFWrcBwtrxZB5j4adLb7h6jejw',
//                 'Content-Type: application/json',
//             ),
//         ));

//         $response = curl_exec($curl);
//         curl_close($curl);
//         //  echo $response;
        
     

// }
?>
