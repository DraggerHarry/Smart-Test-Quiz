
<?php
        // Include header and database connection files
        include("header.php");
        include("connect.php");

        // Initialize variables
        $active_users_count = 0;
        $tests_attempted_count = 0;

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            // Retrieve the selected month and year
            $selected_month = $_POST['month'];
            $selected_year = $_POST['year'];

            // Query to fetch the total number of users logged in for the selected month and year
            $sql_active_users = "SELECT COUNT(*) AS active_users_count FROM users WHERE DATE_FORMAT(signup_date, '%Y-%m') = '$selected_year-$selected_month'";
            $result_active_users = $conn->query($sql_active_users);
            $row_active_users = $result_active_users->fetch_assoc();
            $active_users_count = $row_active_users['active_users_count'];

            // Query to fetch the total number of tests attempted for the selected month and year
            $sql_tests_attempted = "SELECT COUNT(*) AS tests_attempted_count FROM results WHERE DATE_FORMAT(test_date, '%Y-%m') = '$selected_year-$selected_month'";
            $result_tests_attempted = $conn->query($sql_tests_attempted);
            $row_tests_attempted = $result_tests_attempted->fetch_assoc();
            $tests_attempted_count = $row_tests_attempted['tests_attempted_count'];
        }
        ?>

       
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Your custom CSS styles -->
    <style>
        /* Custom styles for the form and cards */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            margin-top: 50px;
        }

        .form-group {
            margin: 20px auto;
            width:400px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: all 0.3s ease;
            width:0px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .card {
            margin-left:220px ;
            width: 300px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .number-display {
            font-size: 2rem;
            font-weight: bold;
            color: #007bff;
        }

        /* Style for form labels */
        label {
            font-weight: bold;
        }

        /* Style for form select elements */
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background-color: #f8f9fa;
            transition: border-color 0.3s ease;
        }

        /* Style for form select options */
        option {
            background-color: #fff;
            color: #000;
        }

        /* Style for form submit button */
        .btn {
     margin-left: 670px;
            width: 10%;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Form for selecting month and year -->
        <!-- Form for selecting month and year -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="form-group">
        <label for="month">Select Month:</label>
        <select class="form-control" id="month" name="month">
            <?php
            $currentMonth = date('m');
            $months = array('01' => 'January', '02' => 'February', '03' => 'March', '04' => 'April', '05' => 'May', '06' => 'June', '07' => 'July', '08' => 'August', '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December');
            foreach ($months as $key => $value) {
                $selected = ($key == $currentMonth) ? 'selected' : '';
                echo '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="year">Select Year:</label>
        <select class="form-control" id="year" name="year">
            <?php
            $currentYear = date('Y');
            for ($year = $currentYear; $year >= 2020; $year--) {
                $selected = ($year == $currentYear) ? 'selected' : '';
                echo '<option value="' . $year . '" ' . $selected . '>' . $year . '</option>';
            }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Show Results</button>
</form>


        <!-- Display the information -->
        <div class="row justify-content-center mt-5">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Users Registered</h5>
                        <p class="number-display"><?php echo $active_users_count; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Tests Attempted</h5>
                        <p class="number-display"><?php echo $tests_attempted_count; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
