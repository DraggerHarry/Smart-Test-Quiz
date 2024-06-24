<?php
include("header.php");  
include("connect.php");
// Fetch subjects from the database
$sql_subjects = "SELECT * FROM subjects";
$result_subjects = $conn->query($sql_subjects);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Subject</title>
    <!-- Your CSS styles here -->
    <style>    
    .start-cont {
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 600px; /* Adjust the maximum width as needed */
    margin: 20px auto; /* Center the container horizontally */
}

.start-cont h2 {
    background-color: #15AB9A;
    height: 50px;
    padding: 10px 12px;
    font-size: 24px;
    color: white;
    margin-bottom: 20px;
    text-align: center;
}

.start-cont ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.start-cont ul li {
    margin-bottom: 12px;
}

.start-cont ul li a {
    display: block;
    padding: 12px;
    border-radius: 6px;
    background-color: #ffffff;
    text-decoration: none;
    color: #333333;
    font-size: 18px;
    transition: background-color 0.3s ease;
}

.start-cont ul li a:hover {
    background-color: #7ae1d5;
}
.start-cont ul li a:focus{
    box-shadow: 0 0 30px lightblue;
}

    </style>
</head>
<body>
    <div class="start-cont">
            <h2>Select Subject</h2>
            <ul>
                <?php
                // Display subjects as list items with links to select_test_type.php
                if ($result_subjects->num_rows > 0) {
                    while ($row = $result_subjects->fetch_assoc()) {
                        echo "<li><a href='select_test_type.php?subject_id=" . $row['subject_id'] . "'>" . $row['subject_name'] . "</a></li>";
                    }
                } else {
                    echo "No subjects found.";
                }
                ?>
            </ul>
    
    </div>
</body>
</html>
