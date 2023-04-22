<?php
$number = ['919500195940'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL            => 'https://graph.facebook.com/v15.0/115641688109792/messages',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING       => '',
    CURLOPT_MAXREDIRS      => 10,
    CURLOPT_TIMEOUT        => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST  => 'POST',
    CURLOPT_POSTFIELDS     => json_encode(array(
        'messaging_product' => "whatsapp",
        'recipient_type'    => "individual",
        'to'                => "919500195940",
        'type'              => "template",
        'template'          => array(
            'name'     => "hello_world",
            'language' => array(
                'code' => "en_US",
            ),
          )
    )),
    CURLOPT_HTTPHEADER     => array(
        'Authorization: Bearer EAAHROdmfOsUBADMW76O5ORtgWiNfWSsZBOKqxF6qtgmYyMBE9vcsc1fUCzF2eMRfDwpLp9v82CjxQfcvFo8jRunWC3IXhkP1dFhYl83x9smVBmvjfXgDEoZC6cw4UYLL5esjxZBIm5cSq1tpDOLIPYCP24nNoBNth3qvFPrUAOe5H44zZBIZAZAO1zD8E8ttmzbgypejNioQZDZD',
        'Content-Type: application/json',
    ),
));

$response = curl_exec($curl);
curl_close($curl);
echo $response;