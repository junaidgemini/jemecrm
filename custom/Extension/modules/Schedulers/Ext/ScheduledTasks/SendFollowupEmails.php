<?php
array_push($job_strings, 'send_followup_emails');

function send_followup_emails() {
    require_once('custom/modules/Schedulers/SendFollowupEmails_jd_customer_satisfaction.php');
    $emailSender = new SendFollowupEmails_jd_customer_satisfaction();
    $emailSender->execute_jd_customer_satisfaction();
    return true;
}
?>