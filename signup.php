<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0; 
        }

        /* Apply flex to the container */
        .r-cont {
            display: flex;
            justify-content: space-around; /* Adjust spacing between items */
            align-items: center;
            max-width: 1200px; /* Adjust as needed */
            margin: 16px auto; /* Center the container and add some space */    
            padding: 20px; /* Add some padding */
            /* background-color:#15AB9A; Add a white background */
            /* border-radius: 10px; Add some border-radius for a softer look */
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); Add a subtle box shadow */
        }
        .heading {
            margin-top: 28px;
        }
        /* Style the form */
        .r-form {
            display: flex;
            flex-direction: column;
            width: 50%; /* Adjust width as needed */
        }

        .r-form label {
            margin-bottom: 10px; /* Add some spacing between labels */
            font-size: 18px; /* Reduce font size slightly */
            margin-top: 20px;
            font-weight: bold;
        }

        .r-form input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc; /* Add a light border */
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease; /* Add a smooth transition for better user experience */
        }

        .r-form input:focus {
            outline: none;
            border-color: #007bff; /* Change border color on focus */
        }

        /* Style the image */
        .rimg img {
            max-width: 100%; /* Ensure the image is responsive */
            width: 100%; /* Adjust width as needed */
            margin-top: 40px;
        }
        h1{
            font-size: 35px;
            font-weight: bold;
            word-spacing: 1px;
            letter-spacing: 1px;
            margin-top: 20px;
        }
        .r-cont button{
            background-color:#221437;
            margin-top: 20px;
            padding: 6px 8px;
            color: white;
            border: none;
            font-size: 30px;
            border-radius: 8px;
        }
        .r-cont button:hover{
            background-color: #7047ac;
            color: white;
        }
    </style>
</head>
<body style="background-color:#15AB9A;">
    <?php include("header.php");?>
    <center class="heading"><h2>Register Your Self For Getting One Step Ahead</h2></center>
    <div class="r-cont">   
        <form action="" class="r-form" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Your Name">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter Your Email">

            <label for="mobile">Mobile:</label>
            <input type="tel" id="mobile" name="mobile" placeholder="Enter Your Mobile No.">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter Your Password">
            <button type="submit">Sign-Up</button>
        </form>
        <div class="rimg"><img src="./images/rform.jpg" alt="Registration Form Image"></div>
    </div>
</body>
</html>
<?php include("footer.php");?>



<!-- PHP -->
<?php
include("connect.php");
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
   $password = $_POST['password'];
   $signup_date = date('Y-m-d'); // Get the current date in YYYY-MM-DD format
  $query="select * from users where email='$email'";
   $data=mysqli_query($conn,$query);
   $total=mysqli_num_rows($data);
   if($total==1){
     echo "<p style='color: red;'>Email already registered</p>";
   }
   else{
   // Insert data into a database table
   $sql = "INSERT INTO users (name, email, mobile, password, signup_date) 
   VALUES ('$name', '$email', '$mobile', '$password', '$signup_date')";
   $result=mysqli_query($conn,$sql);
 
   if ($result) {
    echo "<script>window.location.href = 'signin.php';</script>";
     exit;
 } else {
     echo 'Registration failed. Please try again.';
 }
 }
}
 ?>