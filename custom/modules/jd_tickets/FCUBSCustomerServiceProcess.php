<?php

// $url = 'http://10.0.0.231:7003/FCUBSCustomerService/FCUBSCustomerService?WSDL=null';

// $source = $_POST['source'];
// $ub_comp = $_POST['ub_comp'];
// $userid = $_POST['userid'];
// $branch = $_POST['branch'];
// $custno = $_POST['custno'];

// var_dump($source);
// var_dump($ub_comp);
// var_dump($userid);
// var_dump($branch);
// var_dump($custno);

// $xml_data = "
// <soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:fcub='http://fcubs.ofss.com/service/FCUBSCustomerService'>
//    <soapenv:Header/>
//    <soapenv:Body>
//       <fcub:QUERYCUSTOMER_IOFS_REQ>
//          <fcub:FCUBS_HEADER>
//             <fcub:SOURCE>$source</fcub:SOURCE>
//             <fcub:UBSCOMP>$ub_comp</fcub:UBSCOMP>
//             <fcub:USERID>$userid</fcub:USERID>
//             <fcub:BRANCH>$branch</fcub:BRANCH>
//             <fcub:SERVICE>FCUBSCustomerService</fcub:SERVICE>
//             <fcub:OPERATION>QueryCustomer</fcub:OPERATION>
//          </fcub:FCUBS_HEADER>
//          <fcub:FCUBS_BODY>
//             <fcub:Customer-IO>
//                <fcub:CUSTNO>$custno</fcub:CUSTNO>
//             </fcub:Customer-IO>
//          </fcub:FCUBS_BODY>
//       </fcub:QUERYCUSTOMER_IOFS_REQ>
//    </soapenv:Body>
// </soapenv:Envelope>";

// $headers = array(
//     "Content-Type: text/xml;charset=UTF-8"
// );

// $ch = curl_init($url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);
// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//  // Execute cURL request and capture response and HTTP status code 
// $response = curl_exec($ch); $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//  if(curl_errno($ch)) { 
//     echo '<pre>';
//     echo 'Curl error: ' . curl_error($ch);
//     echo '</pre>';
//  } else {
//     echo '<pre>';
//     echo "HTTP Status Code: $http_status\n";
//     echo "Response:\n" . htmlspecialchars($response); echo '</pre>';
//  }

// // $response = curl_exec($ch);
// // if(curl_errno($ch)) {
// //     echo 'Curl error: ' . curl_error($ch);
// // } else {
// //     echo 'Response: ' . $response;
// // }
// curl_close($ch);


?>
<?php

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $url = 'http://10.0.0.231:7003/FCUBSCustomerService/FCUBSCustomerService?WSDL=null';
    
//     $source = $_POST['source'];
//     $ub_comp = $_POST['ub_comp'];
//     $userid = $_POST['userid'];
//     $branch = $_POST['branch'];
//     $custno = $_POST['custno'];
    
//     $xml_data = "
//     <soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:fcub='http://fcubs.ofss.com/service/FCUBSCustomerService'>
//        <soapenv:Header/>
//        <soapenv:Body>
//           <fcub:QUERYCUSTOMER_IOFS_REQ>
//              <fcub:FCUBS_HEADER>
//                 <fcub:SOURCE>$source</fcub:SOURCE>
//                 <fcub:UBSCOMP>$ub_comp</fcub:UBSCOMP>
//                 <fcub:USERID>$userid</fcub:USERID>
//                 <fcub:BRANCH>$branch</fcub:BRANCH>
//                 <fcub:SERVICE>FCUBSCustomerService</fcub:SERVICE>
//                 <fcub:OPERATION>QueryCustomer</fcub:OPERATION>
//              </fcub:FCUBS_HEADER>
//              <fcub:FCUBS_BODY>
//                 <fcub:Customer-IO>
//                    <fcub:CUSTNO>$custno</fcub:CUSTNO>
//                 </fcub:Customer-IO>
//              </fcub:FCUBS_BODY>
//           </fcub:QUERYCUSTOMER_IOFS_REQ>
//        </soapenv:Body>
//     </soapenv:Envelope>";
    
//     $headers = array(
//         "Content-Type: text/xml;charset=UTF-8"
//     );
    
//     $ch = curl_init($url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
//     $response = curl_exec($ch);
//     $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
//     $result = [];
//     if (curl_errno($ch)) {
//         $result = [
//             "status" => "error",
//             "message" => 'Curl error: ' . curl_error($ch)
//         ];
//     } else {
//         if ($http_status == 200) {
//             $result = [
//                 "status" => "success",
//                 "message" => "Query successful! Response: " . htmlspecialchars($response)
//             ];
//         } else {
//             $result = [
//                 "status" => "error",
//                 "message" => "Error: Received HTTP status code $http_status"
//             ];
//         }
//     }
    
//     curl_close($ch);
    
//     header('Content-Type: application/json');
//     echo json_encode($result);
// }

?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = 'http://10.0.0.231:7003/FCUBSCustomerService/FCUBSCustomerService?WSDL=null';
    
    $source = $_POST['source'];
    $ub_comp = $_POST['ub_comp'];
    $userid = $_POST['userid'];
    $branch = $_POST['branch'];
    $custno = $_POST['custno'];
    
    $xml_data = "
    <soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:fcub='http://fcubs.ofss.com/service/FCUBSCustomerService'>
       <soapenv:Header/>
       <soapenv:Body>
          <fcub:QUERYCUSTOMER_IOFS_REQ>
             <fcub:FCUBS_HEADER>
                <fcub:SOURCE>$source</fcub:SOURCE>
                <fcub:UBSCOMP>$ub_comp</fcub:UBSCOMP>
                <fcub:USERID>$userid</fcub:USERID>
                <fcub:BRANCH>$branch</fcub:BRANCH>
                <fcub:SERVICE>FCUBSCustomerService</fcub:SERVICE>
                <fcub:OPERATION>QueryCustomer</fcub:OPERATION>
             </fcub:FCUBS_HEADER>
             <fcub:FCUBS_BODY>
                <fcub:Customer-IO>
                   <fcub:CUSTNO>$custno</fcub:CUSTNO>
                </fcub:Customer-IO>
             </fcub:FCUBS_BODY>
          </fcub:QUERYCUSTOMER_IOFS_REQ>
       </soapenv:Body>
    </soapenv:Envelope>";
    
    $headers = array(
        "Content-Type: text/xml;charset=UTF-8"
    );
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $response = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    $result = [];
    
    if (curl_errno($ch)) {
        $result = [
            "status" => "error",
            "message" => 'Curl error: ' . curl_error($ch)
        ];
    } else {
        if ($http_status == 200) {
            $result = [
                "status" => "success",
                "message" => "Query successful! Response: " . htmlspecialchars($response)
            ];
        } else {
            $result = [
                "status" => "error",
                "message" => "Error: Received HTTP status code $http_status"
            ];
        }
    }
    
    curl_close($ch);
    
    header('Content-Type: application/json');
    echo json_encode($result);
}

?>
