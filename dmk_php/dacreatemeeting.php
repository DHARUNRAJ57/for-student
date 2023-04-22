<?php

include("database.php");

$postdata = file_get_contents("php://input");
if (isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);
    $meeting_name = $request->meeting_name;
    $meeting_time = $request->meeting_time;
    $meeting_date = $request->meeting_date;
    $participants = $request->participants;
    $constituency = $request->meeting_district;
    $meeting_type = $request->meeting_type;
    $meeting_location = $request->meeting_location;
    $comments = $request->comments;
// $meeting_name = 'tes';
//     $meeting_time ='12.00' ;
//     $meeting_date ='17-03-2023';
//     $participants =3 ;
//     $constituency ='ariyalur' ;
//     $meeting_type ='offline' ;
//     $meeting_location ='link' ;
//     $comments = 'good';

    // $departments_str = explode(",", $constituency);
    $date_and=$meeting_date." ".'and'." ";
    $date_time= $date_and.$meeting_time;

    $sql = "INSERT INTO meetings ( date, time, meeting_location, meeting_name, meeting_type,  participants, constituency, comments,status,admin_category)VALUES ( '$meeting_date', '$meeting_time', '$meeting_location', '$meeting_name', '$meeting_type',  '$participants', '$constituency', '$comments','Active','DA')";
    $date1 = date_create("$meeting_date");
    $date = date_format($date1, "d/m/Y ");
    if ($mysqli->query($sql) === TRUE) {
        $authdata = [
            'meeting_name' => $meeting_name,
            'meeting_time' => $meeting_time,
            'meeting_date' => $meeting_date,
            'participants' => $participants,
            'constituency' => $constituency,
            'meeting_type' => $meeting_type,
            'meeting_location' => $meeting_location,
            'comments' => $comments,
            'status' => 'Active'
        ];
        echo json_encode($authdata);
    }

    $user_email = [];


   if ($participants == 2) {
        $sql = "SELECT * FROM `user_master` WHERE `category`='ob' AND district = $constituency";
        if ($result = mysqli_query($mysqli, $sql)) {
            $cr = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $user_email[$cr]['whatsapp_no'] = $row['whatsapp_no'];
                whatsapp($user_email[$cr]['whatsapp_no'],$meeting_name,$date_time, $meeting_location,$meeting_type);
                $cr++;
            }
        }
    } 
    else if ($participants == 3) {
        $sql = "SELECT * FROM `user_master` WHERE `category`='EN' AND district = '$constituency'";
        if ($result = mysqli_query($mysqli, $sql)) {
            $cr = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $user_email[$cr]['whatsapp_no'] = $row['whatsapp_no'];
                whatsapp($user_email[$cr]['whatsapp_no'],$meeting_name,$date_time, $meeting_location,$meeting_type);
                $cr++;
            }
        }
    }

 }


function whatsapp($whatsapp_no, $meeting_name,$date,$location,$type)
{
    $meet_type=$type;
        if ($meet_type == "offline"){
        $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => 'https://graph.facebook.com/v15.0/115641688109792/messages',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode(
                array(
                    'messaging_product' => "whatsapp",
                    'recipient_type' => "individual",
                    'to' => "91".$whatsapp_no."",
                    'type' => "template",

                    'template' => array(
                        'name' => "offline_meeting",
                        'language' => array(
                            'code' => "en_US"
                        ),
                        'components' => array(
                            array(
                                'type' => "body",
                                'parameters' => array(
                                    array(
                                        'type' => "text",
                                        'text' => $meeting_name,
                                    ),
                                    array(
                                        'type' => "text",
                                        'text' => $location,
                                    ),
                                    array(
                                        'type' => "text",
                                        'text' => $date,
                                    ),
                                    // array(
                                    //     'type'=>"text",
                                    //     'text'=>'ragasudha',
                                    // ),
                                )
                            )
                        )
                    )
                )
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer EAAHROdmfOsUBADMW76O5ORtgWiNfWSsZBOKqxF6qtgmYyMBE9vcsc1fUCzF2eMRfDwpLp9v82CjxQfcvFo8jRunWC3IXhkP1dFhYl83x9smVBmvjfXgDEoZC6cw4UYLL5esjxZBIm5cSq1tpDOLIPYCP24nNoBNth3qvFPrUAOe5H44zZBIZAZAO1zD8E8ttmzbgypejNioQZDZD',
                'Content-Type: application/json',
            ),
        )
    );
    $response = curl_exec($curl);
    curl_close($curl);
}
else {
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => 'https://graph.facebook.com/v15.0/115641688109792/messages',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode(
                array(
                    'messaging_product' => "whatsapp",
                    'recipient_type' => "individual",
                    'to' => "91".$whatsapp_no."",
                    'type' => "template",

                    'template' => array(
                        'name' => "eng_meeting",
                        'language' => array(
                            'code' => "en_US"
                        ),
                        'components' => array(
                            array(
                                'type' => "body",
                                'parameters' => array(
                                    array(
                                        'type' => "text",
                                        'text' => $date,
                                    ),
                                    array(
                                        'type' => "text",
                                        'text' => $location,
                                    ),
                                    // array(
                                    //     'type' => "text",
                                    //     'text' => $location,
                                    // ),
                                    // array(
                                    //     'type'=>"text",
                                    //     'text'=>'ragasudha',
                                    // ),
                                )
                            )
                        )
                    )
                )
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer EAAHROdmfOsUBADMW76O5ORtgWiNfWSsZBOKqxF6qtgmYyMBE9vcsc1fUCzF2eMRfDwpLp9v82CjxQfcvFo8jRunWC3IXhkP1dFhYl83x9smVBmvjfXgDEoZC6cw4UYLL5esjxZBIm5cSq1tpDOLIPYCP24nNoBNth3qvFPrUAOe5H44zZBIZAZAO1zD8E8ttmzbgypejNioQZDZD',
                'Content-Type: application/json',
            ),
        )
    );
    $response = curl_exec($curl);
    curl_close($curl);
}
}