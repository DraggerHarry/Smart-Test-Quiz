<?php
// Include database connection settings
include("header.php");
include("connect.php");

// Fetch subjects from the database
$sql_subjects = "SELECT * FROM subjects";
$result_subjects = $conn->query($sql_subjects);

// Fetch test types from the database
$sql_test_types = "SELECT DISTINCT test_type FROM tests";
$result_test_types = $conn->query($sql_test_types);

// Handle form submission for adding a new question
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_question'])) {
    $subject_id = $_POST['subject'];
    $test_type = $_POST['test'];
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $correct_answer = $_POST['correct_answer'];
 

    // Perform database insertion
    $sql_insert_question = "INSERT INTO questions (subject_id, test_type, question, option1, option2, option3, option4, correct_answer) 
                            VALUES ('$subject_id', '$test_type', '$question', '$option1', '$option2', '$option3', '$option4', '$correct_answer')";
    if ($conn->query($sql_insert_question) === TRUE) {
        echo "Question added successfully.";
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    
    } else {
        echo "Error: " . $sql_insert_question . "<br>" . $conn->error;
    }
}

// Fetch questions from the database
$sql_questions = "SELECT * FROM questions";
$result_questions = $conn->query($sql_questions);

// Handle edit form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    // Handle edit logic here
    $question_id = $_POST['question_id'];
    // Redirect to edit page with question_id
    header("Location: edit_question.php?id=$question_id");
    exit();
}

// Handle delete request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Handle delete logic here
    $question_id = $_POST['question_id'];
    $sql_delete_question = "DELETE FROM questions WHERE question_id = '$question_id'";
    if ($conn->query($sql_delete_question) === TRUE) {
        echo "Question deleted successfully.";
    } else {
        echo "Error deleting question: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question</title>
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
        .addq-form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .addq-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .addq-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .addq-form select, .addq-form textarea, .addq-form input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1em;
        }

        .addq-form button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }

        .addq-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="addq-form">
    <h2>Add Question</h2>
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

        <label for="test">Select Test Type:</label>
        <select name="test" id="test">
            <?php
            // Populate the select test type dropdown with fetched test types
            if ($result_test_types->num_rows > 0) {
                while ($row = $result_test_types->fetch_assoc()) {
                    echo "<option value='" . $row['test_type'] . "'>" . $row['test_type'] . "</option>";
                }
            }
            ?>
        </select><br>

        <label for="question">Question:</label><br>
        <textarea name="question" id="question" rows="4" cols="50"></textarea><br>

        <!-- Add options and correct answer fields here -->
        <label for="option1">Option A:</label>
        <input type="text" name="option1" id="option1" required><br>

        <label for="option1">Option B:</label>
        <input type="text" name="option2" id="option2" required><br>

        <label for="option1">Option C:</label>
        <input type="text" name="option3" id="option3" required><br>

        <label for="option1">Option D:</label>
        <input type="text" name="option4" id="option4" required><br>

        <!-- Label for correct answer -->
        <label for="correct_answer">Correct Answer:</label>
        <input type="text" name="correct_answer" id="correct_answer" required><br>

        <button type="submit" name="add_question">Add Question</button>
    </form>
    </div>
    <center><h2>Submitted Questions</h2></center>
<table>
    <tr>
        <th>Question ID</th>
        <th>Subject</th>
        <th>Test Type</th>
        <th>Question</th>
        <th>Option A</th>
        <th>Option B</th>
        <th>Option C</th>
        <th>Option D</th>
        <th>Correct Answer</th>
        <th>Action</th>
    </tr>
    <?php
if ($result_questions->num_rows > 0) {
    while ($row = $result_questions->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['question_id'] . "</td>";
        echo "<td>" . $row['subject_id'] . "</td>";
        echo "<td>" . $row['test_type'] . "</td>";
        echo "<td>" . $row['question'] . "</td>";
        echo "<td>" . $row['option1'] . "</td>";
        echo "<td>" . $row['option2'] . "</td>";
        echo "<td>" . $row['option3'] . "</td>";
        echo "<td>" . $row['option4'] . "</td>";
        echo "<td>" . $row['correct_answer'] . "</td>";
        echo "<td>";
        echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
        echo "<input type='hidden' name='question_id' value='" . $row['question_id'] . "'>";
        echo "<button type='submit' name='edit'>Edit</button>";
        echo "<button type='submit' name='delete'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='10'>No questions found.</td></tr>";
}
?>

</table>

</body>
</html>
