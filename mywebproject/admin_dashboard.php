<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check login
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
    $user = $_POST['username'];
    $pass = md5($_POST['password']);
    
    $sql = "SELECT * FROM admin WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);
    
    if($result->num_rows == 1) {
        $_SESSION['admin'] = $user;
    } else {
        header("Location: login.php?error=1");
        exit();
    }
}

if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Get orders
$orders_sql = "SELECT * FROM orders ORDER BY created_at DESC";
$orders_result = $conn->query($orders_sql);

// Get messages
$messages_sql = "SELECT * FROM messages ORDER BY created_at DESC";
$messages_result = $conn->query($messages_sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
    <h1>Admin Dashboard</h1>
    <p>Welcome, <?php echo $_SESSION['admin']; ?></p>
</div>

<div class="navbar">
    <a href="admin_dashboard.php">Orders</a>
    <a href="admin_dashboard.php?view=messages">Messages</a>
    <a href="logout.php">Logout</a>
</div>

<div class="container">
    <?php
    if(isset($_GET['view']) && $_GET['view'] == 'messages') {
        // Display messages
        echo "<h2>Customer Messages</h2>";
        echo "<table class='menu-table'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Location</th><th>Message</th><th>Date</th></tr>";
        
        while($row = $messages_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['fullname'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['location'] . "</td>";
            echo "<td>" . $row['message'] . "</td>";
            echo "<td>" . $row['created_at'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        // Display orders
        echo "<h2>Customer Orders</h2>";
        echo "<table class='menu-table'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Menu Item</th><th>Address</th><th>Delivery Date</th><th>Order Date</th></tr>";
        
        while($row = $orders_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['fullname'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['menu_item'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['order_date'] . "</td>";
            echo "<td>" . $row['created_at'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</div>

<div class="footer">
    <p>Admin Dashboard - Grand Hotel</p>
</div>

</body>
</html>