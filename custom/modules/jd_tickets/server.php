<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// Get the page number from DataTables request (start parameter)
// $page = isset($_GET['start']) ? (intval($_GET['start']) / intval($_GET['length'])) + 1 : 1;
$draw = $_GET['draw'];
$start = $_GET['start'];
$length = $_GET['length'];
$page = $start/$length;
$page++;
// var_dump($draw);
// var_dump($start);
// var_dump($length);
// die;
$searchValue = isset($_GET['search']['value']) ? $_GET['search']['value'] : ''; // Search term

// Number of records per page
$records_per_page = isset($_GET['length']) ? intval($_GET['length']) : 10;

// Freshdesk API endpoint
// $url = "https://lapomicrofinancebank.freshdesk.com/api/v2/tickets?per_page={$records_per_page}&page={$page}";



if (!empty($searchValue)) {
    // $baseUrl = "https://lapomicrofinancebank.freshdesk.com/api/v2/search/tickets";
    // $url .= "&query=" . urlencode("subject:'$searchValue' OR description:'$searchValue' OR id:'$searchValue'");
    // $url .= $baseUrl.'?query="' . URLEncode("priority:$searchValue").'"';
    // $url .= "?query=" . urlencode("id:'$searchValue'");
    // isset($_GET['id'])
    // var_dump($_GET['id']);
    // if(isset($_GET['id'])){
    //     $url = 'https://lapomicrofinancebank.freshdesk.com/api/v2/search/tickets?query="priority%3A2"';
    // }
    // echo $url;
} else{
    $baseUrl = "https://lapomicrofinancebank.freshdesk.com/api/v2/tickets";
    $url = $baseUrl."?per_page={$records_per_page}&page={$page}";
}

if ($_GET['filter_c'] == true) {
    $baseUrl = 'https://lapomicrofinancebank.freshdesk.com/api/v2/search/tickets';
    $queryParams = [];

    // Check if 'status' parameter exists
    // if (!empty($_GET['status'])) {
    //     $status_f = $_GET['status'];
    //     $status_f = implode(' OR ', $status_f);
    //     $queryParams[] = 'status:'  $status_f;
    // }

    if (!empty($_GET['status'])) {
        $status_f = $_GET['status']; // Assuming this is an array like [2, 1]
        // Add 'status:' prefix to each element in the array
        $status_f = array_map(function ($status) {
            return 'status:' . $status;
        }, $status_f);
        // Join the elements with " OR "
        $status_f = '('. implode(' OR ', $status_f).')';
        // Add to query parameters
        $queryParams[] = $status_f;
    }

    // Check if 'priority' parameter exists
    // if (!empty($_GET['priority'])) {
    //     $priority_f = $_GET['priority'];
    //     $priority_f = implode(' OR ', $priority_f);
    //     $queryParams[] = 'priority:' . $priority_f;
    // }

    if (!empty($_GET['priority'])) {
        $priority_f = $_GET['priority']; // Assuming this is an array like [2, 1]
        // Add 'status:' prefix to each element in the array
        $priority_f = array_map(function ($priority) {
            return 'priority:' . $priority;
        }, $priority_f);
        // Join the elements with " OR "
        $priority_f = '('. implode(' OR ', $priority_f).')';
        // Add to query parameters
        $queryParams[] = $priority_f;
    }
    // Group ID
    if(!empty($_GET['group_id'])){
        $group_id = $_GET['group_id'];
        // $group_id = implode(' OR ', $group_id);
        $queryParams[] = '(group_id:' . $group_id.')';
    }
    // Type
    if(!empty($_GET['type'])){
        $type = $_GET['type'];
        // $group_id = implode(' OR ', $group_id);
        $queryParams[] = '(type:' . $type.')';
    }
    // created_at
    if(!empty($_GET['created_at'])){
        $created_at = $_GET['created_at'];
        // $group_id = implode(' OR ', $group_id);
        $queryParams[] = "(created_at:'" . $created_at."')";
    }
    // updated_at
    if(!empty($_GET['updated_at'])){
        $updated_at = $_GET['updated_at'];
        $queryParams[] = "(updated_at:'" . $updated_at."')";
    }
    // responder_id
    // if(!empty($_GET['responder_id'])){
    //     $responder_id = $_GET['responder_id'];
    //     $queryParams[] = "(responder_id:'" . $responder_id."')";
    // }
    // requester_id
    // if(!empty($_GET['requester_id'])){
    //     $requester_id = $_GET['requester_id'];
    //     $queryParams[] = "(requester_id:'" . $requester_id."')";
    // }
    // Build the query string dynamically
    if (!empty($queryParams)) {
        $query = '?query="' . implode(' AND ', $queryParams) . '"';
        $url = $baseUrl . $query.'&page='.$page;
        // var_dump($url);
        // urlencode($url);
        // var_dump($url);
        // die;
    } else {
        $url = $baseUrl; // Base URL if no query parameters are present
    }

    // Output the final URL for debugging
    // https://lapomicrofinancebank.freshdesk.com/api/v2/search/tickets?query="status:3%20OR%20status:4 AND priority:2"
    // var_dump($url);
    // die;
}

// if($_GET['filter_c'] == true){
//     if(!empty($_GET['status'])){
//         $status_f = $_GET['status'];
//         // $baseUrl = 'https://lapomicrofinancebank.freshdesk.com/api/v2/search/tickets';
//         // $status = '?query="status:'.$status_f.'"&page='.$page;
//         $status = 'status:'.$status_f;
//         $url = $baseUrl.$status;
//     }
// }
// if($_GET['filter_c'] == true){
//     if(!empty($_GET['priority'])){
//         $priority_f = $_GET['priority'];
//         // $baseUrl = 'https://lapomicrofinancebank.freshdesk.com/api/v2/search/tickets';
//         // $priority = '?query="priority:'.$priority_f.'"&page='.$page;
//         $priority = 'OR priority:'.$priority_f;
//         $url = $baseUrl.$priority;
//     }
// }

// // Filter Final URL
// if($_GET['filter_c'] == true){
//     $baseUrl = 'https://lapomicrofinancebank.freshdesk.com/api/v2/search/tickets';
//     $query = '?query="'.$status.$priority.'"';
//     // if()
//     var_dump($query);
//     $url = $baseUrl.$query;
//     var_dump($url);
//     die;

// }
$url = str_replace(' ', '%20',$url);

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

// Prepare data for DataTables
$data = array();


if($_GET['filter_c'] != 'true'){
    $dataSet = $tickets;
    $recordsFiltered = '10000';
    $recordsTotal = '10000';
    
}else{
    $dataSet = $tickets['results'];
    $recordsFiltered= $tickets['total'];
    $recordsTotal= $tickets['total'];
}

// if($_GET['filter_c'] != 'true'){
    foreach ($dataSet as $ticket) {
        $data[] = [
            'id' => $ticket['id'],
            'subject' => $ticket['subject'],
            'type' => $ticket['type'],
            'priority' => $ticket['priority'],
            'status' => $ticket['status'],
            'created_at' => date('Y-m-d H:i:s', strtotime($ticket['created_at'])),
            'updated_at' => date('Y-m-d H:i:s', strtotime($ticket['updated_at'])),
            'fr_escalated' => $ticket['fr_escalated'],
            'fr_due_by' => $ticket['fr_due_by'],
            'group_id' => $ticket['group_id'],
            'cc_emails' => isset($ticket['cc_emails']) && is_array($ticket['cc_emails']) ? implode(', ', $ticket['cc_emails']) : '',
            'reply_cc_emails' => isset($ticket['reply_cc_emails']) && is_array($ticket['reply_cc_emails']) ? implode(', ', $ticket['reply_cc_emails']) : '',
            'ticket_cc_emails' => isset($ticket['ticket_cc_emails']) && is_array($ticket['ticket_cc_emails']) ? implode(', ', $ticket['ticket_cc_emails']) : '',
            'ticket_bcc_emails' => isset($ticket['ticket_bcc_emails']) && is_array($ticket['ticket_bcc_emails']) ? implode(', ', $ticket['ticket_bcc_emails']) : '',
            'fwd_emails' => isset($ticket['fwd_emails']) && is_array($ticket['fwd_emails']) ? implode(', ', $ticket['fwd_emails']) : '',
            'support_email' => isset($ticket['support_email']) && is_array($ticket['support_email']) ? implode(', ', $ticket['support_email']) : '',
            'to_emails' => isset($ticket['to_emails']) && is_array($ticket['to_emails']) ? implode(', ', $ticket['to_emails']) : '',
            'spam' => $ticket['spam'],
            'email_config_id' => $ticket['email_config_id'],
            'requester_id' => $ticket['requester_id'],
            'source' => $ticket['source'],
            'company_id' => $ticket['company_id'],
            'association_type' => $ticket['association_type'],
            'responder_id' => $ticket['responder_id'],
            'product_id' => $ticket['product_id'],
            'associated_tickets_count' => $ticket['associated_tickets_count'],
            'tags' => $ticket['tags'],
            'nr_due_by' => $ticket['nr_due_by'],
            'nr_escalated' => $ticket['nr_escalated'],
            // 'custom_fields' => $ticket['custom_fields'],
        ];    
    }
//     var_dump($data);
// die;

// } else{
//     echo 'IDR';
//     $i = '0';
//     foreach ($tickets['results'] as $ticket) {
//         var_dump($ticket['']);
//         // echo 'bs kr bae';
//         // echo 'KKK=>'. $ticket->id;
//     }
//     // var_dump($tickets);
//     die;
// }
// var_dump($tickets);
// Return JSON response to DataTables
echo json_encode([
    // 'draw' => intval($_GET['draw']),
    // 'draw' => isset($_GET['draw']) ? intval($_GET['draw']) : 0,
    'draw' => $draw,
    // 'recordsTotal' => count($tickets), // Replace with actual total if known
    // 'recordsFiltered' => count($tickets), // Replace with actual filtered count if known
    'recordsTotal' => $recordsTotal, // Set a high number if total record count is not known
    'recordsFiltered' => $recordsFiltered, // Adjust this based on actual total count
    'data' => $data
]);

?>