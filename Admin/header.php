<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.navbar {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
}

.logo {
    font-size: 24px;
}

.nav-links {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
}

.nav-links li {
    margin-right: 20px;
    font-size: 16px;
    font-weight: bold;
}

.nav-links li a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.nav-links li a:hover {
    color: #ff9900;
}

@media (max-width: 768px) {
    .container {
        flex-direction: column;
        align-items: flex-start;
    }

    .nav-links {
        margin-top: 10px;
    }

    .nav-links li {
        margin-right: 0;
        margin-bottom: 10px;
    }
}

    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="logo"><img src="../images/logo.png" alt=""></div>
            <ul class="nav-links">
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="viewusers.php">View Users</a></li>
                <li><a href="addsubject.php">Add Subject</a></li>
                <li><a href="addtest.php">Add Test</a></li>
                <li><a href="addquestion.php">Add Questions</a></li>
                <li><a href="viewresult.php">View Result</a></li>    
                <li><a href="logout.php">Logout</a></li>  
                <li><a href="index.php">Home</a></li>    
            </ul>
        </div>
    </nav>
</body>
</html>
