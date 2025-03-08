<?php
// SendFollowupEmails_ceo_union_weekly_report
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
// $emailSender = new SendFollowupEmails_ceo_union_weekly_report();
// $emailSender->execute_SendFollowupEmails_ceo_union_weekly_report();

class SendFollowupEmails_ceo_union_weekly_report {
    public function execute_SendFollowupEmails_ceo_union_weekly_report() {
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
        $query = "SELECT id, last_email_sent, jd_status, assigned_user_id, escalation_officer_email, branch_email, date_entered FROM jd_BSO_ceo_union_weekly_report WHERE jd_status ='UnResolved' AND DATE_FORMAT(last_email_sent, '%Y-%m-%d %H') = '".$currentTimeForQuery."'  ORDER BY date_entered DESC";
        // DATE_FORMAT(reminder_date_time, '%Y-%m-%d %H:%i') = '".$currentDateTime."'
        var_dump($query);
        $result = $db->query($query);
        if($result->num_rows > 0){
            while ($row = $db->fetchByAssoc($result)) {
                $recordId = $row['id'];
                $assignedUserId = $row['assigned_user_id'];
                $date_entered = $row['date_entered'];
                $branch_email = $row['branch_email'];

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
                
                // Send Email to Record
                if (!empty($branch_email)){
                    $branch_email = $branch_email;
                    $emailtemplate = new EmailTemplate();
                    $emailtemplate = $emailtemplate->retrieve("2be93027-75e2-c823-7010-67cc7ccd1eb5");
                    $emailtemplate->parsed_entities = null;
                    $temp = array();
                    $template_data = $emailtemplate->parse_email_template(
                    array(
                        "subject" => $emailtemplate->subject,
                        "body_html" => $emailtemplate->body_html,
                        "body" => $emailtemplate->body
                        ),
                        'jd_BSO_ceo_union_weekly_report',
                        $bean,
                        $temp
                    );
                    $this->sendEmail($branch_email, $template_data);
                }

                // Send Email to Assigned User
                if (!empty($assignedEmail)) {
                    $emailtemplate = new EmailTemplate();
                    $emailtemplate = $emailtemplate->retrieve("9db4f0af-46fb-0225-7cb0-67cb5a3897c6");
                    $emailtemplate->parsed_entities = null;
                    $temp = array();
                    $template_data = $emailtemplate->parse_email_template(
                    array(
                        "subject" => $emailtemplate->subject,
                        "body_html" => $emailtemplate->body_html,
                        "body" => $emailtemplate->body
                        ),
                        'jd_BSO_ceo_union_weekly_report',
                        $bean,
                        $temp
                    );
                    $this->sendEmail($assignedEmail, $template_data);
                    $GLOBALS['log']->fatal('jd_BSO_ceo_union_weekly_report send Email to assigne'.$assignedEmail);
                }
                // Send Email to Report-To User if exists
                if (!empty($reportToEmail)) {
                    // $this->sendEmail($reportToEmail, $subject, $body);
                    $emailtemplate = new EmailTemplate();
                    $emailtemplate = $emailtemplate->retrieve("37c37773-700e-2e0f-7b5f-67cc7df6d266");
                    $emailtemplate->parsed_entities = null;
                    $temp = array();
                    $template_data = $emailtemplate->parse_email_template(
                    array(
                        "subject" => $emailtemplate->subject,
                        "body_html" => $emailtemplate->body_html,
                        "body" => $emailtemplate->body
                        ),
                        'jd_BSO_ceo_union_weekly_report',
                        $bean,
                        $temp
                    );
                    $this->sendEmail($reportToEmail, $template_data);
                    $GLOBALS['log']->fatal('jd_BSO_ceo_union_weekly_report send Email to reportToEmail'.$reportToEmail);
                }
                // escalation_officer_email if exists
                if (!empty($row['escalation_officer_email'])) {
                    $escalation_officer_email = $row['escalation_officer_email'];
                    $emailtemplate = new EmailTemplate();
                    $emailtemplate = $emailtemplate->retrieve("e4fcf5f6-351a-45d9-c58d-67cc7d99969e");
                    $emailtemplate->parsed_entities = null;
                    $temp = array();
                    $template_data = $emailtemplate->parse_email_template(
                    array(
                        "subject" => $emailtemplate->subject,
                        "body_html" => $emailtemplate->body_html,
                        "body" => $emailtemplate->body
                        ),
                        'jd_BSO_ceo_union_weekly_report',
                        $bean,
                        $temp
                    );
                    $this->sendEmail($escalation_officer_email, $template_data);
                    $GLOBALS['log']->fatal('jd_BSO_ceo_union_weekly_report send Email to reportToEmail'.$escalation_officer_email);
                }
                // Update the last email sent time
                // $updateQuery = "UPDATE jd_customer_satisfaction SET last_email_sent = '$currentTime' WHERE id = '$recordId'";
                // $db->query($updateQuery);
                if($row['jd_status'] == 'UnResolved'){
                    // format timezone according to DB Format
                    $currentTime = date_format($TimeZone,'Y-m-d H:i:s');
                        // Update the last email sent time
                        $nextEmailTime ='';
                        $nextEmailTime = $TimeZone->modify('+24 hour'); // Add 2 hour first email sent
                        $nextEmailTime = date_format($nextEmailTime,'Y-m-d H:i:s');
                        $updateQuery = "UPDATE jd_BSO_ceo_union_weekly_report SET last_email_sent = '$nextEmailTime' WHERE id = '$recordId'";
                        $db->query($updateQuery);
                        $GLOBALS['log']->fatal('jd_BSO_ceo_union_weekly_report update record for next email time'.$updateQuery);
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