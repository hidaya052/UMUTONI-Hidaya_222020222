<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$location = $_POST['location'];
$message = $_POST['message'];

$sql = "INSERT INTO messages (fullname, email, phone, location, message) 
        VALUES ('$fullname', '$email', '$phone', '$location', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>Message Sent</title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <div class='container'>
            <h2>Message Sent Successfully!</h2>
            <p>Thank you $fullname for contacting us. We will get back to you soon.</p>
            <a href='index.html'>Back to Home</a>
        </div>
    </body>
    </html>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>