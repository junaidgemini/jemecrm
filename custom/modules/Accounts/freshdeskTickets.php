<?php
header('Content-Type: application/json');

// Replace with your Freshdesk API curl code
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://lapomicrofinancebank.freshdesk.com/api/v2/tickets?per_page=10&page=2',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array(
        'Authorization: Basic QTNXMlB0UDlreWw2ODl2cjlVNlo6'
    ),
));

$response = curl_exec($curl);
curl_close($curl);

echo $response;
