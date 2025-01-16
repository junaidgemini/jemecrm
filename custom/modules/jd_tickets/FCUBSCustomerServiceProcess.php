<?php

// Initialize CURL
$curl = curl_init();
$custno = $_POST['custno'];
// $custno = '003841660';
// SOAP XML data
$data = <<<XML
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:fcub="http://fcubs.ofss.com/service/FCUBSCustomerService">
   <soapenv:Header/>
   <soapenv:Body>
      <fcub:QUERYCUSTOMER_IOFS_REQ>
         <fcub:FCUBS_HEADER>
            <fcub:SOURCE>NIPINCM</fcub:SOURCE>
            <fcub:UBSCOMP>FCUBS</fcub:UBSCOMP>
            <fcub:USERID>NIPINCM</fcub:USERID>
            <fcub:BRANCH>277</fcub:BRANCH>
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
</soapenv:Envelope>
XML;

// CURL options
curl_setopt_array($curl, [
    CURLOPT_URL => "http://10.0.0.231:7003/FCUBSCustomerService/FCUBSCustomerService?WSDL=null",
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
echo $response;
die;

// // Check for CURL errors
// if (curl_errno($curl)) {
//     echo 'CURL Error: ' . curl_error($curl);
// } else {
//     // Print the response
//     // header('Content-Type: application/xml'); // Optional, to display as XML in the browser
//     // echo $response;
// }

// // $xmlContent = file_get_contents('path-to-your-xml-file.xml');
// $xml = simplexml_load_string($response);
// $namespaces = $xml->getNamespaces(true);

// // Register namespaces
// $body = $xml->children($namespaces['S'])->Body;
// $response = $body->QUERYCUSTOMER_IOFS_RES;
// $response->registerXPathNamespace('ns', $namespaces['']);

// // Extract all fields from the XML
// $udfDetails = $response->xpath('//ns:UDFDETAILS');
// foreach ($udfDetails as $udf) {
//     $fieldName = (string)$udf->FLDNAM;
//     $fieldValue = isset($udf->FLDVAL) ? (string)$udf->FLDVAL : 'N/A';
//     $allFieldsArray[$fieldName] = $fieldValue;
// }
// // Extracting customer personal details
// $custpersonal = $response->xpath('//ns:Custpersonal');
// $firstName = (string)$custpersonal[0]->FSTNAME;
// $middleName = (string)$custpersonal[0]->MIDNAME;
// $lastName = (string)$custpersonal[0]->LSTNAME;
// $dob = (string)$custpersonal[0]->DOB;
// $gender = (string)$custpersonal[0]->GENDR;
// $nationId = (string)$custpersonal[0]->NATIONID;
// $nationIdType = (string)$custpersonal[0]->NATIONIDTYPE;
// $maritalStatus = (string)$custpersonal[0]->MARITALSTATUS;
// $domicile = (string)$custpersonal[0]->DOMICILE;
// $mobileNo = (string)$custpersonal[0]->MOBILENO;
// $emailId = (string)$custpersonal[0]->EMAILID;
// $occupation = (string)$custpersonal[0]->OCCUPATION;
// $education = (string)$custpersonal[0]->EDUCATION;
// $occStatus = (string)$custpersonal[0]->OCCUPSTATUS;
// $fatherName = (string)$custpersonal[0]->FTHNAME;
// $fatherOccupation = (string)$custpersonal[0]->FTHOCCUP;
// $motherName = (string)$custpersonal[0]->MTHNAME;
// $motherOccupation = (string)$custpersonal[0]->MTHOCCUP;

// $allFieldsArray['First Name'] = $firstName;
// $allFieldsArray['Middle Name'] = $middleName;
// $allFieldsArray['Last Name'] = $lastName;
// $allFieldsArray['Date of Birth'] = $dob;
// $allFieldsArray['Gender'] = $gender;
// $allFieldsArray['Nation ID'] = $nationId;
// $allFieldsArray['Nation ID Type'] = $nationIdType;
// $allFieldsArray['Marital Status'] = $maritalStatus;
// $allFieldsArray['Domicile'] = $domicile;
// $allFieldsArray['Mobile No'] = $mobileNo;
// $allFieldsArray['Email ID'] = $emailId;
// $allFieldsArray['Occupation'] = $occupation;
// $allFieldsArray['Education'] = $education;
// $allFieldsArray['Occupation Status'] = $occStatus;
// $allFieldsArray['Father Name'] = $fatherName;
// $allFieldsArray['Father Occupation'] = $fatherOccupation;
// $allFieldsArray['Mother Name'] = $motherName;
// $allFieldsArray['Mother Occupation'] = $motherOccupation;
// // Custpersonal
// $allFieldsArray['FSTNAME'] = (string)$custpersonal[0]->FSTNAME;
// $allFieldsArray['MIDNAME'] = (string)$custpersonal[0]->MIDNAME;
// $allFieldsArray['LSTNAME'] = (string)$custpersonal[0]->LSTNAME;
// $allFieldsArray['DOB'] = (string)$custpersonal[0]->DOB;
// $allFieldsArray['GENDR'] = (string)$custpersonal[0]->GENDR;
// $allFieldsArray['NATIONID'] = (string)$custpersonal[0]->NATIONID;
// $allFieldsArray['DADD2'] = (string)$custpersonal[0]->DADD2;
// $allFieldsArray['TELEPHNO'] = (string)$custpersonal[0]->TELEPHNO;
// $allFieldsArray['EMAILID'] = (string)$custpersonal[0]->EMAILID;
// $allFieldsArray['BENEFADDR1'] = (string)$custpersonal[0]->BENEFADDR1;
// $allFieldsArray['BENEFADDR2'] = (string)$custpersonal[0]->BENEFADDR2;
// $allFieldsArray['DCNTRY'] = (string)$custpersonal[0]->DCNTRY;
// $allFieldsArray['PCNTRY'] = (string)$custpersonal[0]->PCNTRY;
// $allFieldsArray['RESSTATUS'] = (string)$custpersonal[0]->RESSTATUS;
// $allFieldsArray['MOBNUM'] = (string)$custpersonal[0]->MOBNUM;
// $allFieldsArray['CUST_COMM_MODE'] = (string)$custpersonal[0]->CUST_COMM_MODE;
// $allFieldsArray['LANG'] = (string)$custpersonal[0]->LANG;
// $allFieldsArray['SBMTAGEPROOF'] = (string)$custpersonal[0]->SBMTAGEPROOF;
// $allFieldsArray['MINOR'] = (string)$custpersonal[0]->MINOR;
// $allFieldsArray['KYCSTAT'] = (string)$custpersonal[0]->KYCSTAT;
// $allFieldsArray['SAME_CORR_ADDR'] = (string)$custpersonal[0]->SAME_CORR_ADDR;
// $allFieldsArray['DADD1'] = (string)$custpersonal[0]->DADD1;
// $allFieldsArray['SAME_PERM_ADDR'] = (string)$custpersonal[0]->SAME_PERM_ADDR;
// $allFieldsArray['TITLE'] = (string)$custpersonal[0]->TITLE;
// $allFieldsArray['ADDRS4'] = (string)$custpersonal[0]->ADDRS4;
// $allFieldsArray['DADD4'] = (string)$custpersonal[0]->DADD4;
// $allFieldsArray['USRESSTATUS'] = (string)$custpersonal[0]->USRESSTATUS;
// $allFieldsArray['PAISSUED'] = (string)$custpersonal[0]->PAISSUED;
// $allFieldsArray['VSTUSPREV'] = (string)$custpersonal[0]->VSTUSPREV;
// $allFieldsArray['HOMETELNO'] = (string)$custpersonal[0]->HOMETELNO;
// $allFieldsArray['PREF_CNTACT_TIME'] = (string)$custpersonal[0]->PREF_CNTACT_TIME;
// $allFieldsArray['MOTHERMAIDN_NAME'] = (string)$custpersonal[0]->MOTHERMAIDN_NAME;

// // Extract FCUBS_BODY data
// $fcubsBody = $response->xpath('//ns:FCUBS_BODY');
// // Initialize the associative array for storing all details
// // $customerFullDetails = [];
// $Customer_Full = $response->xpath('//ns:Customer-Full');

// $allFieldsArray['PRIVATE_CUSTOMER'] = (string)$Customer_Full[0]->PRIVATE_CUSTOMER;
// $allFieldsArray['CUSTNO'] = (string)$Customer_Full[0]->CUSTNO;
// $allFieldsArray['CTYPE'] = (string)$Customer_Full[0]->CTYPE;
// $allFieldsArray['NAME'] = (string)$Customer_Full[0]->NAME;
// $allFieldsArray['ADDRLN1'] = (string)$Customer_Full[0]->ADDRLN1;
// $allFieldsArray['ADDRLN2'] = (string)$Customer_Full[0]->ADDRLN2;
// $allFieldsArray['ADDRLN4'] = (string)$Customer_Full[0]->ADDRLN4;
// $allFieldsArray['COUNTRY'] = (string)$Customer_Full[0]->COUNTRY;
// $allFieldsArray['SNAME'] = (string)$Customer_Full[0]->SNAME;
// $allFieldsArray['NLTY'] = (string)$Customer_Full[0]->NLTY;
// $allFieldsArray['LBRN'] = (string)$Customer_Full[0]->LBRN;
// $allFieldsArray['CCATEG'] = (string)$Customer_Full[0]->CCATEG;
// $allFieldsArray['FULLNAME'] = (string)$Customer_Full[0]->FULLNAME;
// $allFieldsArray['AR_AP_TRACKING'] = (string)$Customer_Full[0]->AR_AP_TRACKING;
// $allFieldsArray['UIDNAME'] = (string)$Customer_Full[0]->UIDNAME;
// $allFieldsArray['UIDVAL'] = (string)$Customer_Full[0]->UIDVAL;
// $allFieldsArray['FROZEN'] = (string)$Customer_Full[0]->FROZEN;
// $allFieldsArray['WHRUNKN'] = (string)$Customer_Full[0]->WHRUNKN;
// $allFieldsArray['MEDIA'] = (string)$Customer_Full[0]->MEDIA;
// $allFieldsArray['LOC'] = (string)$Customer_Full[0]->LOC;
// $allFieldsArray['MAILRSREQD'] = (string)$Customer_Full[0]->MAILRSREQD;
// $allFieldsArray['CHGGRP'] = (string)$Customer_Full[0]->CHGGRP;
// $allFieldsArray['CLSPARTICIPANT'] = (string)$Customer_Full[0]->CLSPARTICIPANT;
// $allFieldsArray['FXNETTCUST'] = (string)$Customer_Full[0]->FXNETTCUST;
// $allFieldsArray['CRMCUST'] = (string)$Customer_Full[0]->CRMCUST;
// $allFieldsArray['TRSRYCUST'] = (string)$Customer_Full[0]->TRSRYCUST;
// $allFieldsArray['RELPRICING'] = (string)$Customer_Full[0]->RELPRICING;
// $allFieldsArray['MT920'] = (string)$Customer_Full[0]->MT920;
// $allFieldsArray['FLGJOINT'] = (string)$Customer_Full[0]->FLGJOINT;
// $allFieldsArray['CREATEACC'] = (string)$Customer_Full[0]->CREATEACC;
// $allFieldsArray['TRACK_LIMITS'] = (string)$Customer_Full[0]->TRACK_LIMITS;
// $allFieldsArray['LIABID'] = (string)$Customer_Full[0]->LIABID;
// $allFieldsArray['FLGUTLTYPRVDR'] = (string)$Customer_Full[0]->FLGUTLTYPRVDR;
// $allFieldsArray['AMLREQD'] = (string)$Customer_Full[0]->AMLREQD;
// $allFieldsArray['CHKDIGITVALREQD'] = (string)$Customer_Full[0]->CHKDIGITVALREQD;
// $allFieldsArray['FTACCASOF'] = (string)$Customer_Full[0]->FTACCASOF;
// $allFieldsArray['CUSTUNADV'] = (string)$Customer_Full[0]->CUSTUNADV;
// $allFieldsArray['CONSTAXCERTRQD'] = (string)$Customer_Full[0]->CONSTAXCERTRQD;
// $allFieldsArray['INDTAXCERTRQD'] = (string)$Customer_Full[0]->INDTAXCERTRQD;
// $allFieldsArray['CLSCCYALLWD'] = (string)$Customer_Full[0]->CLSCCYALLWD;
// $allFieldsArray['UDFLBL1'] = (string)$Customer_Full[0]->UDFLBL1;
// $allFieldsArray['UDFLBL2'] = (string)$Customer_Full[0]->UDFLBL2;
// $allFieldsArray['UDFLBL3'] = (string)$Customer_Full[0]->UDFLBL3;
// $allFieldsArray['UDF1'] = (string)$Customer_Full[0]->UDF1;
// $allFieldsArray['UDF3'] = (string)$Customer_Full[0]->UDF3;
// $allFieldsArray['AUTOGENSTMTPLAN'] = (string)$Customer_Full[0]->AUTOGENSTMTPLAN;
// $allFieldsArray['MFI_CUSTOMER'] = (string)$Customer_Full[0]->MFI_CUSTOMER;
// $allFieldsArray['INVESTCUST'] = (string)$Customer_Full[0]->INVESTCUST;
// $allFieldsArray['SSTAFF'] = (string)$Customer_Full[0]->SSTAFF;
// $allFieldsArray['SANCHKREQ_ATTXNLVL'] = (string)$Customer_Full[0]->SANCHKREQ_ATTXNLVL;
// $allFieldsArray['WITHHOLDINGTAXAP'] = (string)$Customer_Full[0]->WITHHOLDINGTAXAP;
// $allFieldsArray['SPECIAL_CUST'] = (string)$Customer_Full[0]->SPECIAL_CUST;
// $allFieldsArray['CRS_CUST_TYPE'] = (string)$Customer_Full[0]->CRS_CUST_TYPE;
// $allFieldsArray['MAKER'] = (string)$Customer_Full[0]->MAKER;
// $allFieldsArray['MAKERSTAMP'] = (string)$Customer_Full[0]->MAKERSTAMP;
// $allFieldsArray['CHECKER'] = (string)$Customer_Full[0]->CHECKER;
// $allFieldsArray['CHECKERSTAMP'] = (string)$Customer_Full[0]->CHECKERSTAMP;
// $allFieldsArray['MODNO'] = (string)$Customer_Full[0]->MODNO;
// $allFieldsArray['TXNSTAT'] = (string)$Customer_Full[0]->TXNSTAT;
// $allFieldsArray['AUTHSTAT'] = (string)$Customer_Full[0]->AUTHSTAT;

// // var_dump($allFieldsArray);
// $jsonResponse = json_encode($allFieldsArray, JSON_PRETTY_PRINT);
// echo $jsonResponse;