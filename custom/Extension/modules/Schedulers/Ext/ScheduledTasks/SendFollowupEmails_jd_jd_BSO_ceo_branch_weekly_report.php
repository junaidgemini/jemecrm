<?php
array_push($job_strings, 'SendFollowupEmails_jd_jd_BSO_ceo_branch_weekly_report');

function SendFollowupEmails_jd_jd_BSO_ceo_branch_weekly_report() {
    require_once('custom/modules/Schedulers/SendFollowupEmails_jd_jd_BSO_ceo_branch_weekly_report.php');
    $emailSender = new SendFollowupEmails_jd_jd_BSO_ceo_branch_weekly_report();
    $emailSender->execute_SendFollowupEmails_jd_jd_BSO_ceo_branch_weekly_report();
    return true;
}
?>