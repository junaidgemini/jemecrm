<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class SendEmailHook {
    public function sendNotificationEmail($bean, $event, $arguments){
        global $db, $sugar_config;
        require_once('include/SugarPHPMailer.php');
        require_once("modules/Administration/Administration.php");
        require_once("modules/EmailTemplates/EmailTemplate.php");
        if (!empty($bean->fetched_row) && isset($bean->fetched_row['id'])) {
            // old status != New status
            if($bean->fetched_row['jd_status'] != $bean->jd_status){
                // when ticket is resolved send email customrs email
                if($bean->jd_status == 'Resolved'){
                    // send email to customer when ticket is resolved
                    if (!empty($bean->email)){
                        $emailtemplate = new EmailTemplate();
                        $emailtemplate = $emailtemplate->retrieve("6761c279-4a01-07a9-107d-67ca4dbec657");
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
                        $this->sendEmail($bean->email, $template_data);
                    }
                }
                //  else if($bean->customer_interaction_status == 'InProgress'){
                //     // when status is changed to in progress set email reminder next day same time (24 h later)
                //     $currentTime = new DateTime();
                //     echo '<pre>';
                //     var_dump($currentTime);
                //     $currentTime = $currentTime->modify('+1 hour'); // Add one hour for GMT+1
                //     var_dump($currentTime);
                //     $currentTime = $currentTime->modify('+24 hour'); // Add 24 hour for nect email send
                //     $currentTime = date_format($currentTime,'Y-m-d H:i:s');
                //     var_dump($currentTime);
                //     $bean->last_email_sent = $currentTime;
                //     var_dump($bean->last_email_sent);
                //     die;
                // }
            }
            return;
        } else {
            // Only send email on new record creation
            // Fetch Assigned User
            $assignedUserId = $bean->assigned_user_id;
            if (empty($assignedUserId)) {
                $GLOBALS['log']->fatal('assignedUserId id null' .$assignedUserId );
                return;
            }

            $assignedUser = BeanFactory::getBean('Users', $assignedUserId);
            $assignedEmail = $assignedUser->email1;
            $assignedName = $assignedUser->first_name . ' ' . $assignedUser->last_name;

            // Fetch Report To (Manager) User
            $reportToId = $assignedUser->reports_to_id;
            $reportToEmail = '';
            $reportToName = '';

            if (!empty($reportToId)) {
                $reportToUser = BeanFactory::getBean('Users', $reportToId);
                $reportToEmail = $reportToUser->email1;
                $reportToName = $reportToUser->first_name . ' ' . $reportToUser->last_name;
            }
            // Send Email to Record
            if (!empty($bean->branch_email)){
                $customersEmail = $bean->branch_email;
                $emailtemplate = new EmailTemplate();
                $emailtemplate = $emailtemplate->retrieve("6f1a5cb0-8285-bb40-6a2f-67ca47e36ff2");
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
                $this->sendEmail($customersEmail, $template_data);
            }

            // Send Email to Assigned User
            if (!empty($assignedEmail)) {
                $emailtemplate = new EmailTemplate();
                $emailtemplate = $emailtemplate->retrieve("307c70fd-5566-77d8-165b-67cc76a4d929");
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
            }
            // Send Email to Report-To User if exists
            if (!empty($reportToEmail)) {
                $emailtemplate = new EmailTemplate();
                $emailtemplate = $emailtemplate->retrieve("2904f6bd-b1db-9e48-3bfa-67cc767d07c8");
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
            }
            // escalation_officer_email
            if (!empty($bean->escalation_officer_email)) {
                $emailtemplate = new EmailTemplate();
                $emailtemplate = $emailtemplate->retrieve("44297bbc-c9df-8705-d103-67cc7716e0c0");
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
                // $this->sendEmail($reportToEmail, $subject, $body);
                $this->sendEmail($bean->escalation_officer_email, $template_data);
            }
        }
    }
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
        $mail->AddAddress($toEmail);
        if (!$mail->Send()) {
            $GLOBALS['log']->fatal("Email failed to send to: $toEmail");
        } else {
            $GLOBALS['log']->info("Email sent successfully to: $toEmail");
        }
    }
}