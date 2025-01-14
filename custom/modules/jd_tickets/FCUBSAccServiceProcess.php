<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = 'http://10.0.0.231:7003/FCUBSAccService/FCUBSAccService';
    
    $source = $_POST['source'];
    $ub_comp = $_POST['ub_comp'];
    $userid = $_POST['userid'];
    $branch = $_POST['branch'];
    $moduleid = $_POST['moduleid'];
    $acc = $_POST['acc'];
    
    $xml_data = "
    <soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:fcub='http://fcubs.ofss.com/service/FCUBSAccService'>
       <soapenv:Header/>
       <soapenv:Body>
          <fcub:QUERYCUSTACC_IOFS_REQ>
             <fcub:FCUBS_HEADER>
                <fcub:SOURCE>$source</fcub:SOURCE>
                <fcub:UBSCOMP>$ub_comp</fcub:UBSCOMP>
                <fcub:USERID>$userid</fcub:USERID>
                <fcub:BRANCH>$branch</fcub:BRANCH>
                <fcub:MODULEID>$moduleid</fcub:MODULEID>
                <fcub:SERVICE>FCUBSAccService</fcub:SERVICE>
                <fcub:OPERATION>QueryCustAcc</fcub:OPERATION>
                <fcub:SOURCE_OPERATION>QueryCustAcc</fcub:SOURCE_OPERATION>
                <fcub:FUNCTIONID>STDCUSAC</fcub:FUNCTIONID>
                <fcub:ACTION>EXECUTEQUERY</fcub:ACTION>
             </fcub:FCUBS_HEADER>
             <fcub:FCUBS_BODY>
                <fcub:Cust-Account-IO>
                   <fcub:ACC>$acc</fcub:ACC>
                </fcub:Cust-Account-IO>
             </fcub:FCUBS_BODY>
          </fcub:QUERYCUSTACC_IOFS_REQ>
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
