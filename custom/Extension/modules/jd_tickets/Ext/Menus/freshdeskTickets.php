<?php
global $module_menu;
unset($module_menu);
$module_menu[]=Array("index.php?module=jd_tickets&action=displayTickets", "Show Tickets", "List", "jd_tickets");
$module_menu[]=Array("index.php?module=jd_tickets&action=FCUBSCustomerService", "FCUBS Customer Service", "List", "jd_tickets");
$module_menu[]=Array("index.php?module=jd_tickets&action=FCUBSAccService", "FCUBS Acc Service", "List", "jd_tickets");

