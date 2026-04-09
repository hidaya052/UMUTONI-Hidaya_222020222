<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container" style="max-width: 400px; margin-top: 50px;">
    <h2>Admin Login</h2>
    
    <?php
    if(isset($_GET['error'])) {
        echo "<p style='color:red'>Invalid username or password!</p>";
    }
    ?>
    
    <form action="admin_dashboard.php" method="post">
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>
        
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>