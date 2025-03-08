<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class setSendEmailTimeClass {
    public function setSendEmailTimeMethod($bean, $event, $arguments){
        // Set email time on new record creation
        if (empty($bean->fetched_row)) {
            $currentTime = new DateTime();
            $currentTime = $currentTime->modify('+1 hour'); // Add one hour for GMT+1
            if($bean->jd_status == 'UnResolved'){
                $currentTime = $currentTime->modify('+24 hour'); // Add 24 hour first email sent
                $currentTime = date_format($currentTime,'Y-m-d H:i:s');
                $bean->last_email_sent = $currentTime;
            }
        }
    }
}