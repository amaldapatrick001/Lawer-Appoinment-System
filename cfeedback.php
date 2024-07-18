<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
    header("Location: clogin.php");
    exit();
}

// Get the list of lawyers for the dropdown
$lawyersQuery = "SELECT `id`, `first_name`, `last_name` FROM `lawers`";
$lawyersResult = $con->query($lawyersQuery);
$lawyers = $lawyersResult->fetch_all(MYSQLI_ASSOC);

$clientEmail = isset($_SESSION['email']) ? $_SESSION['email'] : '';

if (isset($_POST['submit'])) {
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $lawyerId = $_POST['lawyer_id']; // Selected lawyer ID

    // Get client's ID using the email
    $clientIdQuery = "SELECT `id` FROM `clint` WHERE `email`='$clientEmail'";
    $clientIdResult = $con->query($clientIdQuery);
    $clientIdRow = $clientIdResult->fetch_assoc();
    $clientId = $clientIdRow['id'];

    // Insert feedback into the database with the associated lawyer
    $insertSql = "INSERT INTO `feedbacks` (`client_id`, `lawyer_id`, `subject`, `message`, `timestamp`) 
                  VALUES ('$clientId', '$lawyerId', '$subject', '$message', NOW())";

    if (mysqli_query($con, $insertSql)) {
        echo "<script>alert('Feedback submitted successfully.')</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// Fetch previous feedbacks for the client
$clientIdQuery = "SELECT `id` FROM `clint` WHERE `email`='$clientEmail'";
$clientIdResult = $con->query($clientIdQuery);
$clientIdRow = $clientIdResult->fetch_assoc();
$clientId = $clientIdRow['id'];

// Fetch previous feedbacks and responses for each lawyer
$previousFeedbacksQuery = "SELECT l.`first_name`, l.`last_name`, f.* FROM `feedbacks` f
                           INNER JOIN `lawers` l ON f.`lawyer_id` = l.`id`
                           WHERE f.`client_id`='$clientId'";
$previousFeedbacksResult = $con->query($previousFeedbacksQuery);
$previousFeedbacks = $previousFeedbacksResult->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
    <style>
        .nav {
            margin-top: 50px;
        }
        
        body {
            overflow: scroll
        }
    </style>
</head>
<body>
    <header>
        <img src="logo.jpg" width="10%" height="20%">
        <ul class="nav">
            <li><a href="chomes.php">Home</a></li>
            <li><a href="cabout.php">About</a></li>
            <li><a href="clawer.php">Lawers</a></li>
            <li><a href="c_a_status.php">Appointment Status</a></li>
            <li><a href="cfeedback.php" class="active">Feedback</a></li>
            <li style="float:right"><a href="logout.php" class="active">Logout</a></li>
        </ul>
    </header>
    
    <div class="container">
        <h1>Feedback Form</h1>
        <form action="#" method="POST">
            <div class="input-box">
                <label for="lawyer_id">Select Lawyer:</label>
                <select name="lawyer_id" required>
                    <?php
                        foreach ($lawyers as $lawyer) {
                            echo "<option value='{$lawyer['id']}'>{$lawyer['first_name']} {$lawyer['last_name']}</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="input-box">
                <label for="subject">Subject:</label>
                <input type="text" name="subject" required>
            </div>
            <div class="input-box">
                <label for="message">Message:</label>
                <textarea name="message" required></textarea>
            </div>
            <input type="submit" value="Submit Feedback" name="submit">
        </form>

        <h2>Your Previous Feedbacks:</h2>
        <?php
            if (empty($previousFeedbacks)) {
                echo "<p>No previous feedbacks available.</p>";
            } else {
                foreach ($previousFeedbacks as $feedback) {
                    echo "<div>";
                    echo "<strong>Lawyer:</strong> {$feedback['first_name']} {$feedback['last_name']}<br>";
                    echo "<strong>Subject:</strong> {$feedback['subject']}<br>";
                    echo "<strong>Message:</strong> {$feedback['message']}<br>";
                    echo "<strong>Response:</strong> {$feedback['response']}<br>";
                    echo "<strong>Timestamp:</strong> {$feedback['timestamp']}<br>";
                    echo "</div><hr>";
                }
            }
        ?>
    </div>
</body>
</html>
