<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
}

.container {
    max-width: 400px;
    margin: 100px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
}

h2 {
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

button {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    margin-bottom: 20px;
}

button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
<div class="container">
        <h2>Admin Login</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST['username'])) {
                        echo "<span style='color: red;'>Username is required.</span>";
                    }
                }
                ?>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST['password'])) {
                        echo "<span style='color: red;'>Password is required.</span>";
                    }
                }
                ?>
            </div>
            <button type="submit">Login</button>
            <!-- <a href="C:\xampp\htdocs\Smart Test Quiz\index.php"><button>Website</button></a> -->
             <!-- <a href="index.php">Website</a> -->
        </form>
    </div>
   
</body>
</html>
<!-- php -->
<?php
// Database connection settings
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to fetch admin details
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Admin found, redirect to dashboard or home page
        header("Location: index.php");
        exit(); // Stop further execution
    } else {
        // Admin not found, display error message or redirect to login page
        echo "<p style='color: red;'>Invalid username or password. Please try again.</p>";
    }
}

// Close database connection
$conn->close();
?>