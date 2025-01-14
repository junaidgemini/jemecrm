<?php

// Initialize CURL
$curl = curl_init();
$AccNo = $_POST['AccNo'];
// $AccNo = '0000693398';
$data = <<<XML
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:fcub="http://fcubs.ofss.com/service/FCUBSAccService">
   <soapenv:Header/>
   <soapenv:Body>
      <fcub:QUERYCUSTACC_IOFS_REQ>
         <fcub:FCUBS_HEADER>
            <fcub:SOURCE>NIPINCM</fcub:SOURCE>
            <fcub:UBSCOMP>FCUBS</fcub:UBSCOMP>
            <fcub:USERID>NIPINCM</fcub:USERID>
            <fcub:BRANCH>004</fcub:BRANCH>
            <fcub:MODULEID>ST</fcub:MODULEID>
            <fcub:SERVICE>FCUBSAccService</fcub:SERVICE>
            <fcub:OPERATION>QueryCustAcc</fcub:OPERATION>
            <fcub:SOURCE_OPERATION>QueryCustAcc</fcub:SOURCE_OPERATION>
            <fcub:FUNCTIONID>STDCUSAC</fcub:FUNCTIONID>
            <fcub:ACTION>EXECUTEQUERY</fcub:ACTION>            
         </fcub:FCUBS_HEADER>
         <fcub:FCUBS_BODY>
            <fcub:Cust-Account-IO>
			   <fcub:ACC>$AccNo</fcub:ACC>
            </fcub:Cust-Account-IO>
         </fcub:FCUBS_BODY>
      </fcub:QUERYCUSTACC_IOFS_REQ>
   </soapenv:Body>
</soapenv:Envelope>
XML;

// CURL options
curl_setopt_array($curl, [
    CURLOPT_URL => "http://10.0.0.231:7003/FCUBSAccService/FCUBSAccService",
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_HTTPHEADER => [
        "Content-Type: text/xml;charset=UTF-8",
    ],
    CURLOPT_FOLLOWLOCATION => true,
]);

// Execute CURL request
$response = curl_exec($curl);

curl_close($curl);
// Check for CURL errors
if (curl_errno($curl)) {
    echo 'CURL Error: ' . curl_error($curl);
} else {
    // Print the response
    // header('Content-Type: application/xml'); // Optional, to display as XML in the browser
    // echo $response;
}


$xml = simplexml_load_string($response);
$namespaces = $xml->getNamespaces(true);

// Register namespaces
$body = $xml->children($namespaces['S'])->Body;
$response = $body->QUERYCUSTACC_IOFS_RES;
$response->registerXPathNamespace('ns', $namespaces['']);

// Example: Extracting data from the response
$udfDetails = $response->xpath('//ns:Provision-Main');
$allFieldsArray = [];
foreach ($udfDetails as $udf) {
    $fieldName = isset($udf->PRVACCUI) ? 'PRVACCUI' : 'N/A';
    $fieldValue = (string)$udf->PRVACCUI ?? 'N/A';
    $allFieldsArray[$fieldName] = $fieldValue;
}
// Extracting other sections as needed
$custAccountDetails = $response->xpath('//ns:Cust-Account-Full');
// if (!empty($custAccountDetails)){
$accountDetails = $custAccountDetails[0];
$allFieldsArray['BRN'] = (string)$accountDetails->BRN;
$allFieldsArray['ACC'] = (string)$accountDetails->ACC;
$allFieldsArray['CUSTNO'] = (string)$accountDetails->CUSTNO;
$allFieldsArray['ACCLS'] = (string)$accountDetails->ACCLS;
$allFieldsArray['CCY'] = (string)$accountDetails->CCY;
$allFieldsArray['CUSTNAME'] = (string)$accountDetails->CUSTNAME;
$allFieldsArray['ACCLSTYP'] = (string)$accountDetails->ACCLSTYP;
$allFieldsArray['ADESC'] = (string)$accountDetails->ADESC;
$allFieldsArray['ACSTATNODR'] = (string)$accountDetails->ACSTATNODR;
$allFieldsArray['ACSTATNOCR'] = (string)$accountDetails->ACSTATNOCR;
$allFieldsArray['ACCTYPE'] = (string)$accountDetails->ACCTYPE;
$allFieldsArray['ACCOPENDT'] = (string)$accountDetails->ACCOPENDT;
$allFieldsArray['ALTACC'] = (string)$accountDetails->ALTACC;
$allFieldsArray['FROZEN'] = (string)$accountDetails->FROZEN;
$allFieldsArray['POSTALLOWED'] = (string)$accountDetails->POSTALLOWED;
$allFieldsArray['ACCSTAT'] = (string)$accountDetails->ACCSTAT;
$allFieldsArray['STATSINCE'] = (string)$accountDetails->STATSINCE;
$allFieldsArray['AUTOSTATCHANGE'] = (string)$accountDetails->AUTOSTATCHANGE;
$allFieldsArray['LOC'] = (string)$accountDetails->LOC;
$allFieldsArray['MEDIA'] = (string)$accountDetails->MEDIA;
$allFieldsArray['CASACC'] = (string)$accountDetails->CASACC;
$allFieldsArray['ATM'] = (string)$accountDetails->ATM;
$allFieldsArray['ACSTMTTYPEP'] = (string)$accountDetails->ACSTMTTYPEP;
$allFieldsArray['ACSTMTTYPS'] = (string)$accountDetails->ACSTMTTYPS;
$allFieldsArray['ACSTMTTYPE3'] = (string)$accountDetails->ACSTMTTYPE3;
$allFieldsArray['ODREQ'] = (string)$accountDetails->ODREQ;
$allFieldsArray['ACCOUNTAUTOCLOSED'] = (string)$accountDetails->ACCOUNTAUTOCLOSED;
$allFieldsArray['PROJACC'] = (string)$accountDetails->PROJACC;
$allFieldsArray['PRIVATE_CUSTOMER'] = (string)$accountDetails->PRIVATE_CUSTOMER;
$allFieldsArray['DFLT_WAIVER'] = (string)$accountDetails->DFLT_WAIVER;
$allFieldsArray['AUTO_DEBIT_CARD_REQUEST'] = (string)$accountDetails->AUTO_DEBIT_CARD_REQUEST;
$allFieldsArray['AUTO_CHEQUE_BOOK_REQ'] = (string)$accountDetails->AUTO_CHEQUE_BOOK_REQ;
$allFieldsArray['DROVD'] = (string)$accountDetails->DROVD;
$allFieldsArray['CROVD'] = (string)$accountDetails->CROVD;
$allFieldsArray['SPL_AC_GEN'] = (string)$accountDetails->SPL_AC_GEN;
$allFieldsArray['DORM'] = (string)$accountDetails->DORM;
$allFieldsArray['AC_STAT_CB_DORMANT'] = (string)$accountDetails->AC_STAT_CB_DORMANT;
$allFieldsArray['BANCONTROL_FLAG'] = (string)$accountDetails->BANCONTROL_FLAG;
$allFieldsArray['MAKER'] = (string)$accountDetails->MAKER;
$allFieldsArray['MAKERSTAMP'] = (string)$accountDetails->MAKERSTAMP;
$allFieldsArray['CHECKER'] = (string)$accountDetails->CHECKER;
$allFieldsArray['CHECKERSTAMP'] = (string)$accountDetails->CHECKERSTAMP;
$allFieldsArray['MODNO'] = (string)$accountDetails->MODNO;
$allFieldsArray['TXNSTAT'] = (string)$accountDetails->TXNSTAT;
$allFieldsArray['AUTHSTAT'] = (string)$accountDetails->AUTHSTAT;

// }
// $response = simplexml_load_string($xmlResponse); // Replace $xmlResponse with your XML data as a string
// $response->registerXPathNamespace('ns', 'namespace_uri'); // Add appropriate namespace URI if required
$allFieldsArray = [];
// Provision-Main
$provisionMain = $response->xpath('//ns:Provision-Main');
foreach ($provisionMain as $main) {
    $allFieldsArray['PRVACCUI'] = (string)$main->PRVACCUI ?? 'N/A';
}
// Accmaintinstr
$accmaintinstr = $response->xpath('//ns:Accmaintinstr');
foreach ($accmaintinstr as $acc) {
    $allFieldsArray['BRN'] = (string)$acc->BRN ?? 'N/A';
    $allFieldsArray['ACC'] = (string)$acc->ACC ?? 'N/A';
    $allFieldsArray['DTOFLSTMAINT'] = (string)$acc->DTOFLSTMAINT ?? 'N/A';
}
// Acstatuslines
$acstatuslines = $response->xpath('//ns:Acstatuslines');
foreach ($acstatuslines as $status) {
    $allFieldsArray['ACSTATUS'] = (string)$status->ACSTATUS ?? 'N/A';
    $allFieldsArray['DESC'] = (string)$status->DESC ?? 'N/A';
}
// Intdetails
$intdetails = $response->xpath('//ns:Intdetails');
foreach ($intdetails as $detail) {
    $fields = ['CALCACC', 'BOOKACC', 'HASIS', 'INTSTARTDT', 'BOOKACCBRN', 'DRCRADV', 'CHGBOOKACCBRN', 'CHGBOOKACC', 'CHGSTARTDT', 'BRN', 'ACC'];
    foreach ($fields as $field) {
        $allFieldsArray[$field] = (string)$detail->$field ?? 'N/A';
    }
}
// Tddetails
$tddetails = $response->xpath('//ns:Tddetails');
foreach ($tddetails as $td) {
    $fields = ['AUTOROLL', 'CLONMAT', 'MOVINTUNCLM', 'ROLLTYPE', 'MOVPRIUNCLM', 'INTSTDT'];
    foreach ($fields as $field) {
        $allFieldsArray[$field] = (string)$td->$field ?? 'N/A';
    }
}
// Amount-Dates
$amountDates = $response->xpath('//ns:Amount-Dates');
foreach ($amountDates as $amount) {
    foreach ($amount->children() as $key => $value) {
        if ($key == 'Turnovers') {
            foreach ($value->children() as $turnoverKey => $turnoverValue) {
                $allFieldsArray[$turnoverKey] = (string)$turnoverValue ?? 'N/A';
            }
        } else {
            $allFieldsArray[$key] = (string)$value ?? 'N/A';
        }
    }
}
// Additional sections follow a similar approach
// Summary
$summary = $response->xpath('//ns:Summary');
foreach ($summary as $sum) {
    foreach ($sum->children() as $key => $value) {
        $allFieldsArray[$key] = (string)$value ?? 'N/A';
    }
}
// Custacc
$custacc = $response->xpath('//ns:Custacc');
foreach ($custacc as $cust) {
    $allFieldsArray['BRN'] = (string)$cust->BRN ?? 'N/A';
    $allFieldsArray['CUSTACNO'] = (string)$cust->CUSTACNO ?? 'N/A';
    if ($cust->LinkedEntities) {
        foreach ($cust->LinkedEntities->children() as $key => $value) {
            $allFieldsArray[$key] = (string)$value ?? 'N/A';
        }
    }
}
// Custacc-Sicdiary
$diary = $response->xpath('//ns:Custacc-Sicdiary');
foreach ($diary as $sic) {
    $allFieldsArray['BRNCD'] = (string)$sic->BRNCD ?? 'N/A';
    $allFieldsArray['ACCNO'] = (string)$sic->ACCNO ?? 'N/A';
}
// Remaining nodes (e.g., Custacc-Stccusbl, Accclose, etc.)
$sections = [
    '//ns:Custacc-Stccusbl' => ['BRN', 'ACCNO'],
    '//ns:Accclose' => ['BRN', 'ACC'],
    '//ns:Acc-Svcacsig' => ['ACBRN1', 'ACTNO', 'ACDESC', 'ACCCY'],
    '//ns:Custacc-Iccintpo' => ['BRANCH_CODE', 'CUST_AC_NO', 'CCY'],
    '//ns:Customer-Acc' => ['BRANCH_CODE', 'CUST_AC_NO'],
    '//ns:Master' => ['KEY_ID', 'FUNCTION_ID'],
    '//ns:Sttms-Cust-Acc-Swp' => ['BRANCH_CODE', 'CUST_AC_NO'],
    '//ns:Acc-Chnl' => ['BRANCH_CODE', 'CUST_AC_NO']
];
foreach ($sections as $path => $fields) {
    $nodes = $response->xpath($path);
    foreach ($nodes as $node) {
        foreach ($fields as $field) {
            $allFieldsArray[$field] = (string)$node->$field ?? 'N/A';
        }
    }
}
// UDFDETAILS
$udfDetails = $response->xpath('//ns:UDFDETAILS');
foreach ($udfDetails as $udf) {
    $fieldName = (string)$udf->FLDNAM ?? 'N/A';
    $fieldValue = (string)$udf->FLDVAL ?? 'N/A';
    $allFieldsArray[$fieldName] = $fieldValue;
}
// Debug output to verify extracted fields
$jsonResponse = json_encode($allFieldsArray, JSON_PRETTY_PRINT);
echo $jsonResponse;

// // Load the XML into a SimpleXMLElement object
// $xml = simplexml_load_string($response);
// $namespaces = $xml->getNamespaces(true);
// $body = $xml->children($namespaces['S'])->Body;
// var_dump($namespaces);
// var_dump($body);
// die;
// // Initialize the array to store field values
// $allFieldsArray = [];

// // Function to process XML and populate the array
// function processXmlElement($element, &$array) {
//     foreach ($element->children() as $child) {
//         if ($child->count() > 0) {
//             processXmlElement($child, $array[$child->getName()]);
//         } else {
//             $array[$child->getName()] = (string) $child;
//         }
//     }
// }

// // Populate the array using the recursive function
// processXmlElement($xml, $allFieldsArray);

// // Print the resulting array
// print_r($allFieldsArray);

// die;

// // Load the XML content
// $xml = simplexml_load_string($response);
// $namespaces = $xml->getNamespaces(true);
// // Register namespaces
// $body = $xml->children($namespaces['S'])->Body;
// $response = $body->QUERYCUSTACC_IOFS_RES;
// $response->registerXPathNamespace('ns', $namespaces['']);


// // Initialize the final array to store all extracted fields
// $allFields = array();

// // Extracting fields from 'UDFDETAILS'
// $udfDetails = $response->xpath('//ns:UDFDETAILS');
// foreach ($udfDetails as $udf) {
//     $fieldName = (string)$udf->FLDNAM;
//     $fieldValue = isset($udf->FLDVAL) ? (string)$udf->FLDVAL : 'N/A';
//     $allFields[$fieldName] = $fieldValue;
// }

// // Extracting customer personal details
// $custpersonal = $response->xpath('//ns:Cust-Account-Full')[0];

// $allFields['First Name'] = (string)$custpersonal->CUSTNAME;
// $allFields['Account Number'] = (string)$custpersonal->ACC;
// $allFields['Account Status'] = (string)$custpersonal->ACSTATNOCR;
// $allFields['Account Type'] = (string)$custpersonal->ACCTYPE;
// $allFields['Currency'] = (string)$custpersonal->CCY;

// // Extracting specific fields related to account
// $allFields['Account Opening Date'] = (string)$custpersonal->ACCOPENDT;
// $allFields['Branch'] = (string)$custpersonal->BRN;
// $allFields['Alternate Account'] = (string)$custpersonal->ALTACC;

// // Extracting amounts and balances
// $amountDates = $custpersonal->xpath('//ns:Amount-Dates')[0];
// $allFields['Opening Balance (NGN)'] = (string)$amountDates->ACY_OPENING_BAL;
// $allFields['Current Balance (NGN)'] = (string)$amountDates->ACY_CURR_BALANCE;

// // Extracting more details if available
// $allFields['Maker'] = (string)$custpersonal->MAKER;
// $allFields['Checker'] = (string)$custpersonal->CHECKER;
// $allFields['Maker Stamp'] = (string)$custpersonal->MAKERSTAMP;
// $allFields['Checker Stamp'] = (string)$custpersonal->CHECKERSTAMP;

// // Output the final object containing key-value pairs
// print_r($allFields);



// // $xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);
// // $namespaces = $xml->getNamespaces(true);

// // $body = $xml->children($namespaces['S'])->Body;
// // $response = $body->children($namespaces['']);
// // $response->registerXPathNamespace('ns', $namespaces['']);

// // // Extracting header information
// // $header = $response->FCUBS_HEADER;
// // $headerArray = [
// //     'Source' => (string)$header->SOURCE,
// //     'UBSCOMP' => (string)$header->UBSCOMP,
// //     'MsgID' => (string)$header->MSGID,
// //     'CorrelID' => (string)$header->CORRELID,
// //     'UserID' => (string)$header->USERID,
// //     'Branch' => (string)$header->BRANCH,
// //     'ModuleID' => (string)$header->MODULEID,
// //     'Service' => (string)$header->SERVICE,
// //     'Operation' => (string)$header->OPERATION,
// //     'SourceOperation' => (string)$header->SOURCE_OPERATION,
// //     'Destination' => (string)$header->DESTINATION,
// //     'FunctionID' => (string)$header->FUNCTIONID,
// //     'Action' => (string)$header->ACTION,
// //     'MsgStat' => (string)$header->MSGSTAT
// // ];

// // // Extracting error information
// // $errors = $response->FCUBS_ERROR_RESP->ERROR;
// // $errorArray = [];
// // foreach ($errors as $error) {
// //     $errorArray[] = [
// //         'ErrorCode' => (string)$error->ECODE,
// //         'ErrorDescription' => (string)$error->EDESC
// //     ];
// // }

// // // Final combined data structure
// // $data = [
// //     'Header' => $headerArray,
// //     'Errors' => $errorArray
// // ];

// // // Output the result as JSON
// // echo json_encode($data, JSON_PRETTY_PRINT);

// die;
// // $xmlContent = file_get_contents('path-to-your-xml-file.xml');
// $xml = simplexml_load_string($response);
// $namespaces = $xml->getNamespaces(true);
// // Register namespaces
// $body = $xml->children($namespaces['S'])->Body;
// $response = $body->QUERYCUSTACC_IOFS_RES;
// $response->registerXPathNamespace('ns', $namespaces['']);




// // Load the XML string
// $xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);

// // Convert to JSON
// $json = json_encode($xml);

// // Decode JSON into an associative array (optional)
// $array = json_decode($json, true);

// // Print the JSON output
// header('Content-Type: application/json');
// echo $json;
// echo 'KKKK';
// echo $array;

// // // Initialize CURL
// // $curl = curl_init();
// // // $custno = $_POST['custno'];
// // // $custno = '003841660';
// // // SOAP XML data
// //     $xml_data = "
// //     <soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:fcub='http://fcubs.ofss.com/service/FCUBSAccService'>
// //        <soapenv:Header/>
// //        <soapenv:Body>
// //           <fcub:QUERYCUSTACC_IOFS_REQ>
// //              <fcub:FCUBS_HEADER>
// //                 <fcub:SOURCE>NIPINCM</fcub:SOURCE>
// //                 <fcub:UBSCOMP>FCUBS</fcub:UBSCOMP>
// //                 <fcub:USERID>NIPINCM</fcub:USERID>
// //                 <fcub:BRANCH>004</fcub:BRANCH>
// //                 <fcub:MODULEID>ST</fcub:MODULEID>
// //                 <fcub:SERVICE>FCUBSAccService</fcub:SERVICE>
// //                 <fcub:OPERATION>QueryCustAcc</fcub:OPERATION>
// //                 <fcub:SOURCE_OPERATION>QueryCustAcc</fcub:SOURCE_OPERATION>
// //                 <fcub:FUNCTIONID>STDCUSAC</fcub:FUNCTIONID>
// //                 <fcub:ACTION>EXECUTEQUERY</fcub:ACTION>
// //              </fcub:FCUBS_HEADER>
// //              <fcub:FCUBS_BODY>
// //                 <fcub:Cust-Account-IO>
// //                    <fcub:ACC>0000693398</fcub:ACC>
// //                 </fcub:Cust-Account-IO>
// //              </fcub:FCUBS_BODY>
// //           </fcub:QUERYCUSTACC_IOFS_REQ>
// //        </soapenv:Body>
// //     </soapenv:Envelope>";

// // // CURL options
// // curl_setopt_array($curl, [
// //     CURLOPT_URL => "http://10.0.0.231:7003/FCUBSAccService/FCUBSAccService",
// //     CURLOPT_CUSTOMREQUEST => "POST",
// //     CURLOPT_RETURNTRANSFER => true,
// //     CURLOPT_POSTFIELDS => $data,
// //     CURLOPT_HTTPHEADER => [
// //         "Content-Type: text/xml;charset=UTF-8",
// //     ],
// //     CURLOPT_FOLLOWLOCATION => true,
// // ]);

// // // Execute CURL request
// // $response = curl_exec($curl);
// // echo $response;

// // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// //     $url = 'http://10.0.0.231:7003/FCUBSAccService/FCUBSAccService';
    
// //     $acc = $_POST['acc'];
    
// //     $xml_data = "
// //     <soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:fcub='http://fcubs.ofss.com/service/FCUBSAccService'>
// //        <soapenv:Header/>
// //        <soapenv:Body>
// //           <fcub:QUERYCUSTACC_IOFS_REQ>
// //              <fcub:FCUBS_HEADER>
// //                 <fcub:SOURCE>NIPINCM</fcub:SOURCE>
// //                 <fcub:UBSCOMP>FCUBS</fcub:UBSCOMP>
// //                 <fcub:USERID>NIPINCM</fcub:USERID>
// //                 <fcub:BRANCH>004</fcub:BRANCH>
// //                 <fcub:MODULEID>ST</fcub:MODULEID>
// //                 <fcub:SERVICE>FCUBSAccService</fcub:SERVICE>
// //                 <fcub:OPERATION>QueryCustAcc</fcub:OPERATION>
// //                 <fcub:SOURCE_OPERATION>QueryCustAcc</fcub:SOURCE_OPERATION>
// //                 <fcub:FUNCTIONID>STDCUSAC</fcub:FUNCTIONID>
// //                 <fcub:ACTION>EXECUTEQUERY</fcub:ACTION>
// //              </fcub:FCUBS_HEADER>
// //              <fcub:FCUBS_BODY>
// //                 <fcub:Cust-Account-IO>
// //                    <fcub:ACC>0000693398</fcub:ACC>
// //                 </fcub:Cust-Account-IO>
// //              </fcub:FCUBS_BODY>
// //           </fcub:QUERYCUSTACC_IOFS_REQ>
// //        </soapenv:Body>
// //     </soapenv:Envelope>";
    
// //     $headers = array(
// //         "Content-Type: text/xml;charset=UTF-8"
// //     );
    
// //     $ch = curl_init($url);
// //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
// //     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
// //     curl_setopt($ch, CURLOPT_DEFAULT_PROTOCOL, "https");
// //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// //     curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);
// //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
// //     $response = curl_exec($ch);



//     // $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
//     // $log = "Request:\n" . htmlspecialchars($xml_data) . "\n\nResponse:\n" . htmlspecialchars($response);
//     // file_put_contents('log.txt', $log);
    
//     // if (curl_errno($ch)) {
//     //     $result = 'Curl error: ' . curl_error($ch);
//     // } else {
//     //     if ($http_status == 200) {
//     //         $result = htmlspecialchars($response);
//     //     } else {
//     //         $result = "Error: Received HTTP status code $http_status";
//     //     }
//     // }
    
//     // curl_close($ch);
    
//     // echo $result;

