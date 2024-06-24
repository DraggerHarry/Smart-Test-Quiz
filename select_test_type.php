<?php
include("header.php");  
include("connect.php");

// Check if subject_id is set in the URL
if(isset($_GET['subject_id'])) {
    $subject_id = $_GET['subject_id'];

    // Fetch test types for the selected subject from the database
    $sql_test_types = "SELECT DISTINCT test_type FROM tests WHERE subject_id = '$subject_id'";
    $result_test_types = $conn->query($sql_test_types);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Test Type</title>
    <!-- Your CSS styles here -->
    <style>
        .selecttest-cont {
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 600px; /* Adjust the maximum width as needed */
    margin: 20px auto; /* Center the container horizontally */
}

.selecttest-cont h2 {
    background-color: #15AB9A;
    height: 50px;
    padding: 10px 12px;
    font-size: 24px;
    color: white;
    margin-bottom: 20px;
    text-align: center;
}

.selecttest-cont ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.selecttest-cont ul li {
    margin-bottom: 12px;
}

.selecttest-cont ul li a {
    display: block;
    padding: 12px;
    border-radius: 6px;
    background-color: #ffffff;
    text-decoration: none;
    color: #333333;
    font-size: 18px;
    transition: background-color 0.3s ease;
}

.selecttest-cont ul li a:hover {
    background-color: #7ae1d5;
}

.selecttest-cont ul li a:focus {
    box-shadow: 0 0 30px lightblue;
}

    </style>
</head>
<body>
    <div class="selecttest-cont">  
    <h2>Select Test Type</h2>
    <ul>
        <?php
        // Display test types as list items with links to select_answers.php
        if ($result_test_types->num_rows > 0) {
            while ($row = $result_test_types->fetch_assoc()) {
                $test_type = $row['test_type'];
                echo "<li><a href='select_answers.php?subject_id=$subject_id&test_type=$test_type'>$test_type</a></li>";
            }
        } else {
            echo "No test types found for this subject.";
        }
        ?>
    </ul>
    </div>

</body>
</html>
<?php
} else {
    // Redirect the user if subject_id is not set in the URL
    header("Location: select_subject.php");
    exit();
}
?>
