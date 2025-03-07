<?php
array_push($job_strings, 'SendFollowupEmails_jd_customer_satisfaction');

function SendFollowupEmails_jd_customer_satisfaction() {
    require_once('custom/modules/Schedulers/SendFollowupEmails_jd_customer_satisfaction.php');
    $emailSender = new SendFollowupEmails_jd_customer_satisfaction();
    $emailSender->execute_jd_customer_satisfaction();
    return true;
}
?>