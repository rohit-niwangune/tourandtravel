<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rohit";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Prepare and execute the SQL insert statement
$sql = "INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo "Data inserted successfully.";
    header("Location: m.html");
} else {
    echo "Error: " . $stmt->error;
}
 


// Close the database connection
$stmt->close();
$conn->close();
?>
