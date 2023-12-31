<!DOCTYPE html>
<html>
<head>
    <title>Your Page Title</title>
    <style>
        /* Reset some default styles */
        body, h1, h2, p {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Style for the container */
        .data-container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Style for the header */
        .data-header {
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            padding: 10px;
            border-radius: 5px 5px 0 0;
        }

        /* Style for individual data items */
        .data-item {
            margin-bottom: 10px;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        /* Style for labels */
        .label {
            font-weight: bold;
            color: #333;
        }

        /* Style for data values */
        .value {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="data-container">
        <div class="data-header">
            <h2> Recept </h2>
        </div>
        <?php
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "rohit";

        // Create a connection to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to retrieve the most recent booking record
        $sql = "SELECT * FROM rental_records ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch the data for the most recent booking
            $row = $result->fetch_assoc();

            // Print the data
            echo '<div class="data-item"><span class="label">Full Name:</span> <span class="value">' . $row["fullname"] . '</span></div>';
            echo '<div class="data-item"><span class="label">Address:</span> <span class="value">' . $row["address"] . '</span></div>';
            echo '<div class="data-item"><span class="label">Phone:</span> <span class="value">' . $row["phone"] . '</span></div>';
            echo '<div class="data-item"><span class="label">Email:</span> <span class="value">' . $row["email"] . '</span></div>';
            echo '<div class="data-item"><span class="label">Start Date:</span> <span class="value">' . $row["startdate"] . '</span></div>';
            echo '<div class="data-item"><span class="label">End Date:</span> <span class="value">' . $row["enddate"] . '</span></div>';
            echo '<div class="data-item"><span class="label">Pickup Location:</span> <span class="value">' . $row["pickupLocation"] . '</span></div>';
            echo '<div class="data-item"><span class="label">Return Location:</span> <span class="value">' . $row["returnLocation"] . '</span></div>';
            echo '<div class="data-item"><span class="label">Distance:</span> <span class="value">' . $row["distance"] . '</span></div>';
            echo '<div class="data-item"><span class="label">Selected Vehicle Model:</span> <span class="value">' . $row["vehicleModel"] . '</span></div>';
            echo '<div class="data-item"><span class="label">Total Cost:</span> <span class="value">' . $row["totalCost"] . '</span></div>';
        } else {
            echo "No recent records found.";
        }

        // Close the database connection
        $conn->close();
        ?>
        <button id="printButton">Print Bill</button>
    </div>

    <script>
            // Automatically trigger the print dialog when the page loads
            window.onload = function() {
                window.print();
            };
        </script>

</body>
</html>