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
                        $emailtemplate = $emailtemplate->retrieve("a11be084-bb9e-91c3-79f4-67ca5498c730");
                        $emailtemplate->parsed_entities = null;
                        $temp = array();
                        $template_data = $emailtemplate->parse_email_template(
                        array(
                            "subject" => $emailtemplate->subject,
                            "body_html" => $emailtemplate->body_html,
                            "body" => $emailtemplate->body
                            ),
                            'jd_jd_BSO_ceo_branch_weekly_report',
                            $bean,
                            $temp
                        );
                        $this->sendEmail($bean->email, $template_data);
                    }
                }
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
            // Send Email to Customers Record
            if (!empty($bean->branch_email)){
                $customersEmail = $bean->branch_email;
                // for new customers Satisfaction record.
                $emailtemplate = new EmailTemplate();
                $emailtemplate = $emailtemplate->retrieve("73c3ea25-51ce-b787-9d65-67cc8261114b");
                $emailtemplate->parsed_entities = null;
                $temp = array();
                $template_data = $emailtemplate->parse_email_template(
                array(
                    "subject" => $emailtemplate->subject,
                    "body_html" => $emailtemplate->body_html,
                    "body" => $emailtemplate->body
                    ),
                    'jd_jd_BSO_ceo_branch_weekly_report',
                    $bean,
                    $temp
                );
                $this->sendEmail($customersEmail, $template_data);
            }

            // Send Email to Assigned User
            if (!empty($assignedEmail)) {
                // for new customers Satisfaction record.
                $emailtemplate = new EmailTemplate();
                $emailtemplate = $emailtemplate->retrieve("23320396-775c-b4c5-917c-67ca59404493");
                $emailtemplate->parsed_entities = null;
                $temp = array();
                $template_data = $emailtemplate->parse_email_template(
                array(
                    "subject" => $emailtemplate->subject,
                    "body_html" => $emailtemplate->body_html,
                    "body" => $emailtemplate->body
                    ),
                    'jd_jd_BSO_ceo_branch_weekly_report',
                    $bean,
                    $temp
                );
                $this->sendEmail($assignedEmail, $template_data);
            }
            // Send Email to Report-To User if exists
            if (!empty($reportToEmail)) {
                // $this->sendEmail($reportToEmail, $subject, $body);
                $emailtemplate = new EmailTemplate();
                $emailtemplate = $emailtemplate->retrieve("175259e5-209a-cce8-bd5a-67cc82baf1c3");
                $emailtemplate->parsed_entities = null;
                $temp = array();
                $template_data = $emailtemplate->parse_email_template(
                array(
                    "subject" => $emailtemplate->subject,
                    "body_html" => $emailtemplate->body_html,
                    "body" => $emailtemplate->body
                    ),
                    'jd_jd_BSO_ceo_branch_weekly_report',
                    $bean,
                    $temp
                );
                $this->sendEmail($reportToEmail, $template_data);
            }
            // escalation_officer_email
            if (!empty($bean->escalation_officer_email)) {
                // 
                // for new customers Satisfaction record.
                $emailtemplate = new EmailTemplate();
                $emailtemplate = $emailtemplate->retrieve("38848ea7-4635-0fc0-289a-67cc82a83c1a");
                $emailtemplate->parsed_entities = null;
                $temp = array();
                $template_data = $emailtemplate->parse_email_template(
                array(
                    "subject" => $emailtemplate->subject,
                    "body_html" => $emailtemplate->body_html,
                    "body" => $emailtemplate->body
                    ),
                    'jd_jd_BSO_ceo_branch_weekly_report',
                    $bean,
                    $temp
                );
                // $this->sendEmail($reportToEmail, $subject, $body);
                $this->sendEmail($bean->escalation_officer_email, $template_data);
            }
        }
    }
        private function sendEmail($toEmail, $template_data){
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