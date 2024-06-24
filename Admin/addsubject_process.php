<?php
// Include database connection settings
include("connect.php");

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize
    $subject_name = $_POST['subject_name'];
    $subject_code = $_POST['subject_code'];
   

    // Insert data into database
    $sql = "INSERT INTO subjects (subject_name, subject_code) VALUES ('$subject_name', '$subject_code')";

    if ($conn->query($sql) === TRUE) {
        // Subject added successfully
        header("Location: addsubject.php");
        exit();
    } else {
        // Error occurred while adding subject
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
