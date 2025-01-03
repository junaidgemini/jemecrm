<?php

// Get the page number from DataTables request (start parameter)
$page = isset($_GET['start']) ? (intval($_GET['start']) / intval($_GET['length'])) + 1 : 1;
// $searchValue = isset($_GET['search']['value']) ? $_GET['search']['value'] : ''; // Search term

// Number of records per page
$records_per_page = isset($_GET['length']) ? intval($_GET['length']) : 10;

// Freshdesk API endpoint
// $url = "https://lapomicrofinancebank.freshdesk.com/api/v2/tickets?per_page={$records_per_page}&page={$page}";

$baseUrl = "https://lapomicrofinancebank.freshdesk.com/api/v2/tickets";
$url = "$baseUrl?per_page={$records_per_page}&page={$page}";


// if (!empty($searchValue)) {
//     // $url .= "&query=" . urlencode("subject:'$searchValue' OR description:'$searchValue' OR id:'$searchValue'");
//     $url .= "&query=" . urlencode("id:'$searchValue'");
// }

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

// Prepare data for DataTables
$data = [];
foreach ($tickets as $ticket) {
    $data[] = [
        $ticket['id'],
        $ticket['subject'],
        $ticket['type'],
        $ticket['priority'],
        $ticket['status'],
        date('Y-m-d H:i:s', strtotime($ticket['created_at'])),
        date('Y-m-d H:i:s', strtotime($ticket['updated_at'])),
        $ticket['fr_escalated'],
        $ticket['fr_due_by'],
        $ticket['group_id'],
        isset($ticket['cc_emails']) ? implode(', ', $ticket['cc_emails']) : '',
        isset($ticket['reply_cc_emails']) ? implode(', ', $ticket['reply_cc_emails']) : '',
        isset($ticket['ticket_cc_emails']) ? implode(', ', $ticket['ticket_cc_emails']) : '',
        isset($ticket['ticket_bcc_emails']) ? implode(', ', $ticket['ticket_bcc_emails']) : '',
        isset($ticket['fwd_emails']) ? implode(', ', $ticket['fwd_emails']) : '',
        isset($ticket['support_email']) ? implode(', ', $ticket['support_email']) : '',
        isset($ticket['to_emails']) ? implode(', ', $ticket['to_emails']) : '',
        $ticket['spam'],
        $ticket['email_config_id'],
        $ticket['requester_id'],
        $ticket['source'],
        $ticket['company_id'],
        $ticket['association_type'],
        $ticket['responder_id'],
        $ticket['product_id'],
        $ticket['associated_tickets_count'],
        $ticket['tags'],
        $ticket['nr_due_by'],
        $ticket['nr_escalated'],
        // $ticket['custom_fields'],
    ];
}
// Return JSON response to DataTables
echo json_encode([
    // 'draw' => intval($_GET['draw']),
    // 'recordsTotal' => count($tickets), // Replace with actual total if known
    // 'recordsFiltered' => count($tickets), // Replace with actual filtered count if known
    'draw' => isset($_GET['draw']) ? intval($_GET['draw']) : 0,
    'recordsTotal' => 1000, // Set a high number if total record count is not known
    'recordsFiltered' => 1000, // Adjust this based on actual total count
    'data' => $data
]);

?>