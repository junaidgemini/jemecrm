
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Query</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* dynamic form */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            text-align: center;
        }
        form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 15px;
            align-items: start;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        input {
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }       
        button {
            width: 100%;
            padding: 10px;
            /* margin-top: 20px; */
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Customer Query</h2>
        <form id="customerForm">
            <label for="custno">Customer Number (CUSTNO):</label>
            <input type="text" id="custno" name="custno" required>
            <button type="submit">Submit</button>
        </form>
        <!-- show details -->
        <h2>Customer Information</h2>
        <form id="dynamicForm">
            <!-- Input fields will be dynamically added here -->
        </form>
    </div>
    <script>
        $(document).ready(function(){
            // document.getElementById("myReadonlyInput").setAttribute("readonly", "true");
            $("#customerForm").on("submit", function(event) {
            event.preventDefault();

            const submitButton = $(this).find('button[type="submit"]');
            
            // Add a loader to the submit button
            submitButton.prop("disabled", true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
            
            $.ajax({
                url: "index.php?module=jd_tickets&action=FCUBSCustomerServiceProcess&sugar_body_only=true",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    response = JSON.parse(response);

                    const form = document.getElementById("dynamicForm");
                    form.innerHTML = ""; // Clear previous form fields

                    for (const [key, value] of Object.entries(response)) {
                        // Create a container for the label and input
                        const formGroup = document.createElement("div");
                        formGroup.classList.add("form-group");

                        // Create a label
                        const label = document.createElement("label");
                        label.textContent = key.replace(/_/g, " "); // Replace underscores with spaces for readability
                        label.setAttribute("for", key);

                        // Create an input
                        const input = document.createElement("input");
                        input.type = "text";
                        input.id = key;
                        input.name = key;
                        input.value = value;
                        input.setAttribute("readonly", true); // Make the input non-editable

                        // Append label and input to the container
                        formGroup.appendChild(label);
                        formGroup.appendChild(input);

                        // Append the container to the form
                        form.appendChild(formGroup);
                    }

                    // Restore the submit button
                    submitButton.prop("disabled", false).text("Submit");
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Error: " + error,
                    });

                    // Restore the submit button
                    submitButton.prop("disabled", false).text("Submit");
                }
            });
        });
    });
    </script>
</body>
</html>