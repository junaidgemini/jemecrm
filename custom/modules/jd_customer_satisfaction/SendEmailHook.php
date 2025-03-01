<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class SendEmailHook {
    public function sendNotificationEmail($bean, $event, $arguments){
        // Only send email on new record creation
        if (!empty($bean->fetched_row) && isset($bean->fetched_row['id'])) {
            // return;
        }

        global $db, $sugar_config;
        require_once('include/SugarPHPMailer.php');
        require_once("modules/Administration/Administration.php");
        require_once("modules/EmailTemplates/EmailTemplate.php");
        // Fetch Assigned User
        $assignedUserId = $bean->assigned_user_id;
        if (empty($assignedUserId)) {
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

        // Send Email to Assigned User
        if (!empty($assignedEmail)) {
            // for new customers Satisfaction record.
            $emailtemplate = new EmailTemplate();
            $emailtemplate = $emailtemplate->retrieve("36c4501a-2184-ad45-18af-677a650d995d");
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
            $emailtemplate = $emailtemplate->retrieve("36c4501a-2184-ad45-18af-677a650d995d");
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
        // escalation_officer_email
        if (!empty($bean->escalation_officer_email)) {
            // 
             // for new customers Satisfaction record.
             $emailtemplate = new EmailTemplate();
             $emailtemplate = $emailtemplate->retrieve("36c4501a-2184-ad45-18af-677a650d995d");
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
            // $this->sendEmail($reportToEmail, $subject, $body);
            $this->sendEmail($bean->escalation_officer_email, $template_data);
        }
    }

    // private function sendEmail($toEmail, $subject, $body) {
        private function sendEmail($toEmail, $template_data) {
        if (empty($toEmail)) {
            return;
        }
        $email_body = $template_data["body"];
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