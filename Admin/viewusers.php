<?php
include("header.php");
// Database connection settings
include("connect.php");

// Query to fetch user data from the database
$sql = "SELECT * FROM users"; // Modify the table name if needed

// Execute the query
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><h2>User List</h2></center>
    <table>
        <tr>
            <th>Login ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Password</th>
        </tr>
        <?php
        // Check if there are rows returned from the query
        if ($result->num_rows > 0) {
            // Loop through each row of data
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["loginid"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["mobile"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
                echo "</tr>";
            }
        } else {
            // If no rows returned, display a message
            echo "<tr><td colspan='5'>No users found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
