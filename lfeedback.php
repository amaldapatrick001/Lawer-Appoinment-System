<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
    header("Location: llogin.php");
    exit();
}

$lawyerEmail = $_SESSION['email'];

// Fetch lawyer's ID using the email
$lawyerIdQuery = "SELECT `id` FROM `lawers` WHERE `email`='$lawyerEmail'";
$lawyerIdResult = $con->query($lawyerIdQuery);
$lawyerIdRow = $lawyerIdResult->fetch_assoc();
$lawyerId = $lawyerIdRow['id'];

// Fetch feedbacks for the lawyer
$feedbacksQuery = "SELECT c.`first_name` AS client_first_name, c.`last_name` AS client_last_name, f.*
                   FROM `feedbacks` f
                   INNER JOIN `clint` c ON f.`client_id` = c.`id`
                   WHERE f.`lawyer_id`='$lawyerId'";
$feedbacksResult = $con->query($feedbacksQuery);
$feedbacks = $feedbacksResult->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
    <style>
        .nav {
            margin-top: 50px;
        }
    </style>
</head>
<body>
<header>
        <img src="logo.jpg" width="10%" height="20%">
        <ul class="nav">
            <li><a href="lprofil.php">Profile</a></li>
            <li><a href="labout.php">About</a></li>
            <li><a href="ledit.php">Edit Profile</a></li>
            <li><a href="lappoinment.php">Appointments</a></li>
            <li><a href="lfeedback.php">Feedback</a></li>
            <li style="float:right"><a href="logout.php" class="active">Logout</a></li>
        </ul>
    </header>

    <div class="container">
        <h1>Feedbacks</h1>

        <?php
        if (empty($feedbacks)) {
            echo "<p>No feedbacks available.</p>";
        } else {
            foreach ($feedbacks as $feedback) {
                echo "<div>";
                echo "<strong>Client:</strong> {$feedback['client_first_name']} {$feedback['client_last_name']}<br>";
                echo "<strong>Subject:</strong> {$feedback['subject']}<br>";
                echo "<strong>Message:</strong> {$feedback['message']}<br>";
                echo "<strong>Response:</strong> {$feedback['response']}<br>";
                echo "<strong>Timestamp:</strong> {$feedback['timestamp']}<br>";

                // Add a form to respond to each feedback
                echo "<form action='#' method='POST'>";
                echo "<input type='hidden' name='feedback_id' value='{$feedback['id']}'>";
                echo "<textarea name='response' placeholder='Your response'></textarea>";
                echo "<input type='submit' value='Respond' name='submit_response'>";
                echo "</form>";

                echo "</div><hr>";
            }
        }
        ?>

        <?php
        if (isset($_POST['submit_response'])) {
            $feedbackId = $_POST['feedback_id'];
            $response = $_POST['response'];

            // Update the feedback with the response
            $updateQuery = "UPDATE `feedbacks` SET `response`='$response' WHERE `id`='$feedbackId'";
            if (mysqli_query($con, $updateQuery)) {
                echo "<script>alert('Response submitted successfully.')</script>";
            } else {
                echo "Error: " . mysqli_error($con);
            }
        }
        ?>
    </div>
</body>
</html>
