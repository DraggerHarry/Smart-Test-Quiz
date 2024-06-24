<?php
// Start the session to access session variables
session_start();

// Include header and database connection files
include("header.php");
include("connect.php");

// Check if the form is submitted and the 'submit_answers' button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_answers'])) {
    // Retrieve the submitted question IDs and answers
    $question_ids = $_POST['question_ids'];
    $answers = $_POST['answers'];
    $total_questions = count($question_ids);
    $correct_answers_count = 0;

    // Retrieve the name of the logged-in user from the session
    $name = $_SESSION['name'];

    // Retrieve the subject ID and test type from the session
    $subject_id = $_SESSION['subject_id'];
    $test_type = $_SESSION['test_type'];

    // Loop through submitted answers and compare with correct answers
    foreach ($question_ids as $question_id) {
        $submitted_answer = isset($answers[$question_id]) ? $answers[$question_id] : '';

        // Fetch correct answer from the database
        $sql_correct_answer = "SELECT correct_answer FROM questions WHERE question_id = '$question_id'";
        $result_correct_answer = $conn->query($sql_correct_answer);

        if ($result_correct_answer->num_rows == 1) {
            $row = $result_correct_answer->fetch_assoc();
            $correct_answer = $row['correct_answer'];

            // Compare submitted answer with correct answer
            if ($submitted_answer == $correct_answer) {
                // Answer is correct
                $correct_answers_count++;
                // You can implement your logic here, like storing the result in the database
            } else {
                // Answer is incorrect
                // You can implement your logic here, like storing the result in the database
            }
        }
    }

    // Calculate the percentage of correct answers
    $percentage_correct = ($correct_answers_count / $total_questions) * 100;

    // Store the result in the database
    $current_date = date('Y-m-d'); // Format the current date as YYYY-MM-DD
    $sql_insert_result = "INSERT INTO results (name, total_questions, correct_answers, percentage_correct, test_date) VALUES ('$name', '$total_questions', '$correct_answers_count', '$percentage_correct', '$current_date')";

    if ($conn->query($sql_insert_result) === TRUE) {
        // Result stored successfully
    } else {
        echo "Error: " . $sql_insert_result . "<br>" . $conn->error;
    }

    // Redirect the user to a confirmation page or another appropriate location
    header("Location: confirmation_page.php?percentage_correct=$percentage_correct");
    exit();
} else {
    // Redirect the user if the form was not submitted properly
    header("Location: select_subject.php");
    exit();
}
?>
