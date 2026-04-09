<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$menu_item = $_POST['menu_item'];
$address = $_POST['address'];
$order_date = $_POST['order_date'];

// Insert into database
$sql = "INSERT INTO orders (fullname, email, phone, menu_item, address, order_date) 
        VALUES ('$fullname', '$email', '$phone', '$menu_item', '$address', '$order_date')";

if ($conn->query($sql) === TRUE) {
    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>Order Confirmation</title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <div class='container'>
            <h2>Order Placed Successfully!</h2>
            <p>Thank you for your order, $fullname!</p>
            <p>We will deliver your $menu_item to $address on $order_date.</p>
            <a href='index.html'>Back to Home</a>
        </div>
    </body>
    </html>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>