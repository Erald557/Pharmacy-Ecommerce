<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmaci_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare SQL statement to insert data into orders table
    $sql = "INSERT INTO orders (firstname, lastname, phone, email, address, product_id, product_name, product_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssiid", $firstname, $lastname, $phone, $email, $address, $product_id, $product_name, $product_price);

    // Set parameters from the form submission
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    // Execute the prepared statement
    if ($stmt->execute()) {
        header('Location: index.php'); 
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    // Close statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>
