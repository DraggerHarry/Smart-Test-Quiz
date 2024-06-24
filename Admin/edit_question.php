<?php
// Include database connection settings
include("header.php");
include("connect.php");

// Check if question_id is provided via GET parameter
if(isset($_GET['id']) && !empty(trim($_GET['id']))) {
    $question_id = trim($_GET['id']);

    // Fetch question details from the database
    $sql_question = "SELECT * FROM questions WHERE question_id = '$question_id'";
    $result_question = $conn->query($sql_question);

    if($result_question->num_rows == 1) {
        $row = $result_question->fetch_assoc();
        $subject_id = $row['subject_id'];
        $test_type = $row['test_type'];
        $question = $row['question'];
        $option1 = $row['option1'];
        $option2 = $row['option2'];
        $option3 = $row['option3'];
        $option4 = $row['option4'];
        $correct_answer = $row['correct_answer'];
    } else {
        echo "Question not found.";
        exit();
    }
// } else {
//     echo "Invalid request.";
//     exit();
// }
}

// Handle form submission for updating question details
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_question'])) {
    $question_id = $_POST['question_id'];
    $subject_id = $_POST['subject'];
    $test_type = $_POST['test'];
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $correct_answer = $_POST['correct_answer'];

    // Perform database update
    $sql_update_question = "UPDATE questions SET subject_id = '$subject_id', test_type = '$test_type', question = '$question', option1 = '$option1', option2 = '$option2', option3 = '$option3', option4 = '$option4', correct_answer = '$correct_answer' WHERE question_id = '$question_id'";
    if ($conn->query($sql_update_question) === TRUE) {
        echo "Question updated successfully.";
        header("location:addquestion.php");
    } else {
        echo "Error updating question: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Question</title>
    <style>
            .form-container {
        width: 50%;
        margin: 20px auto;
        padding: 20px;
        background-color: #f2f2f2;
        border-radius: 5px;
    }

    /* Style form labels */
    label {
        font-weight: bold;
    }

    /* Style form input fields */
    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    /* Style submit button */
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    /* Change submit button color on hover */
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Edit Question</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="question_id" value="<?php echo $question_id; ?>">
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" value="<?php echo $subject_id; ?>"><br><br>
        <label for="test">Test Type:</label>
        <input type="text" id="test" name="test" value="<?php echo $test_type; ?>"><br><br>
        <label for="question">Question:</label><br>
        <textarea id="question" name="question" rows="4" cols="50"><?php echo $question; ?></textarea><br><br>
        <label for="option1">Option A:</label>
        <input type="text" id="option1" name="option1" value="<?php echo $option1; ?>"><br><br>
        <label for="option2">Option B:</label>
        <input type="text" id="option2" name="option2" value="<?php echo $option2; ?>"><br><br>
        <label for="option3">Option C:</label>
        <input type="text" id="option3" name="option3" value="<?php echo $option3; ?>"><br><br>
        <label for="option4">Option D:</label>
        <input type="text" id="option4" name="option4" value="<?php echo $option4; ?>"><br><br>
        <label for="correct_answer">Correct Answer:</label>
        <input type="text" id="correct_answer" name="correct_answer" value="<?php echo $correct_answer; ?>"><br><br>
        <input type="submit" name="update_question" value="Update Question">
    </form>
</div>
</body>
</html>
