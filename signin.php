<?php include("header.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .cont {
            background-color: #15AB9A;
            height: 670px;
            width: 100%;
            /* border: 2px solid black; */
            display: flex;
            justify-content: space-between;
        }
        .img img{
            /* z-index: -1; */
            /* border: 2px solid black; */
            height: 100%;
            /* opacity: 0.4; */
        }
        .signin-form{
            padding: 150px;
        }
        .signin-form label{
            font-size: 30px;
            font-weight: bold;
            margin-top: 20px;
            /* margin-top: 20px; */
            color: white;
        }
        .signin-form input{
            width: 500px;
            display: block;
            font-size: 14px;
            margin-top: 20px;
            border-radius:8px ;
            border: none;
            margin-bottom: 20px;
            outline: none;
            padding: 10px 20px;
        }
        .signin-form input:focus{
            box-shadow: 0 0 20px #BBE2EC;
        }
        .signin-form p{
            font-size: 20px;
            margin-top: 20px;
            color: black;
            font-weight: bold;
        }
        .signin-form button{
            background-color:#001816;
            border: none;
            width: 500px;
            font-size: 22px;
            border-radius: 8px;
            padding: 8px 10px;
            color: white;
            font-weight: bold;
        }
        .signin-form button:focus{
            box-shadow: 0 0 20px #BBE2EC;
        }
    </style>
</head>

<body>
    <div class="cont">
        <form action="" class="signin-form" method="post">
            <label for="Name">Username:</label>
            <input type="text" name="name" id="name" placeholder="Enter your Username">
            <label for="Password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter Your Password">
            <p>Not A Registered User <a href="signup.php"><u>SignUp First</u></a>
            </p>
            <button>Sign-In</button>
        </form>
        <div class="img"><img src="./images/coding.gif" alt=""></div>
    </div>
</body>

</html>
<!-- php -->
<?php
// Database connection settings
include("connect.php");
// Process signin form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize
    $name =  $_POST['name'];
    $password = $_POST['password'];

    // Query to fetch user details
    $sql = "SELECT * FROM users WHERE name = '$name' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['name']=$name;
        // User found, redirect to dashboard or home page
        echo "<script>window.location.href = 'index.php';</script>";
        exit(); // Stop further execution
    } else {
        // User not found, display error message or redirect to signin page
        echo "Invalid email or password. Please try again.";
    }
}

// Close database connection
$conn->close();
?>
