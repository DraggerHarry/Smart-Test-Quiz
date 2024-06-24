<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Answer Questions</title>
    <!-- Your CSS styles here -->
    <style>
        .question {
            display: none;
        }
        .question {
            display: none;
        }
        .selectans-cont {
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 600px; /* Adjust the maximum width as needed */
    margin: 20px auto; /* Center the container horizontally */
}

.selectans-cont h2 {
    background-color: #15AB9A;
    height: 50px;
    padding: 10px 12px;
    font-size: 24px;
    color: white;
    margin-bottom: 20px;
    text-align: center;
}

.selectans-cont form {
    margin-bottom: 20px;
}

.selectans-cont .question {
    margin-bottom: 20px;
}

.selectans-cont label {
    font-size: 18px;
    margin-bottom: 10px;
    display: block;
}

.selectans-cont input[type='radio'] {
    margin-bottom: 6px;
}

.selectans-cont #next-question, .selectans-cont #submit-answers {
    background-color: #15AB9A;
    color: white;
    border: none;
    border-radius: 6px;
    padding: 10px 20px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.selectans-cont #next-question:hover, .selectans-cont #submit-answers:hover {
    background-color: #128E7E;
}

.selectans-cont #next-question:focus, .selectans-cont #submit-answers:focus {
    outline: none;
    box-shadow: 0 0 10px #128E7E;
}

    </style>
</head>
<body>
    <?php
    include("header.php");  
    include("connect.php");

    // Check if subject_id and test_type are set in the URL
    if(isset($_GET['subject_id']) && isset($_GET['test_type'])) {
        $subject_id = $_GET['subject_id'];
        $test_type = $_GET['test_type'];

        // Fetch questions based on subject_id and test_type from the database
        $sql_questions = "SELECT * FROM questions WHERE subject_id = '$subject_id' AND test_type = '$test_type'";
        $result_questions = $conn->query($sql_questions);
    ?>
    <div class="selectans-cont">
    <h2>Answer Questions</h2>
    <form action="submit_answers.php" method="post" id="question-form">
        <?php
        // Store questions in an array
        $questions = [];
        if ($result_questions->num_rows > 0) {
            while ($row = $result_questions->fetch_assoc()) {
                $questions[] = $row;
            }
        }

        // Shuffle questions randomly
        shuffle($questions);

        foreach ($questions as $key => $question) {
            $question_count = $key + 1;
            echo "<div class='question' id='question-$question_count'>";
            echo "<label>{$question['question']}</label><br>";
            echo "<input type='hidden' name='question_ids[]' value='{$question['question_id']}'>";
            echo "<input type='radio' name='answers[{$question['question_id']}]' value='A'> A. {$question['option1']}<br>";
            echo "<input type='radio' name='answers[{$question['question_id']}]' value='B'> B. {$question['option2']}<br>";
            echo "<input type='radio' name='answers[{$question['question_id']}]' value='C'> C. {$question['option3']}<br>";
            echo "<input type='radio' name='answers[{$question['question_id']}]' value='D'> D. {$question['option4']}<br>";
            echo "</div>";
        }
        echo "<button type='button' id='next-question'>Next Question</button>";
        echo "<button type='submit' name='submit_answers' id='submit-answers' style='display:none;'>Submit Answers</button>";
        ?>
    </form>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var questions = document.querySelectorAll('.question');
        var currentQuestion = 0;
        var nextButton = document.getElementById('next-question');
        var submitButton = document.getElementById('submit-answers');
        var questionForm = document.getElementById('question-form');
        var timerDisplay = document.createElement('div');
        timerDisplay.setAttribute('id', 'timer');
        document.body.appendChild(timerDisplay);

        // Show the first question
        questions[currentQuestion].style.display = 'block';
        var timeLeft = 30;

        // Function to hide current question and show next question
        function showNextQuestion() {
            if (currentQuestion < questions.length - 1) {
                questions[currentQuestion].style.display = 'none';
                currentQuestion++;
                questions[currentQuestion].style.display = 'block';
                timeLeft = 30;
                startTimer();
            } else {
                nextButton.style.display = 'none';
                submitButton.style.display = 'block';
            }
        }

        // Event listener for next button
        nextButton.addEventListener('click', function() {
            showNextQuestion();
        });

        // Start timer for first question
        startTimer();

        // Timer function
        function startTimer() {
            var timer = setInterval(function() {
                timeLeft--;
                document.getElementById('timer').innerText = 'Time Left: ' + timeLeft + 's';
                if (timeLeft <= 0) {
                    clearInterval(timer);
                    showNextQuestion();
                }
            }, 1000);
        }
    });
    </script>
    <?php
    } else {
        // Redirect the user if subject_id or test_type is not set in the URL
        header("Location: select_subject.php");
        exit();
    }
    ?>
</body>
</html>
