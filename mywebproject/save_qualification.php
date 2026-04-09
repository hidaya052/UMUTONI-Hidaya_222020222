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

// Create qualification table if not exists
$sql = "CREATE TABLE IF NOT EXISTS qualifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    board10 VARCHAR(10),
    percentage10 DECIMAL(5,2),
    year10 VARCHAR(4),
    board12 VARCHAR(10),
    percentage12 DECIMAL(5,2),
    year12 VARCHAR(4),
    boardgrad VARCHAR(10),
    percentagegrad DECIMAL(5,2),
    yeargrad VARCHAR(4),
    boardmaster VARCHAR(10),
    percentagemaster DECIMAL(5,2),
    yearmaster VARCHAR(4),
    course VARCHAR(10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$conn->query($sql);

// Get data from form
$board10 = $_POST['board10'];
$percentage10 = $_POST['percentage10'];
$year10 = $_POST['year10'];
$board12 = $_POST['board12'];
$percentage12 = $_POST['percentage12'];
$year12 = $_POST['year12'];
$boardgrad = $_POST['boardgrad'];
$percentagegrad = $_POST['percentagegrad'];
$yeargrad = $_POST['yeargrad'];
$boardmaster = $_POST['boardmaster'];
$percentagemaster = $_POST['percentagemaster'];
$yearmaster = $_POST['yearmaster'];
$course = $_POST['course'];

// Insert into database
$sql = "INSERT INTO qualifications (board10, percentage10, year10, board12, percentage12, year12, boardgrad, percentagegrad, yeargrad, boardmaster, percentagemaster, yearmaster, course) 
        VALUES ('$board10', '$percentage10', '$year10', '$board12', '$percentage12', '$year12', '$boardgrad', '$percentagegrad', '$yeargrad', '$boardmaster', '$percentagemaster', '$yearmaster', '$course')";

if ($conn->query($sql) === TRUE) {
    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>Form Submitted</title>
        <style>
            body { font-family: Arial; text-align: center; padding: 50px; }
            .success { background-color: #4CAF50; color: white; padding: 20px; border-radius: 10px; }
            button { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; margin-top: 20px; }
        </style>
    </head>
    <body>
        <div class='success'>
            <h2>Qualification Form Submitted Successfully!</h2>
            <p>Thank you for submitting your qualifications.</p>
            <p>Course Applied: <strong>$course</strong></p>
            <button onclick=\"window.location.href='qualification_form.html'\">Submit Another</button>
        </div>
    </body>
    </html>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>