<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshdesk Tickets</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            margin: 0 auto;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        label {
            font-weight: bold;
            margin-right: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="number"] {
            padding: 8px;
            font-size: 16px;
            width: 100px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        button {
            padding: 8px 16px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        select {
            width: 100px;
            font-size: 16px;
        }

        .table-container {
            margin-top: 30px;
            overflow-x: auto;
        }

        #ticketsTable {
            border-collapse: collapse;
            width: 100%;
        }

        #ticketsTable th,
        #ticketsTable td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        #ticketsTable th {
            background-color: #f2f2f2;
        }

        .select2-container {
            width: 20% !important;
        }

        /* Hide dropdown by default */
        #columnSelectWrapper {
            display: none;
        }

        .column-select-btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .column-select-btn:hover {
            background-color: #45a049;
        }

        .column-select-btn i {
            font-size: 18px;
        }

        /* Align button and per-page select in a single row */
        .row-controls {
            display: flex;
            align-items: center;
            /* justify-content: space-between; */
            margin-bottom: 20px;
        }

        .select-wrapper {
            display: inline-block;
        }
        .dataTables_length {
            /* display: none !important; */
        }

    </style>
</head>
<body>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <div class="container">
        <h1>Freshdesk Tickets</h1>

        <!-- Row with column selection button and rows per page -->
        <div class="row-controls">
            <!-- Button to toggle the column select dropdown -->
            <button class="column-select-btn" id="toggleColumnSelectBtn">
                <i class="fa fa-columns"></i> <!-- Column icon (using Font Awesome) -->
            </button>
            <button class="column-select-btn" onclick="filterTicket()" id="toggleFilterBtn">
                <i class="fa fa-filter"></i> <!-- Column icon (using Font Awesome) -->
            </button>

            <!-- Rows per page dropdown -->
            <!-- <div class="select-wrapper">
                <label for="rowsPerPage">Rows per page:</label>
                <select id="rowsPerPage">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </select>
            </div> -->
        </div>

        <!-- Multi-Select Dropdown for Column Visibility -->
        <div id="columnSelectWrapper">
            <label for="columnVisibility">Select Columns to Display:</label>
            <select id="columnVisibility" multiple="multiple">
                <option value="0">Ticket ID</option>
                <option value="1">Subject</option>
                <option value="2">Type</option>
                <option value="3">Priority</option>
                <option value="4">Status</option>
                <option value="5">Created At</option>
                <option value="6">Updated At</option>
                <option value="7">Escalated</option>
                <option value="8">Due Date</option>
                <option value="9">Group ID</option>
                <option value="10">CC Email</option>
                <option value="11">Reply CC Email</option>
                <option value="12">Ticket CC Email</option>
                <option value="13">Ticket BCC Email</option>
                <option value="14">Forward Email</option>
                <option value="15">Support Email</option>
                <option value="16">To Email</option>
                <option value="17">Spam</option>
                <option value="18">Email Config ID</option>
                <option value="19">Requester ID</option>
                <option value="20">Source</option>
                <option value="21">Company ID</option>
                <option value="22">Association Type</option>
                <option value="23">Responder ID</option>
                <option value="24">Product ID</option>
                <option value="25">Associated Tickets Count</option>
                <option value="26">Tags</option>
                <option value="27">NR Due By</option>
                <option value="28">NR Escalated</option>
            </select>
        </div>

        <table id="ticketsTable" class="display" style="width:100%">
        </table>
    </div>


    <!-- Open Ticket Model -->
        <div class="modal" id="ticketModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ticket Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span >&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <h3>Ticket Details</h3>
                        </div>
                        
                        <!-- Ticket details will be loaded here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters Form -->
        <div class="modal" id="filterModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Filter Tickets</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span >&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <h3>Filter Tickets</h3>
                        </div>
                        
                        <!-- all Filters Fields -->
                        <div class="container">
                        <form>
                            <!-- Basic Ticket Info -->
                            <!-- <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="ticket_id"><strong>Ticket ID:</strong></label>
                                    <input type="text" id="filter_ticket_id" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="subject"><strong>Subject:</strong></label>
                                    <input type="text" id="filter_subject" class="form-control">
                                </div>
                            </div> -->

                            <!-- Status and Priority -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="status"><strong>Status:</strong></label>
                                    <!-- <input type="text" id="filter_status" class="form-control"> -->
                                    <select name="filter_status" id="filter_status" multiple="multiple">
                                        <option value="">-Select-</option>
                                        <option value="2">open</option>
                                        <option value="3">Pending</option>
                                        <option value="4">Resolved</option>
                                        <option value="5">Closed</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="priority"><strong>Priority:</strong></label>
                                    <!-- <input type="text" id="filter_priority" class="form-control"> -->
                                    <select name="filter_priority" id="filter_priority" multiple="multiple">
                                        <option value="">-Select-</option>
                                        <option value="1">Low</option>
                                        <option value="2">Medium</option>
                                        <option value="3">High</option>
                                        <option value="4">Urgent</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Requester and Responder -->
                            <!-- <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="responder_id"><strong>Responder ID:</strong></label>
                                    <input type="text" id="filter_responder_id" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="requester_id"><strong>Requester ID:</strong></label>
                                    <input type="text" id="filter_requester_id" class="form-control">
                                </div>
                            </div> -->
                            <!-- Group ID and priority -->

                            <div class="row mb-3">
                                
                                <div class="col-md-6">
                                    <label for="group_id"><strong>Group ID:</strong></label>
                                    <input type="text" id="filter_group_id" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label for="priority"><strong>Type:</strong></label>
                                    <br/>
                                    <select name="filter_type" id="filter_type">
                                        <option value="">-Select-</option>
                                        <option value="Enquiries">Enquiries</option>
                                        <option value="Requests">Requests</option>
                                        <!-- <option value="Complaints/Issues">Complaints/Issues</option> -->
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Description -->
                            <!-- <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="description"><strong>Description:</strong></label>
                                    <textarea id="filter_description" class="form-control" rows="3"></textarea>
                                </div>
                            </div> -->

                            <!-- CC and To Emails -->
                            <!-- <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="cc_emails"><strong>CC Emails:</strong></label>
                                    <input type="text" id="filter_cc_emails" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="to_emails"><strong>To Emails:</strong></label>
                                    <input type="text" id="filter_to_emails" class="form-control">
                                </div>
                            </div> -->

                            <!-- Reply CC Emails and Ticket CC Emails -->
                            <!-- <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="reply_cc_emails"><strong>Reply CC Emails:</strong></label>
                                    <input type="text" id="filter_reply_cc_emails" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="ticket_cc_emails"><strong>Ticket CC Emails:</strong></label>
                                    <input type="text" id="filter_ticket_cc_emails" class="form-control">
                                </div>
                            </div> -->

                            <!-- Email Config and Source -->
                            <!-- <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email_config_id"><strong>Email Config ID:</strong></label>
                                    <input type="text" id="filter_email_config_id" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="source"><strong>Source:</strong></label>
                                    <input type="text" id="filter_source" class="form-control">
                                </div>
                            </div> -->

                            <!-- Due Date -->
                            <!-- <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="due_by"><strong>Due By:</strong></label>
                                    <input type="text" id="filter_due_by" class="form-control">
                                </div>
                            </div> -->

                            <!-- Created and Updated At -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="created_at"><strong>Created At:</strong></label>
                                    <input type="date" id="filter_created_at" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="updated_at"><strong>Updated At:</strong></label>
                                    <input type="date" id="filter_updated_at" class="form-control">
                                </div>
                            </div>

                            <!-- Source Additional Info -->
                            <!-- <div class="row mb-3">
                                <div class="col-md-12">
                                    <label><strong>Source Additional Info:</strong></label>
                                    <div class="border p-3">
                                            <div class="mb-2">
                                                <label for="facebook_id"><strong>Facebook ID:</strong></label>
                                                <input type="text" id="filter_facebook_id" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <label for="facebook_type"><strong>Type:</strong></label>
                                                <input type="text" id="filter_facebook_type" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <label for="facebook_page_name"><strong>Page Name:</strong></label>
                                                <input type="text" id="filter_facebook_page_name" class="form-control">
                                            </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input type="reset" onClick="window.location.reload()">
                                </div>
                            </div>
                        </form>
                    </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary apply_filter_btn" onclick="ApplyFilterBtn()"> Apply </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


    <script>
        function ApplyFilterBtn(){
            debugger;
            $('#filterModal').modal('hide');
            // var filter_ticket_id = $('#filter_ticket_id').val();
            // var filter_subject = $('#filter_subject').val();
            var filter_status = $('#filter_status').val();
            var filter_priority = $('#filter_priority').val();
            var filter_type = $('#filter_type').val();
            // var filter_responder_id = $('#filter_responder_id').val();
            // var filter_requester_id = $('#filter_requester_id').val();
            
            // var filter_description = $('#filter_description').val();
            // var filter_cc_emails = $('#filter_cc_emails').val();
            // var filter_to_emails = $('#filter_to_emails').val();
            // var filter_reply_cc_emails = $('#filter_reply_cc_emails').val();
            // var filter_ticket_cc_emails = $('#filter_ticket_cc_emails').val();
            // var filter_email_config_id = $('#filter_email_config_id').val();
            // var filter_source = $('#filter_source').val();
            // var filter_due_by = $('#filter_due_by').val();
            var filter_created_at = $('#filter_created_at').val();
            var filter_updated_at = $('#filter_updated_at').val();
            // var filter_facebook_id = $('#filter_facebook_id').val();
            // var filter_facebook_type = $('#filter_facebook_type').val();
            // var filter_facebook_page_name = $('#filter_facebook_page_name').val();
            // var filter_facebook_page_link = $('#filter_facebook_page_link').val();
            // var filter_association_type = $('#filter_association_type').val();
            // var filter_product_id = $('#filter_product_id').val();
            // var filter_associated_tickets_count = $('#filter_associated_tickets_count').val();
            // var filter_tags = $('#filter_tags').val();
            // var filter_nr_due_by = $('#filter_nr_due_by').val();
            // var filter_nr_escalated = $('#filter_nr_escalated').val();
            // var filter_spam = $('#filter_spam').val();
            // var filter_fr_escalated = $('#filter_fr_escalated').val();
            // var filter_fr_due_by = $('#filter_fr_due_by').val();
            var filter_group_id = $('#filter_group_id').val();
            // var filter_fwd_emails = $('#filter_fwd_emails').val();
            // var filter_ticket_bcc_emails = $('#filter_ticket_bcc_emails').val();
            // var filter_support_email = $('#filter_support_email').val();
            // var filter_association_type = $('#filter_association_type').val();
            // var filter_product_id = $('#filter_product_id').val();
            // f_id = filter_ticket_id;
            // f_subject = filter_subject;
            gf_type  = filter_type;
            gf_priority  = filter_priority;
            gf_status    = filter_status;
            gfilter_c = 'true';
            gf_created_at    = filter_created_at;
            gf_updated_at    = filter_updated_at;
            // gf_responder_id = filter_responder_id;
            // gf_requester_id  = filter_requester_id;
            // f_fr_escalated    = filter_fr_escalated;
            // f_fr_due_by    = filter_fr_due_by;
            gf_group_id  = filter_group_id;
            // f_cc_emails     = filter_cc_emails;
            // f_reply_cc_emails   = filter_reply_cc_emails;
            // f_ticket_cc_emails  = filter_ticket_cc_emails;
            // f_ticket_bcc_emails = filter_ticket_bcc_emails;
            // f_fwd_emails    = filter_fwd_emails;
            // f_to_emails     = filter_to_emails;
            // f_spam  = filter_spam;
            // f_email_config_id    = filter_email_config_id;
            // f_source    = filter_source;
            // f_company_id    = filter_company_id;
            // f_association_type  = filter_association_type;
            // f_product_id    = filter_product_id;
            // f_associated_tickets_count   = filter_associated_tickets_count;
            // f_tags  = filter_tags;
            // f_nr_due_by    = filter_nr_due_by;
            // f_nr_escalated  = filter_nr_escalated;
            
            var table = $('#ticketsTable').DataTable();
            // table.clear().draw();
			table.ajax.reload(null,false);
        };
         function filterTicket(){
            $('#filterModal').modal('show');
        };
        function jd_formatDateTime(date) {
            const NewDate = new Date(date);
            const formattedDate = NewDate.toDateString();
            const formattedTime = NewDate.toLocaleTimeString();
            return `${formattedDate} ${formattedTime}`;
        }
        function viewTicket(ticketId){
            let ViewUrl = 'index.php?module=jd_tickets&action=viewTicket&ticket_id='+ticketId+'&sugar_body_only=true';
            console.log(ViewUrl);
            const priorityMap = {
                    1: "Low",
                    2: "Medium",
                    3: "High",
                    4: "Urgent"
                };

                const statusMap = {
                    2: "Open",
                    3: "Pending",
                    4: "Resolved",
                    5: "Closed",
                };
                const sourceMap = { 1: 'Email', 2: 'Portal', 3: 'Phone', 7: 'Chat', 9:'Feedback Widget',10:'Outbound Email' };
                
            $.ajax({
                url: ViewUrl,
                method: 'GET',
                success: function (data) {
                    var data = JSON.parse(data);
                    // Priority and Status Mappings

                    let body_content = `
                    <div class="container">
                        <form>
                            <!-- Basic Ticket Info -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="ticket_id"><strong>Ticket ID:</strong></label>
                                    <input type="text" id="ticket_id" class="form-control" value="${data.id}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="subject"><strong>Subject:</strong></label>
                                    <input type="text" id="subject" class="form-control" value="${data.subject}" readonly>
                                </div>
                            </div>

                            <!-- Status and Priority -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="status"><strong>Status:</strong></label>
                                    <input type="text" id="status" class="form-control" value="${statusMap[data.status] || "UnResolved"}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="priority"><strong>Priority:</strong></label>
                                    <input type="text" id="priority" class="form-control" value="${priorityMap[data.priority] || "Unknown"}" readonly>
                                </div>
                            </div>

                            <!-- Requester and Responder -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="requester_id"><strong>Requester ID:</strong></label>
                                    <input type="text" id="requester_id" class="form-control" value="${data.requester_id}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="responder_id"><strong>Responder ID:</strong></label>
                                    <input type="text" id="responder_id" class="form-control" value="${data.responder_id}" readonly>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="description"><strong>Description:</strong></label>
                                    <textarea id="description" class="form-control" rows="3" readonly>${data.description_text}</textarea>
                                </div>
                            </div>

                            <!-- CC and To Emails -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="cc_emails"><strong>CC Emails:</strong></label>
                                    <input type="text" id="cc_emails" class="form-control" value="${ (data.cc_emails!= null) ? data.cc_emails.join(', '): '' || 'N/A'}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="to_emails"><strong>To Emails:</strong></label>
                                    <input type="text" id="to_emails" class="form-control" readonly  value="${(data.to_emails!= null) ? data.to_emails.join(', '): '' || 'N/A'} ">
                                </div>
                            </div>

                            <!-- Reply CC Emails and Ticket CC Emails -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="reply_cc_emails"><strong>Reply CC Emails:</strong></label>
                                    <input type="text" id="reply_cc_emails" class="form-control" value="${ (data.reply_cc_emails!= null) ? data.reply_cc_emails.join(', '): '' || 'N/A'}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="ticket_cc_emails"><strong>Ticket CC Emails:</strong></label>
                                    <input type="text" id="ticket_cc_emails" class="form-control" value="${(data.ticket_cc_emails!= null) ? data.ticket_cc_emails.join(', '): '' || 'N/A'}" readonly>
                                </div>
                            </div>

                            <!-- Email Config and Source -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email_config_id"><strong>Email Config ID:</strong></label>
                                    <input type="text" id="email_config_id" class="form-control" value="${(data.email_config_id!= null) ? data.email_config_id: '' || 'N/A'}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="source"><strong>Source:</strong></label>
                                    <input type="text" id="source" class="form-control" value="${sourceMap[data.source] || "Other"}" readonly>
                                </div>
                            </div>

                            <!-- Due Date -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="due_by"><strong>Due By:</strong></label>
                                    <input type="text" id="due_by" class="form-control" value="${jd_formatDateTime(data.due_by)}" readonly>
                                </div>
                            </div>

                            <!-- Created and Updated At -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="created_at"><strong>Created At:</strong></label>
                                    <input type="text" id="created_at" class="form-control" value="${ jd_formatDateTime(data.created_at)}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="updated_at"><strong>Updated At:</strong></label>
                                    <input type="text" id="updated_at" class="form-control" value="${ jd_formatDateTime(data.updated_at)}" readonly>
                                </div>
                            </div>

                            <!-- Source Additional Info -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label><strong>Source Additional Info:</strong></label>
                                    <div class="border p-3">
                                        ${data.source_additional_info && data.source_additional_info.facebook ? `
                                            <div class="mb-2">
                                                <label for="facebook_id"><strong>Facebook ID:</strong></label>
                                                <input type="text" id="facebook_id" class="form-control" value="${data.source_additional_info.facebook.id || 'N/A'}" readonly>
                                            </div>
                                            <div class="mb-2">
                                                <label for="facebook_type"><strong>Type:</strong></label>
                                                <input type="text" id="facebook_type" class="form-control" value="${data.source_additional_info.facebook.type || 'N/A'}" readonly>
                                            </div>
                                            <div class="mb-2">
                                                <label for="facebook_page_name"><strong>Page Name:</strong></label>
                                                <input type="text" id="facebook_page_name" class="form-control" value="${data.source_additional_info.facebook.page.name || 'N/A'}" readonly>
                                            </div>
                                            <div class="mb-2">
                                                <label for="facebook_page_link"><strong>Page Link:</strong></label>
                                                <a href="${data.source_additional_info.facebook.page.link}" target="_blank" class="form-control text-primary" readonly>${data.source_additional_info.facebook.page.link || 'N/A'}</a>
                                            </div>
                                        ` : `<p>No additional Facebook info available.</p>`}
                                    </div>
                                </div>
                            </div>
                            <!-- Custom Fields -->
                            <div class="col-md-6">
                                <label for="custom_fields"><strong>Custom Fields:</strong></label>
                                <div class="border p-3">
                                    ${Object.keys(data.custom_fields).map(field => `
                                        <div class="mb-2">
                                            <label><strong>${field}:</strong></label>
                                            <input type="text" class="form-control" value="${data.custom_fields[field] || 'N/A'}" readonly>
                                        </div>
                                    `).join('')}
                                </div>
                            </div>
                        </form>
                    </div>`;
                    $('#ticketModal .modal-body').html(body_content);
                    $('#ticketModal').modal('show');
                }
            });
        }
       
        function jd_dataTable(filter_c,filter_status,filter_priority,group_id,filter_type,filter_created_at,filter_updated_at,filter_responder_id,filter_requester_id){
            debugger;
            gfilter_c = filter_c;
            gf_status = filter_status;
            gf_priority = filter_priority;
            gf_group_id = group_id;
            gf_type = filter_type;
            gf_created_at = filter_created_at;
            gf_updated_at = filter_updated_at;
            // gf_responder_id = filter_responder_id;
            // gf_requester_id = filter_requester_id;
            table = $('#ticketsTable').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                paging: true,
                order: [[0, 'asc']], // Default sorting by Ticket ID column
                lengthMenu: [30, 50], // Pagination options
                pageLength: 30, // Default rows per page
                ajax: {
                    url: 'index.php?module=jd_tickets&action=server&sugar_body_only=true',
                    type: 'GET',
                    dataSrc: 'data',
                    data: function(data) {
                        data.filter_c = gfilter_c;
                        data.status = gf_status;
                        data.priority = gf_priority;
                        data.group_id = gf_group_id;
                        data.type = gf_type;
                        data.created_at = gf_created_at;
                        data.updated_at = gf_updated_at;
                        // data.responder_id = gf_responder_id;
                        // data.requester_id = gf_requester_id;
                        debugger;
                    },
                    error: function(xhr, error, thrown) {
                        console.error('AJAX error:', error, thrown);
                        alert('Failed to fetch data');
                    },
                },
                columns: [
                    {
                        "mData": null,
                        title: "ID",
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return '<button onclick="viewTicket('+data['id']+')">View</button>'+data['id'];
                        },
                    },
                    {
                        "mData": null,
                        title: "Subject",
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['subject'];
                        },
                    },
                    {
                        "mData": null,
                        title: "Type",
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            // const statusMap = { 2: 'Open', 3: 'Pending', 4: 'Resolved', 5: 'Closed', };
                            return data['type'];
                        },
                     },
                     {
                        "mData": null,
                        title: "Priority",
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            const priorityMap = { 1: 'Low', 2: 'Medium', 3: 'High', 4: 'Urgent' };
                            return priorityMap[data['priority']] || 'Unknown';
                        },
                     },
                    {
                        "mData": null,
                        title: "Status",
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            const statusMap = { 2: 'Open', 3: 'Pending', 4: 'Resolved', 5: 'Closed', };
                            return statusMap[data['status']] || 'unresolved';
                        },
                     },
                     
                    { 
                        "mData": null,
                        title: 'Created At',
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            // var date_created = new Date(data['created_at']).toDateString();
                            // var date_created_string = new Date(data['created_at']).toLocaleString();
                            // var date_created_time = date_created_string.split(' ');
                            // return date_created+' '+date_created_time['1'];
                            return jd_formatDateTime(data['created_at']);
                            // return new Date(data['created_at']).toDateString();
                        },
                    },
                    { 
                        "mData": null,
                        title: 'Updated At',
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            // return new Date(data['updated_at']).toDateString();
                            // var date_updated = new Date(data['created_at']).toDateString();
                            // var date_updated_string = new Date(data['created_at']).toLocaleString();
                            // var date_updated_time = date_updated_string.split(' ');
                            // return date_updated+' '+date_updated_time['1'];
                            return jd_formatDateTime(data['updated_at']);

                        },
                    },
                    {   
                        "mData": null,
                        title: 'Escalated',
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['fr_escalated'];
                        },
                     },
                    {
                        "mData": null,
                        title: 'Due Date',
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            // return new Date(data['fr_due_by']).toDateString();
                            // var fr_due_by_d = new Date(data['fr_due_by']).toDateString();
                            // var fr_due_by_string = new Date(data['fr_due_by']).toLocaleString();
                            // var fr_due_by_time = fr_due_by_string.split(' ');
                            // return fr_due_by_d+' '+fr_due_by_time['1'];
                            return jd_formatDateTime(data['fr_due_by']);

                        },
                    },
                    { 
                        "mData": null,
                        title: 'Group ID',
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['group_id'];
                        },
                    },
                    { 
                        "mData": null,
                        title: 'CC Email',
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['cc_emails'];
                        },

                    },
                    { 
                        "mData": null,
                        title: 'Reply CC Email',
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['reply_cc_emails'];
                        },
                    },
                    {
                        title: 'Ticket CC Email',
                        "mData": null,
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['ticket_cc_emails'];
                        },
                    },
                    { 
                        title: 'Ticket BCC Email',
                        "mData": null,
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['ticket_bcc_emails'];
                        },
                    },
                    { 
                        title: 'forward Email',
                        "mData": null,
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['fwd_emails'];
                        },
                    },
                    {
                        "mData": null,
                        title: 'Support Email',
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['support_email'];
                        },
                    },
                    { 
                        title: 'To Email',
                        "mData": null,
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['to_emails'];
                        },
                    },
                    { 
                        title: 'Spam',
                        "mData": null,
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['spam'];
                        },
                    },
                    { 
                        title: 'email Config Id',
                        "mData": null,
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['email_config_id'];
                        },
                    },
                    { 
                        title: 'Requester ID',
                        "mData": null,
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['requester_id'];
                        },
                    },
                    { 
                        title: 'Source',
                        "mData": null,
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            const sourceMap = { 1: 'Email', 2: 'Portal', 3: 'Phone', 7: 'Chat', 9:'Feedback Widget',10:'Outbound Email' };
                            return sourceMap[data['source']] || 'Other';
                        },
                    },
                    { 
                        title: 'Company ID',
                        "mData": null,
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['company_id'];
                        },
                    },
                    { 
                        title: 'Association Type',
                        "mData": null,
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['association_type'];
                        },
                    },
                    {
                        title: 'Responder ID',
                        "mData": null,
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['responder_id'];
                        },
                    },
                    { 
                        title: 'Product ID',
                        "mData": null,
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['product_id'];
                        },
                    },
                    { 
                        title: 'Associated Tickets Count',
                        "mData": null,
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['associated_tickets_count'];
                        },
                    },
                    { 
                        title: 'Tags',
                        "mData": null,
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['tags'];
                        },
                    },
                    { 
                        title: 'NR Due By',
                        "mData": null,
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['nr_due_by'];
                        },
                    },
                    { 
                        title: 'NR Escalated',
                        "mData": null,
                        className: 'py-rem font-black',
                        mRender: function (data, type, full) {
                            return data['nr_escalated'];
                        },
                    },
                ],
            });
        }
        $(document).ready(function () {
            // on load run the function to load all data.
            jd_dataTable();
            // Initialize the multi-select dropdown
            $('#columnVisibility').select2({
                placeholder: "Select columns to display"
            });

            // Toggle the dropdown visibility when the button is clicked
            $('#toggleColumnSelectBtn').on('click', function () {
                $('#columnSelectWrapper').toggle();
            });

            // Handle column visibility toggling
            $('#columnVisibility').on('change', function () {
                var selectedColumns = $(this).val();
                
                // Show only selected columns
                table.columns().every(function (index) {
                    var column = this;
                    if (selectedColumns.includes(index.toString())) {
                        column.visible(true);
                    } else {
                        column.visible(false);
                    }
                });
            });

            // Set default visibility for the first few columns
            $('#columnVisibility').val([0, 1, 2]);  // Show columns: Ticket ID, Subject, and Type by default
            $('#columnVisibility').trigger('change');

            // Close dropdown if clicked outside
            $(document).on('click', function (event) {
                if (!$(event.target).closest('#columnSelectWrapper').length && !$(event.target).closest('#toggleColumnSelectBtn').length) {
                    $('#columnSelectWrapper').hide();
                }
            });

            // Handle rows per page change
            // $('#rowsPerPage').on('change', function() {
            //     var pageLength = parseInt($(this).val());
            //     table.page.len(pageLength).draw();
            //     debugger;
            // });
        });

        function toggleColumn(tableId, columnIndex, show) {
            // Get the DataTable instance by table ID
            var table = $('#' + tableId).DataTable();

            // Toggle visibility of the column
            table.column(columnIndex).visible(show);
        }

    </script>
</body>
</html>