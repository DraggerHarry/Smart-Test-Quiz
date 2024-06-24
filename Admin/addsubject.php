<?php
// Include database connection settings
include("header.php");
include("connect.php");

// Handle edit form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_subject'])) {
    $subject_id = $_POST['subject_id'];
    $new_subject_name = $_POST['new_subject_name'];
    $new_subject_code = $_POST['new_subject_code'];

    // Update subject details in the database
    $sql = "UPDATE subjects SET subject_name='$new_subject_name', subject_code='$new_subject_code' WHERE subject_id=$subject_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: addsubject.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Handle delete request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_subject'])) {
    $subject_id = $_POST['subject_id'];

    // Delete subject from the database
    $sql = "DELETE FROM subjects WHERE subject_id=$subject_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: addsubject.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch subjects from the database
$sql = "SELECT * FROM subjects";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .addsub-cont {
    max-width: 400px;
    margin: 14px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.addsub-cont h2 {
    margin-bottom: 20px;
    font-size: 1.5em;
    color: #333;
}

.addsub-cont label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

.addsub-cont input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 1em;
}

.addsub-cont button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1em;
}

.addsub-cont button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
    <div class="addsub-cont">
    <h2>Add Subject</h2>
    <!-- Add Subject Form -->
    <form action="addsubject_process.php" method="post">
        <label for="subject_name">Subject Name:</label><br>
        <input type="text" id="subject_name" name="subject_name" required><br>
        
        <label for="subject_code">Subject Code:</label><br>
        <input type="text" id="subject_code" name="subject_code" required><br>
        
        <button type="submit">Add Subject</button>
    </form>
    </div>
    <center><h2>Subject List</h2></center>
    <!-- Display Subject List -->
    <?php if ($result->num_rows > 0) : ?>
        <table>
            <tr>
                <th>Subject Name</th>
                <th>Subject Code</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row["subject_name"]; ?></td>
                    <td><?php echo $row["subject_code"]; ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="subject_id" value="<?php echo $row['subject_id']; ?>">
                            <!-- Edit Form for Subjects -->
                            <input type="text" name="new_subject_name" value="<?php echo $row['subject_name']; ?>">
                            <input type="text" name="new_subject_code" value="<?php echo $row['subject_code']; ?>">
                            <input type="submit" name="edit_subject" value="Edit">
                            <input type="submit" name="delete_subject" value="Delete" onclick="return confirm('Are you sure you want to delete this subject?');">
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else : ?>
        <p>No subjects found.</p>
    <?php endif; ?>

    <?php
    // Close database connection
    $conn->close();
    ?>
</body>
</html>
