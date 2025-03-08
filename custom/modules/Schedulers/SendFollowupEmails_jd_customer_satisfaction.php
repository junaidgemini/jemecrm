<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
// $emailSender = new SendFollowupEmails_jd_customer_satisfaction();
// $emailSender->execute_jd_customer_satisfaction();

class SendFollowupEmails_jd_customer_satisfaction {
    public function execute_jd_customer_satisfaction() {
        global $db, $sugar_config,$bean;
        require_once('include/SugarPHPMailer.php');
        // echo '<pre>';
        // Define business hours (9 AM - 5 PM)
        // Get current time in SuiteCRM's configured time zone
        // date_default_timezone_set('Asia/Karachi');
        // date_default_timezone_set('Gmt+1');
        $currentTime = new DateTime();
        $TimeZone = $currentTime->modify('+1 hour'); // Add one hour for GMT+1 TimeZone
        $currentHour = (int)$TimeZone->format('G');
        $currentDay = (int)$TimeZone->format('N'); // 1=Monday, 7=Sunday
        $GLOBALS['log']->fatal('currentDateTime'.$currentDay);
        // Run only on weekdays (Monday to Friday) & during business hours (9 AM - 5 PM)
        // if ($currentDay > 5 || $currentHour < 8 || $currentHour >= 17) {
        //     echo 'out of business hours';
        //     return;
        // }
        // Get current time
        // $currentTime = date('Y-m-d H:i');
        $currentTimeForQuery = date_format($TimeZone,'Y-m-d H');
        // Query to get records that need an email
        // $query = "SELECT id, last_email_sent, priority, customer_interaction_status,assigned_user_id,escalation_officer_email FROM jd_customer_satisfaction WHERE customer_interaction_status ='Pending' AND priority='High' AND(last_email_sent IS NULL OR TIMESTAMPDIFF(HOUR, last_email_sent, '$currentTime') >= 2)";
        $query = "SELECT id, last_email_sent, email, priority, customer_interaction_status,assigned_user_id,escalation_officer_email, date_entered FROM jd_customer_satisfaction WHERE (customer_interaction_status ='Pending' OR customer_interaction_status ='InProgress') AND DATE_FORMAT(last_email_sent, '%Y-%m-%d %H') = '".$currentTimeForQuery."'  ORDER BY date_entered DESC";
        // DATE_FORMAT(reminder_date_time, '%Y-%m-%d %H:%i') = '".$currentDateTime."'
        var_dump($query);
        $result = $db->query($query);
        if($result->num_rows > 0){
            while ($row = $db->fetchByAssoc($result)) {
                $recordId = $row['id'];
                $assignedUserId = $row['assigned_user_id'];
                $date_entered = $row['date_entered'];
                $Customers_email = $row['email'];
                // Get Assigned User Details
                $assignedUser = BeanFactory::getBean('Users', $assignedUserId);
                $assignedEmail = $assignedUser->email1;
                $assignedName = $assignedUser->first_name . ' ' . $assignedUser->last_name;
                // Get "Reports To" User Details
                $reportToId = $assignedUser->reports_to_id;
                $reportToEmail = '';
                $reportToName = '';
                if (!empty($reportToId)) {
                    $reportToUser = BeanFactory::getBean('Users', $reportToId);
                    $reportToEmail = $reportToUser->email1;
                    $reportToName = $reportToUser->first_name . ' ' . $reportToUser->last_name;
                }

                // Send Email to Customers Email
                if (!empty($Customers_email)) {
                    // for new customers Satisfaction record.
                    $emailtemplate = new EmailTemplate();
                    $emailtemplate = $emailtemplate->retrieve("ea8536ea-576e-3d0b-a245-67be89c5a12f");
                    $emailtemplate->parsed_entities = null;
                    $temp = array();
                    $template_data = $emailtemplate->parse_email_template(
                    array(
                        "subject" => $emailtemplate->subject,
                        "body_html" => $emailtemplate->body_html,
                        "body" => $emailtemplate->body
                        ),
                        'jd_customer_satisfaction',
                        $bean,
                        $temp
                    );
                    $this->sendEmail($Customers_email, $template_data);
                }

                // Send Email to Assigned User
                if (!empty($assignedEmail)) {
                    // for new customers Satisfaction record.
                    $emailtemplate = new EmailTemplate();
                    $emailtemplate = $emailtemplate->retrieve("80118939-f245-6a3f-10fd-67be87775cdc");
                    $emailtemplate->parsed_entities = null;
                    $temp = array();
                    $template_data = $emailtemplate->parse_email_template(
                    array(
                        "subject" => $emailtemplate->subject,
                        "body_html" => $emailtemplate->body_html,
                        "body" => $emailtemplate->body
                        ),
                        'jd_customer_satisfaction',
                        $bean,
                        $temp
                    );
                    $this->sendEmail($assignedEmail, $template_data);
                }
                // Send Email to Report-To User if exists
                if (!empty($reportToEmail)) {
                    // $this->sendEmail($reportToEmail, $subject, $body);
                    $emailtemplate = new EmailTemplate();
                    $emailtemplate = $emailtemplate->retrieve("f39165ce-0fc9-c6f0-2e0b-67cb62a040a4");
                    $emailtemplate->parsed_entities = null;
                    $temp = array();
                    $template_data = $emailtemplate->parse_email_template(
                    array(
                        "subject" => $emailtemplate->subject,
                        "body_html" => $emailtemplate->body_html,
                        "body" => $emailtemplate->body
                        ),
                        'jd_customer_satisfaction',
                        $bean,
                        $temp
                    );
                    $this->sendEmail($reportToEmail, $template_data);
                }
                // escalation_officer_email if exists
                if (!empty($row['escalation_officer_email'])) {
                    $emailtemplate = new EmailTemplate();
                    $emailtemplate = $emailtemplate->retrieve("203f1368-5568-886c-f070-67cb6370e8cd");
                    $emailtemplate->parsed_entities = null;
                    $temp = array();
                    $template_data = $emailtemplate->parse_email_template(
                    array(
                        "subject" => $emailtemplate->subject,
                        "body_html" => $emailtemplate->body_html,
                        "body" => $emailtemplate->body
                        ),
                        'jd_customer_satisfaction',
                        $bean,
                        $temp
                    );
                    $this->sendEmail($row['escalation_officer_email'], $template_data);
                }
                // Update the last email sent time
                // $updateQuery = "UPDATE jd_customer_satisfaction SET last_email_sent = '$currentTime' WHERE id = '$recordId'";
                // $db->query($updateQuery);
                if($row['priority'] == 'High'){
                    echo 'High';
                    // // Update the last email sent time
                    // $nextEmailTime ='';
                    // $nextEmailTime = $TimeZone->modify('+2 hour'); // Add 2 hour first email sent
                    // $nextEmailTime = date_format($nextEmailTime,'Y-m-d H:i:s');
                    // $updateQuery = "UPDATE jd_customer_satisfaction SET last_email_sent = '$nextEmailTime' WHERE id = '$recordId'";
                    // $db->query($updateQuery);
                    // format timezone according to DB Format
                    $currentTime = date_format($TimeZone,'Y-m-d H:i:s');
                    if ($this->getDaysDifference($date_entered, $currentTime) <= 7) {
                        // Update the last email sent time
                        $nextEmailTime ='';
                        $nextEmailTime = $TimeZone->modify('+24 hour'); // Add 2 hour first email sent
                        $nextEmailTime = date_format($nextEmailTime,'Y-m-d H:i:s');
                        $updateQuery = "UPDATE jd_customer_satisfaction SET last_email_sent = '$nextEmailTime' WHERE id = '$recordId'";
                        $db->query($updateQuery);
                    } else{
                        echo '7 din ho gay han is record ko bane.';
                    }
                    
                } else if($row['priority'] == 'Medium'){
                    // format timezone according to DB Format
                    $currentTime = date_format($TimeZone,'Y-m-d H:i:s');
                    if ($this->getDaysDifference($date_entered, $currentTime) <= 7) {
                        // echo 'abi ha time';
                        echo 'Medium';
                        // Update the last email sent time
                        $nextEmailTime ='';
                        $nextEmailTime = $TimeZone->modify('+24 hour'); // Add 2 hour first email sent
                        $nextEmailTime = date_format($nextEmailTime,'Y-m-d H:i:s');
                        $updateQuery = "UPDATE jd_customer_satisfaction SET last_email_sent = '$nextEmailTime' WHERE id = '$recordId'";
                        $db->query($updateQuery);
                    } else{
                        echo '7 din ho gay han is record ko bane.';
                    }
                } else if($row['priority'] == 'Low'){
                    // echo 'Low';
                    //  // Update the last email sent time
                    //  $nextEmailTime ='';
                    //  $nextEmailTime = $TimeZone->modify('+24 hour'); // Add 2 hour first email sent
                    //  $nextEmailTime = date_format($nextEmailTime,'Y-m-d H:i:s');
                    //  $updateQuery = "UPDATE jd_customer_satisfaction SET last_email_sent = '$nextEmailTime' WHERE id = '$recordId'";
                    //  $db->query($updateQuery);
                    // format timezone according to DB Format
                    $currentTime = date_format($TimeZone,'Y-m-d H:i:s');
                    if ($this->getDaysDifference($date_entered, $currentTime) <= 7) {
                        echo 'Medium';
                        // Update the last email sent time
                        $nextEmailTime ='';
                        $nextEmailTime = $TimeZone->modify('+24 hour'); // Add 2 hour first email sent
                        $nextEmailTime = date_format($nextEmailTime,'Y-m-d H:i:s');
                        $updateQuery = "UPDATE jd_customer_satisfaction SET last_email_sent = '$nextEmailTime' WHERE id = '$recordId'";
                        $db->query($updateQuery);
                    } else{
                        echo '7 din ho gay han is record ko bane.';
                    }
                }
            }
            return;
        } else{
            echo 'no record found';
            return;
        }
    }
    private function getDaysDifference($date1,$date2) {
        // return $date1->diff($date2)->days;
        try {
            $d1 = new DateTime($date1);
            $d2 = new DateTime($date2);
            $diff = $d1->diff($d2);
            return $diff->days;
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    // private function sendEmail($toEmail, $subject, $body) {
    private function sendEmail($toEmail, $template_data) {
        if (empty($toEmail)) {
            return;
        }
        $email_body = $template_data["body_html"];
        $email_subject = $template_data["subject"];
        $admin = new Administration();
        $admin->retrieveSettings();
        $mail = new SugarPHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = $admin->settings['mail_smtpserver'];
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->Username = $admin->settings['mail_smtpuser'];
        $mail->Password = $admin->settings['mail_smtppass'];
        $mail->From = $admin->settings['notify_fromaddress'];
        $mail->FromName = $admin->settings['notify_fromname'];
        $mail->Subject = $email_subject;
        $mail->Body = from_html($email_body);
        $mail->IsHTML(true);
        $mail->prepForOutbound();
        // $mail->IsHTML(true);
        $mail->AddAddress($toEmail);
        if (!$mail->Send()) {
            $GLOBALS['log']->fatal("Email failed to send to: $toEmail");
        } else {
            $GLOBALS['log']->info("Email sent successfully to: $toEmail");
        }
    }

    private function isWithinBusinessDays($dateEntered) {
        $date = new DateTime($dateEntered);
        $businessDays = 0;
    
        // Count business days from creation
        while ($businessDays < 5) {
            $date->modify('+1 day');
            $dayOfWeek = $date->format('N'); // 1 (Monday) to 7 (Sunday)
    
            if ($dayOfWeek <= 5) { // Count only Monday to Friday
                $businessDays++;
            }
        }
        // Compare with today's date
        return new DateTime() <= $date; // Returns true if still within 5 business days
    }
    
}
?>