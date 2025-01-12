<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

// Freshdesk API endpoint
 $ticket_id = $_REQUEST['ticket_id'];
//  $ticket_id = '6583';

$baseUrl = "https://lapomicrofinancebank.freshdesk.com/api/v2/tickets";
$url = "$baseUrl/{$ticket_id}";
// var_dump($url);
// Initialize cURL
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Basic QTNXMlB0UDlreWw2ODl2cjlVNlo6',
        'Cookie: _x_w=43_2'
    ),
));

// Execute cURL request
$response = curl_exec($curl);
curl_close($curl);

if (!$response) {
    echo json_encode([
        'draw' => intval($_GET['draw']),
        'recordsTotal' => 0,
        'recordsFiltered' => 0,
        'data' => []
    ]);
    exit;
}


// Decode the API response
$tickets = json_decode($response, true);
// echo 'idr';
// return  json_encode($tickets);
echo json_encode($tickets);
// echo json_encode($tickets);
?>