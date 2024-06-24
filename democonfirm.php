<?php include("header.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Page</title>
    <!-- Add your CSS styles here -->
    <style>
      .confirm {
    padding: 20px;
}

.confirm h2 {
    text-align: center;
    background-color: #15AB9A;
    color: white;
    padding: 10px 20px;
    border-radius: 6px;
}

.confirm table {
    border-collapse: collapse;
    width: 50%;
    margin: 20px auto;
}

.confirm th, .confirm td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
}

.confirm th {
    background-color: #f2f2f2;
}

.confirm tr:nth-child(even) {
    background-color: #f2f2f2;
}

.confirm tr:hover {
    background-color: #ddd;
}

    </style>
</head>
<body>
    <div class="confirm">
    <h2>Results</h2>
    <?php
    // Include the database connection file
    include("connect.php");

    // Check if the user is logged in and get the user's name from the session
    // session_start();
    if (isset($_SESSION['name'])) {
        $name = $_SESSION['name'];

        // Fetch data from the results table for the logged-in user
        $sql = "SELECT * FROM results WHERE name = '$name'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display the data in a table
            echo "<table>";
            echo "<tr><th>Name</th><th>Total Questions</th><th>Correct Answers</th><th>Percentage Correct</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['total_questions'] . "</td>";
                echo "<td>" . $row['correct_answers'] . "</td>";
                echo "<td>" . $row['percentage_correct'] . "%</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No results found for $name.</p>";
        }
    } else {
        echo "<p>User not logged in.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>
    </div>
</body>
</html>
