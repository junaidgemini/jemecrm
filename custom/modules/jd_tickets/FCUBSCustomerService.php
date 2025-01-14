<!-- <!DOCTYPE html>
index.php?module=jd_tickets&action=FCUBSCustomerServiceProcess&sugar_body_only=true
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Query</title>
</head>
<body>
    <form action="index.php?module=jd_tickets&action=XmlFeedProcess&sugar_body_only=true" method="post">
        <label for="source">Source:</label>
        <input type="text" id="source" name="source" required><br><br>
        
        <label for="ub_comp">UBSCOMP:</label>
        <input type="text" id="ub_comp" name="ub_comp" required><br><br>
        
        <label for="userid">User ID:</label>
        <input type="text" id="userid" name="userid" required><br><br>
        
        <label for="branch">Branch:</label>
        <input type="text" id="branch" name="branch" required><br><br>
        
        <label for="custno">Customer Number:</label>
        <input type="text" id="custno" name="custno" required><br><br>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Query</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            /* display: flex; */
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            color: #333333;
        }
        label {
            display: block;
            margin-top: 10px;
            color: #333333;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
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
            <label for="source">Source:</label>
            <input type="text" id="source" name="source" required>
            
            <label for="ub_comp">UBSCOMP:</label>
            <input type="text" id="ub_comp" name="ub_comp" required>
            
            <label for="userid">User ID:</label>
            <input type="text" id="userid" name="userid" required>
            
            <label for="branch">Branch:</label>
            <input type="text" id="branch" name="branch" required>
            
            <label for="custno">Customer Number:</label>
            <input type="text" id="custno" name="custno" required>
            
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $("#customerForm").on("submit", function(event){
                event.preventDefault();
                
                $.ajax({
                    url: "index.php?module=jd_tickets&action=FCUBSCustomerServiceProcess&sugar_body_only=true",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(response){
                        if (response.status === "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message,
                            });
                            $("#customerForm")[0].reset();  // Reset the form
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr, status, error){
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: "Error: " + error,
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>