<?php
// Include the database connection file
include("connect.php");

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['name'])) {
    // Redirect the user to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Get the user's name from the session
$name = $_SESSION['name'];

// Fetch tests and marks for the user from the database
$sql = "SELECT tests.test_type, results.percentage_correct
        FROM results 
        INNER JOIN tests ON results.name = tests.test_id
        WHERE results.name = '$name'";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Add your CSS styles here -->
</head>
<body>
    <h2>User Profile</h2>
    <h3>Welcome, <?php echo $name; ?></h3>
    
    <?php if ($result->num_rows > 0): ?>
        <h4>Your Test Results:</h4>
        <table>
            <tr>
                <th>Test Name</th>
                <th>Marks Scored</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['test_name']; ?></td>
                    <td><?php echo $row['marks']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No test results found for <?php echo $name; ?>.</p>
    <?php endif; ?>
    
    <!-- Add any additional content or links here -->
</body>
</html>
