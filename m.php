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

// Process the form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $fullname = $_POST["fullname"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $startdate = $_POST["startdate"];
    $enddate = $_POST["enddate"];
    $pickupLocation = $_POST["pickupLocation"];
    $returnLocation = $_POST["returnLocation"];
    $distance = floatval($_POST["distance"]); // Get the distance as a floating-point number
    $selectedVehicleModel = $_POST["vehicleModel"];
    
    // Define the price per kilometer based on the selected vehicle model
    $pricePerKm = 0; // Default value
    
    switch ($selectedVehicleModel) {
        case "Model 1":
            $pricePerKm = 10;
            break;
        case "Model 2":
            $pricePerKm = 12;
            break;
        case "Model 3":
            $pricePerKm = 9;
            break;
        case "Model 4":
            $pricePerKm = 8;
            break;
        case "Model 5":
            $pricePerKm = 15;
            break;
        case "Model 6":
            $pricePerKm = 14;
            break;
        default:
            // Handle invalid vehicle model here if needed
            break;
    }
    
    $totalCost = $pricePerKm * $distance;

    // Insert the data into the database
    $sql = "INSERT INTO rental_records (fullname, address, phone, email, startdate, enddate, pickupLocation, returnLocation, distance, vehicleModel, totalCost) VALUES ('$fullname', '$address', '$phone', '$email', '$startdate', '$enddate', '$pickupLocation', '$returnLocation', '$distance', '$selectedVehicleModel', '$totalCost')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to the "thank you" page
        header("Location: bill.php");
        exit; // Make sure to exit to prevent further execution of the script
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
    // Close the database connection
    $conn->close();
}
?>
