<?php
array_push($job_strings, 'SendFollowupEmails_ceo_union_weekly_report');

function SendFollowupEmails_ceo_union_weekly_report() {
    require_once('custom/modules/Schedulers/SendFollowupEmails_ceo_union_weekly_report.php');
    $emailSender = new SendFollowupEmails_ceo_union_weekly_report();
    $emailSender->execute_SendFollowupEmails_ceo_union_weekly_report();
    return true;
}
?>