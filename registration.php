<?php
// Database connection details
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

// Retrieve user registration data from the form
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['pass'];

// Check if the user already exists in the database (You can customize this part)
$sql = "SELECT * FROM niwangune WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "User with this email already exists. Please choose a different email.";
} else {
    // Insert user data into the database
    $insertSql = "INSERT INTO niwangune (email, phone, pass) VALUES ('$email', '$phone', '$password')";

    if ($conn->query($insertSql) === TRUE) {
        // Registration successful, redirect to a success page
        header("Location: index.html");
        exit(); // Terminate the script to prevent further execution
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
