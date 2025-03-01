<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class setSendEmailTimeClass {
    public function setSendEmailTimeMethod($bean, $event, $arguments){
        // Only send email on new record creation
        if (!empty($bean->fetched_row) && isset($bean->fetched_row['id'])) {
            // return;
            $currentTime = new DateTime();
            $currentTime = $currentTime->modify('+1 hour'); // Add one hour for GMT+1
            if($bean->priority == 'High'){
                $currentTime = $currentTime->modify('+2 hour'); // Add 2 hour first email sent
                $currentTime = date_format($currentTime,'Y-m-d H:i:s');
                $bean->last_email_sent = $currentTime;
            } else if($bean->priority == 'Medium'){
                $currentTime = $currentTime->modify('+24 hour'); // Add 24 hour for nect email send
                $currentTime = date_format($currentTime,'Y-m-d H:i:s');
                $bean->last_email_sent = $currentTime;
            } else if($bean->priority == 'Low'){
                $currentTime = $currentTime->modify('+24 hour'); // Add 24 hour for nect email send
                $currentTime = date_format($currentTime,'Y-m-d H:i:s');
                $bean->last_email_sent = $currentTime;
            }
        }
    }
}