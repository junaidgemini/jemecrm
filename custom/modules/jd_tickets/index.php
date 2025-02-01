<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
$redirect_URL= 'index.php?module=jd_tickets&action=displayTickets';
header("Location: $redirect_URL");