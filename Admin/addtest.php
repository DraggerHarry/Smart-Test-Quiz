<?php
// Include database connection settings
include("header.php");
include("connect.php");

// Fetch subjects from the database
$sql_subjects = "SELECT * FROM subjects";
$result_subjects = $conn->query($sql_subjects);

// Handle form submission for adding a new test
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_test'])) {
    $selected_subject_id = $_POST['subject'];
    $selected_test_type = $_POST['test'];
    $num_questions = $_POST['num_questions'];

    // Fetch the subject name based on the selected subject_id
    $sql_subject_name = "SELECT subject_name FROM subjects WHERE subject_id = '$selected_subject_id'";
    $result_subject_name = $conn->query($sql_subject_name);
    $row_subject_name = $result_subject_name->fetch_assoc();
    $selected_subject_name = $row_subject_name['subject_name'];

    // Perform database insertion
    $sql_insert_test = "INSERT INTO tests (subject_id, subject_name, test_type, num_questions) VALUES ('$selected_subject_id', '$selected_subject_name', '$selected_test_type', $num_questions)";
    if ($conn->query($sql_insert_test) === TRUE) {
        echo "Test added successfully.";
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    
    } else {
        echo "Error: " . $sql_insert_test . "<br>" . $conn->error;
    }
}

// Fetch submitted tests from the database
$sql_tests = "SELECT tests.*, subjects.subject_name AS subject_name FROM tests JOIN subjects ON tests.subject_id = subjects.subject_id";
$result_tests = $conn->query($sql_tests);

// Handle edit form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $test_id = $_POST['test_id'];
    $new_test_type = $_POST['new_test_type'];
    $new_num_questions = $_POST['new_num_questions'];

    // Update test details in the database
    $sql_update_test = "UPDATE tests SET test_type='$new_test_type', num_questions=$new_num_questions WHERE test_id=$test_id";
    if ($conn->query($sql_update_test) === TRUE) {
        echo "Test updated successfully.";
    } else {
        echo "Error updating test: " . $conn->error;
    }
}

// Handle delete request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $test_id = $_POST['test_id'];

    // Delete test from the database
    $sql_delete_test = "DELETE FROM tests WHERE test_id=$test_id";
    if ($conn->query($sql_delete_test) === TRUE) {
        echo "Test deleted successfully.";
    } else {
        echo "Error deleting test: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add and Manage Tests</title>
    <!-- Add your CSS styling here -->
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
        .edit-delete-form {
            display: none;
        }
      .addtest-cont {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.addtest-cont h2 {
    margin-bottom: 20px;
    font-size: 1.5em;
    color: #333;
}

.addtest-cont label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

.addtest-cont select,
.addtest-cont input[type="number"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 1em;
}

.addtest-cont button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1em;
}

.addtest-cont button:hover {
    background-color: #45a049;
}

    </style>
    <script>
        function showEditDeleteForm(testId) {
            var editDeleteForm = document.getElementById("edit-delete-form-" + testId);
            if (editDeleteForm.style.display === "none") {
                editDeleteForm.style.display = "block";
            } else {
                editDeleteForm.style.display = "none";
            }
        }
    </script>
</head>
<body>
    <div class="addtest-cont">
    <h2>Add Test</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="subject">Select Subject:</label>
        <select name="subject" id="subject">
            <?php
            // Populate the select subject dropdown with fetched subjects
            if ($result_subjects->num_rows > 0) {
                while ($row = $result_subjects->fetch_assoc()) {
                    echo "<option value='" . $row['subject_id'] . "'>" . $row['subject_id'] . " - " . $row['subject_name'] . "</option>";
                }
            }
            ?>
        </select><br>

        <label for="test">Select Test:</label>
        <select name="test" id="test">
            <option value="basic">Basic</option>
            <option value="intermediate">Intermediate</option>
            <option value="advanced">Advanced</option>
        </select><br>

        <label for="num_questions">Number of Questions:</label>
        <input type="number" name="num_questions" id="num_questions"><br>

        <button type="submit" name="add_test">Add Test</button>
    </form>
        </div>
    <h2>Submitted Tests</h2>
    <table>
        <tr>
            <th>Test ID</th>
            <th>Subject ID</th>
            <th>Subject Name</th>
            <th>Test Type</th>
            <th>Number of Questions</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result_tests->num_rows > 0) {
            while ($row = $result_tests->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['test_id'] . "</td>";
                echo "<td>" . $row['subject_id'] . "</td>";
                echo "<td>" . $row['subject_name'] . "</td>";
                echo "<td>" . $row['test_type'] . "</td>";
                echo "<td>" . $row['num_questions'] . "</td>";
                echo "<td><button onclick='showEditDeleteForm(" . $row['test_id'] . ")'>Edit/Delete</button>";
                echo "<div class='edit-delete-form' id='edit-delete-form-" . $row['test_id'] . "'>";
                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                echo "<input type='hidden' name='test_id' value='" . $row['test_id'] . "'>";
                echo "<input type='text' name='new_test_type' value='" . $row['test_type'] . "'>";
                echo "<input type='number' name='new_num_questions' value='" . $row['num_questions'] . "'>";
                echo "<button type='submit' name='edit'>Edit</button>";
                echo "<button type='submit' name='delete'>Delete</button>";
                echo "</form>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No tests found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
