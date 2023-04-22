<?php
include("database.php");
$postdata = file_get_contents("php://input");
if (isset($postdata) && !empty($postdata)) 
{
    $request = json_decode($postdata);
    $id = $request->id;
    $meeting_date = $request->meeting_date;
    $meeting_time=$request->meeting_time;
    // $id = '375';
    // $meeting_date = '2023-03-17';
    // $meeting_time='17.00';

    $sql = "UPDATE  meetings SET date = '". $meeting_date."', time='".$meeting_time."' where id =".$id ;
    if ($mysqli->query($sql) === TRUE) {
        $authdata = [

            'date' => $meeting_date,
            'time' => $meeting_time,                 

        ];
        //  echo json_encode($authdata);
   

$sql1= "SELECT  * FROM meetings where id = '$id'";  
$meeting_show=[];
if ($result = mysqli_query($mysqli, $sql1)) {
  
    while ($row = mysqli_fetch_assoc($result)) {
       $meeting_id = $row['id'];
       $meeting_date = $row['date'];
       $meeting_time = $row['time'];
       $meeting_location = $row['meeting_location'];
       $meeting_name = $row['meeting_name'];
       $meeting_type = $row['meeting_type'];
       $meeting_description = $row['description'];
       $meeting_participants = $row['participants'];
       $meeting_constituency = $row['constituency'];
       $meeting_comments = $row['comments'];
       $meeting_actual_attendees = $row['actual_attendees'];
       $meeting_action_taken = $row['action_taken'];
       $meeting_status = $row['status'];      
    
    }
   
    $date_and=$meeting_date." ".'and'." ";
    $date_time= $date_and.$meeting_time;   
    $departments_str = explode(",",  $meeting_constituency); 

    if ( $meeting_participants== 1) {
        $sql = "SELECT whatsapp_no from user_master where category ='OB'";
        if ($result = mysqli_query($mysqli, $sql)) {
            $cr = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $user_email[$cr]['whatsapp_no'] = $row['whatsapp_no'];
                whatsapp($user_email[$cr]['whatsapp_no'],$meeting_name,$date_time, $meeting_location,$meeting_type);
                $cr++;
            }
        }
    }
    else if ($meeting_participants == 2) {
        $sql = 'SELECT whatsapp_no FROM user_master WHERE category=\'OB\' AND (';

        for ($i = 0; $i < count($departments_str); $i++) {
            $sql .= 'FIND_IN_SET("' . $departments_str[$i] . '", district)';
            if ($i < count($departments_str) - 1) {
                $sql .= ' OR ';

            }
        }
        $sql .= ')';

        if ($result = mysqli_query($mysqli, $sql)) {
            $cr = 0;
            while ($row = mysqli_fetch_assoc($result)) {

                $user_email[$cr]['whatsapp_no'] = $row['whatsapp_no'];
                 whatsapp($user_email[$cr]['whatsapp_no'],$meeting_name,$date_time, $meeting_location,$meeting_type);
                // whatsapp( $user_email[$cr]['whatsapp_no'],$date,$meeting_location, $meeting_time);
                $cr++;
            }
            // echo json_encode(['data' => $user_email]);
        }
    } 
    else if ($meeting_participants == 3) {
        $sql = 'SELECT whatsapp_no FROM user_master WHERE category=\'EN\' AND (';

        for ($i = 0; $i < count($departments_str); $i++) {
            $sql .= 'FIND_IN_SET("' . $departments_str[$i] . '", district)';
            if ($i < count($departments_str) - 1) {
                $sql .= ' OR ';
             
            }
        }

        $sql .= ')';


        if ($result = mysqli_query($mysqli, $sql)) {
            $cr = 0;
            while ($row = mysqli_fetch_assoc($result)) {

                $user_email[$cr]['whatsapp_no'] = $row['whatsapp_no'];
                whatsapp($user_email[$cr]['whatsapp_no'],$meeting_name,$date_time, $meeting_location,$meeting_type);               
                $cr++;
            }
            // echo json_encode(['data' => $user_email]);
        }
    }
    echo json_encode('success');
}
  } 
  else {
    http_response_code(404);
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
?>