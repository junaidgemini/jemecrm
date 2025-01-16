
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts Query</title>
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
        <h2>Account Query</h2>
        <form id="accountForm">
            <label for="AccNo">Account Number (AccNo):</label>
            <input type="text" id="AccNo" name="AccNo" required>
            <button type="submit">Submit</button>
        </form>
        <!-- show details -->
        <h2>Account Information</h2>
        <form id="dynamicForm">
            <!-- Input fields will be dynamically added here -->
        </form>
    </div>
    <script>
        $(document).ready(function(){
            // document.getElementById("myReadonlyInput").setAttribute("readonly", "true");
            $("#accountForm").on("submit", function(event) {
            event.preventDefault();

            const submitButton = $(this).find('button[type="submit"]');
            
            // Add a loader to the submit button
            submitButton.prop("disabled", true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
            
            $.ajax({
                url: "index.php?module=jd_tickets&action=FCUBSAccServiceProcess&sugar_body_only=true",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {

                    // Parse XML string into a DOM object
                    const parser = new DOMParser();
                    const xmlDoc = parser.parseFromString(response, "text/xml");

                    // Function to extract data dynamically, including nested elements
                    function extractData(xml, parentNode) {
                        const parentElement = xml.querySelector(parentNode);

                        if (!parentElement) {
                            console.log(`${parentNode} element not found`);
                            return {};
                        }

                        const data = {};

                        // Recursive function to process nested elements
                        function processElement(element, prefix = "") {
                            element.childNodes.forEach((child) => {
                                if (child.nodeType === 1) { // Element node
                                    const key = prefix ? `${prefix}_${child.tagName}` : child.tagName;

                                    if (child.tagName === "UDFDETAILS") {
                                        // Special handling for UDFDETAILS
                                        const fldName = child.querySelector("FLDNAM")?.textContent.trim();
                                        const fldVal = child.querySelector("FLDVAL")?.textContent.trim();
                                        if (fldName) {
                                            data[fldName] = fldVal || "N/A";
                                        }
                                    } else if (child.children.length > 0) {
                                        // If the child has its own children, recurse
                                        processElement(child, key);
                                    } else {
                                        // Otherwise, it's a leaf node; save the text content
                                        data[key] = child.textContent.trim();
                                    }
                                }
                            });
                        }

                        processElement(parentElement);

                        return data;
                    }

                    // Function to render dynamic input fields on the front end
                    function renderDynamicFields(data) {
                        const form = document.getElementById("dynamicForm");
                        form.innerHTML = ""; // Clear previous form fields

                        Object.entries(data).forEach(([key, value]) => {
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
                        });
                    }

                    // Example usage
                    const customerData = extractData(
                        xmlDoc,
                        "QUERYCUSTACC_IOFS_RES > FCUBS_BODY > Cust-Account-Full"
                    );

                    // Render fields dynamically
                    renderDynamicFields(customerData);



                    // response = JSON.parse(response);

                    // const form = document.getElementById("dynamicForm");
                    // form.innerHTML = ""; // Clear previous form fields

                    // for (const [key, value] of Object.entries(response)) {
                    //     // Create a container for the label and input
                    //     const formGroup = document.createElement("div");
                    //     formGroup.classList.add("form-group");

                    //     // Create a label
                    //     const label = document.createElement("label");
                    //     label.textContent = key.replace(/_/g, " "); // Replace underscores with spaces for readability
                    //     label.setAttribute("for", key);

                    //     // Create an input
                    //     const input = document.createElement("input");
                    //     input.type = "text";
                    //     input.id = key;
                    //     input.name = key;
                    //     input.value = value;
                    //     input.setAttribute("readonly", true); // Make the input non-editable

                    //     // Append label and input to the container
                    //     formGroup.appendChild(label);
                    //     formGroup.appendChild(input);

                    //     // Append the container to the form
                    //     form.appendChild(formGroup);
                    // }

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