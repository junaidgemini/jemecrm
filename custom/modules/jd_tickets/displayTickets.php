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
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .select-wrapper {
            display: inline-block;
        }
        .dataTables_length {
            display: none !important;
        }

    </style>
</head>
<body>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <div class="container">
        <h1>Freshdesk Tickets</h1>

        <!-- Row with column selection button and rows per page -->
        <div class="row-controls">
            <!-- Button to toggle the column select dropdown -->
            <button class="column-select-btn" id="toggleColumnSelectBtn">
                <i class="fa fa-columns"></i> <!-- Column icon (using Font Awesome) -->
            </button>

            <!-- Rows per page dropdown -->
            <div class="select-wrapper">
                <label for="rowsPerPage">Rows per page:</label>
                <select id="rowsPerPage">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </select>
            </div>
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
            <thead>
            </thead>
        </table>
    </div>


    <!-- Open Ticket Model -->
        <div class="modal" id="ticketModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ticket Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
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


    <script>
        function viewTicket(ticketId){
            let ViewUrl = 'index.php?module=jd_tickets&action=viewTicket&ticket_id='+ticketId+'&sugar_body_only=true';
            console.log(ViewUrl);
            $.ajax({
                url: ViewUrl,
                method: 'GET',
                success: function (data) {
                    var data = JSON.parse(data);
                    // body_content = `<div class="row">
                    //     <div class="col-md-6">
                    //         <label for="ticket_id">Ticket ID:</label>
                    //         <span id="ticket_id">${data.id}</span>
                    //     </div>
                    //     <div class="col-md-6">
                    //         <label for="subject">Subject:</label>
                    //         <span id="subject">${data.subject}</span>
                    //     </div>`;
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
                                    <input type="text" id="status" class="form-control" value="${data.status}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="priority"><strong>Priority:</strong></label>
                                    <input type="text" id="priority" class="form-control" value="${data.priority}" readonly>
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
                                    <input type="text" id="to_emails" class="form-control" value="${ (data.to_emails!= null) ? data.to_emails.join(', '): '' || 'N/A'}" readonly>
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
                                    <input type="text" id="source" class="form-control" value="${data.source || 'N/A'}" readonly>
                                </div>
                            </div>

                            <!-- Due Date -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="due_by"><strong>Due By:</strong></label>
                                    <input type="text" id="due_by" class="form-control" value="${new Date(data.due_by).toLocaleString()}" readonly>
                                </div>
                            </div>

                            <!-- Created and Updated At -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="created_at"><strong>Created At:</strong></label>
                                    <input type="text" id="created_at" class="form-control" value="${new Date(data.created_at).toLocaleString()}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="updated_at"><strong>Updated At:</strong></label>
                                    <input type="text" id="updated_at" class="form-control" value="${new Date(data.updated_at).toLocaleString()}" readonly>
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
        $(document).ready(function () {
            var table = $('#ticketsTable').DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                order: [[0, 'asc']], // Default sorting by Ticket ID column
                lengthMenu: [10, 20, 50], // Pagination options
                pageLength: 10, // Default rows per page
                ajax: {
                    url: 'index.php?module=jd_tickets&action=server&sugar_body_only=true',
                    type: 'GET',
                    dataSrc: function(json) {
                        debugger;
                        // Check if the server returned an error
                        if (json.error) {
                            alert('Error: ' + json.error);
                            return [];
                        }
                        // Return the data array from the response
                        return json.data;
                    },
                    error: function(xhr, error, thrown) {
                        console.error('AJAX error:', error, thrown);
                        alert('Failed to fetch data');
                    },
                },
                columns: [
                    { data: 0, title: 'Ticket ID',
                        render: function(data, type, row) {
                        return `<button onclick="viewTicket(${data})">View</button>`+data;
                    }
                     },
                    { data: 1, title: 'Subject' },
                    { data: 2, title: 'Type' },
                    { 
                        data: 3, 
                        title: 'Priority', 
                        render: function (data) {
                            const priorityMap = { 1: 'Low', 2: 'Medium', 3: 'High', 4: 'Urgent' };
                            return priorityMap[data] || 'Unknown';
                        }
                    },
                    { data: 4, title: 'Status',
                        render: function (data) {
                            const statusMap = { 2: 'Open', 3: 'Pending', 4: 'Resolved', 5: 'Closed', };
                            return statusMap[data] || 'unresolved';
                        }
                     },
                    { 
                        data: 5, 
                        title: 'Created At', 
                        render: function (data) {
                            return new Date(data).toLocaleString();
                        }
                    },
                    { 
                        data: 6, 
                        title: 'Updated At', 
                        render: function (data) {
                            return new Date(data).toLocaleString();
                        }
                    },
                    { data: 7, title: 'Escalated' },
                    { data: 8, title: 'Due Date' },
                    { data: 9, title: 'Group ID' },
                    { data: 10, title: 'CC Email'},
                    { data: 11, title: 'Reply CC Email'},
                    { data: 12, title: 'Ticket CC Email'},
                    { data: 13, title: 'Ticket BCC Email'},
                    { data: 14, title: 'forward Email'},
                    { data: 15, title: 'Support Email'},
                    { data: 16, title: 'To Email'},
                    { data: 17, title: 'Spam'},
                    { data: 18, title: 'email Config Id'},
                    { data: 19, title: 'Requester ID'},
                    { data: 20, title: 'Source'},
                    { data: 21, title: 'Company ID'},
                    { data: 22, title: 'Association Type'},
                    { data: 23, title: 'Responder ID'},
                    { data: 24, title: 'Product ID'},
                    { data: 25, title: 'Associated Tickets Count'},
                    { data: 26, title: 'Tags'},
                    { data: 27, title: 'NR Due By'},
                    { data: 28, title: 'NR Escalated'},
                ],
            });

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
            $('#columnVisibility').val([0, 1, 2,10,11]);  // Show columns: Ticket ID, Subject, and Type by default
            $('#columnVisibility').trigger('change');

            // Close dropdown if clicked outside
            $(document).on('click', function (event) {
                if (!$(event.target).closest('#columnSelectWrapper').length && !$(event.target).closest('#toggleColumnSelectBtn').length) {
                    $('#columnSelectWrapper').hide();
                }
            });

            // Handle rows per page change
            $('#rowsPerPage').on('change', function() {
                var pageLength = parseInt($(this).val());
                table.page.len(pageLength).draw();
            });
        });
    </script>
</body>
</html>
<?php
die;

?>
<title>Freshdesk Tickets</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <h1>Freshdesk Tickets</h1>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<body>
    <table id="ticketsTable" class="display" style="width:100%">
        <thead>
            <!-- <tr>
                <th>Ticket ID</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Priority</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr> -->
        </thead>
        <tbody>
            <!-- Data will be dynamically populated -->
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     $('#ticketsTable').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         ajax: {
        //             url: 'index.php?entryPoint=freshdeskTickets',
        //             type: 'GET'
        //         },
        //         columns: [
        //             { title: "ID" },
        //             { title: "Subject" },
        //             { title: "Status" },
        //             { title: "Priority" }
        //         ]
        //     });
        // });
        $(document).ready(function () {
            $('#ticketsTable').DataTable({
                ajax: {
                    url: 'index.php?module=jd_tickets&action=freshdeskTickets', // Your PHP endpoint
                    dataSrc: ''
                },
                columns: [
                    { data: 'id', title: 'Ticket ID', "orderable": true },
                    { data: 'subject', title: 'Subject' },
                    { 
                        data: 'status',
                        title: 'Status',
                        render: function (data) {
                            const statusMap = { 2: 'Open', 5: 'Resolved' };
                            return statusMap[data] || 'Unknown';
                        }
                    },
                    { 
                        data: 'priority',
                        title: 'Priority',
                        render: function (data) {
                            const priorityMap = { 1: 'Low', 2: 'Medium', 3: 'High', 4: 'Urgent' };
                            return priorityMap[data] || 'Unknown';
                        }
                    },
                    { 
                        data: 'created_at',
                        title: 'Created At',
                        render: function (data) {
                            return new Date(data).toLocaleString();
                        }
                    },
                    { 
                        data: 'updated_at',
                        title: 'Updated At',
                        render: function (data) {
                            return new Date(data).toLocaleString();
                        }
                    }
                ]
            });
            
        });

    </script>
