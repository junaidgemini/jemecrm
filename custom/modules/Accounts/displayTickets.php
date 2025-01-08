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

    <script>
        $(document).ready(function () {
            var table = $('#ticketsTable').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                ajax: {
                    url: 'index.php?module=Accounts&action=server&sugar_body_only=true',
                    type: 'GET',
                },
                columns: [
                    { data: 0, title: 'Ticket ID' },
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
                order: [[0, 'asc']], // Default sorting by Ticket ID column
                lengthMenu: [10, 20, 50], // Pagination options
                pageLength: 10, // Default rows per page
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
                    url: 'index.php?module=Accounts&action=freshdeskTickets', // Your PHP endpoint
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
