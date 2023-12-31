<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rohit";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $accountNumber = $_POST["accountNumber"];
    $reason = $_POST["reason"];

    // Check if an order with the given email exists in the original table
    $checkOrderSql = "SELECT * FROM rental_records WHERE email = '$email'";
    $result = $conn->query($checkOrderSql);

    if ($result->num_rows > 0) {
        // An order with the given email exists, proceed with cancellation

        // Insert the cancellation details into the canceled_orders table
        $insertSql = "INSERT INTO cancelled_orders (fullname, email, phone, accountNumber, reason) VALUES ('$fullname', '$email', '$phone', '$accountNumber', '$reason')";

        if ($conn->query($insertSql) === TRUE) {
            // Cancellation successful
            $response = array("success" => true, "message" => "Cancellation successful.");
        } else {
            // Error in inserting cancellation details
            $response = array("success" => false, "message" => "Error in cancellation: " . $conn->error);
        }
    } else {
        // No order found with the given email
        $response = array("success" => false, "message" => "No order found with the provided email.");
    }

    echo json_encode($response);

    $conn->close();
}
?>
