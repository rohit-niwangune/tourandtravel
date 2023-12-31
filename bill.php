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

// Retrieve the latest rental record from the database
$sql = "SELECT * FROM rental_records ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // You can access the data from the $row array and display it in your bill template
    $fullname = $row["fullname"];
    $address = $row["address"];
    $phone = $row["phone"];
    $email = $row["email"];
    $startdate = $row["startdate"];
    $enddate = $row["enddate"];
    $pickupLocation = $row["pickupLocation"];
    $returnLocation = $row["returnLocation"];
    $distance = $row["distance"];
    $selectedVehicleModel = $row["vehicleModel"];
    $totalCost = $row["totalCost"];
} else {
    echo "No rental records found.";
}


// Close the database connection
$conn->close();
echo "<script>localStorage.setItem('totalCost', $totalCost);</script>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bill.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Bill</title>
    <style>
 /* Style the bill container */
.bill-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0px 0px 10px #888888;
    border: 2px solid #007bff; /* Add a border */
    border-radius: 10px; /* Rounded corners for a nice effect */
}

.bill-container h1 {
    text-align: center;
    font-size: 24px;
    color: #333333;
    margin-bottom: 20px;
}

/* Style the bill details */
.order p {
    font-size: 18px;
    margin: 10px 0;
}

/* Style the "Proceed to Pay" button */
.proceed-to-pay {
    text-align: center;
    margin-top: 20px;
}

.proceed-button {
    background-color: #008CBA;
    color: #ffffff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.proceed-button:hover {
    background-color: #005f7f;
}

        </style>
</head>
<body>
    <div class="bill-container">
<h1>Booking Details</h1>
    <div class="order">
    <p><strong>Full Name:</strong> <?php echo $fullname; ?></p>
    <p><strong>Address:</strong> <?php echo $address; ?></p>
    <p><strong>Phone:</strong> <?php echo $phone; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Start Date:</strong> <?php echo $startdate; ?></p>
    <p><strong>End Date:</strong> <?php echo $enddate; ?></p>
    <p><strong>Pickup Location:</strong> <?php echo $pickupLocation; ?></p>
    <p><strong>Return Location:</strong> <?php echo $returnLocation; ?></p>
    <p><strong>Distance (in km):</strong> <?php echo $distance; ?></p>
    <p><strong>Selected Vehicle Model:</strong> <?php echo $selectedVehicleModel; ?></p>
    <p><strong>Total Cost:</strong> ₹<?php echo $totalCost; ?></p>
    </div>
    <div class="proceed-to-pay" >

        <button class="proceed-button"  onclick="redirectToPayment()" >Proceed to Pay</button>
    </div>
    </div>

</body>
<script>
    // Store the totalCost in localStorage
    localStorage.setItem('totalCost', <?php echo $totalCost; ?>);

    function redirectToPayment() {
        // Get the current totalCost value
        var totalCost = <?php echo $totalCost; ?>;
        
        // Redirect to the next page with totalCost as a query parameter
        window.location.href = 'payment.html?totalCost=' + totalCost;
    }
    </script>
</html>

