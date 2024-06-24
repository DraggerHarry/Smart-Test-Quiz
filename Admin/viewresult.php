<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Results</title>
    <style>
        /* styles.css */

        /* Overall container style */
        .all-results {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Table style */
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }

        /* Table header style */
        th {
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        /* Table cell style */
        td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        /* Table row hover effect */
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="all-results">
       <center><h2>All Results</h2></center>
        <?php
        // Include the database connection file
        include("connect.php");

        // Fetch all results from the database
        $sql = "SELECT * FROM results";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display the results in a table
            echo "<table>";
            echo "<tr><th>Name</th><th>Total Questions</th><th>Correct Answers</th><th>Percentage Correct</th><th>Date</th><th>Result</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['total_questions'] . "</td>";
                echo "<td>" . $row['correct_answers'] . "</td>";
                echo "<td>" . $row['percentage_correct'] . "%</td>";
                echo "<td>" . $row['test_date'] . "</td>";
                $resultText = $row['percentage_correct'] >= 50 ? 'Pass' : 'Did Not clear';
                echo "<td>" . $resultText . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No results found.</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
