<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
    header("Location: llogin.php");
    exit();
}

// Fetch feedbacks for the lawyer
$feedbacksQuery = "SELECT * FROM `feedbacks` ;
$feedbacksResult = $con->query($feedbacksQuery);
$feedbacks = $feedbacksResult->fetch_all(MYSQLI_ASSOC);

if (isset($_POST['submit_response']) && isset($_POST['feedback_id'])) {
    $feedbackIdToRemove = $_POST['feedback_id'];

    // Perform the deletion from the database
    $removeQuery = "DELETE FROM `feedbacks` WHERE `id` = $feedbackIdToRemove";
    $con->query($removeQuery);

    // Redirect to the same page to refresh the feedback list
    header("Location: avfeedback.php");
    exit();
}
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

        .c {
            border-radius: 5px;
            margin: 1px;
            background: #fff;
            height: auto;
            width: 55%;
            padding: 25px 30px;

            margin-left: 25%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<header>
    <img src="logo.jpg" width="10%" height="20%">
    <ul class="nav">
        <li><a href="ahome.php">Home</a></li>
        <li><a href="amclint.php">Manage Clients</a></li>
        <li><a href="amlawer.php">Manage Lawyers</a></li>
        <li><a href="avfeedback.php">Feedback</a></li>
        <li><a href="avcontact.php">Contact Us</a></li>
        <li style="float:right"><a href="logout.php">Logout</a></li>
    </ul>
</header>

<div class="c">
    <h1>Feedbacks</h1>

    <?php
    if (empty($feedbacks)) {
        echo "<p>No feedbacks available.</p>";
    } else {
        echo '<table>';
        echo '<tr><th>Subject</th><th>Message</th><th>Response</th><th>Timestamp</th><th>Action</th></tr>';

        foreach ($feedbacks as $feedback) {
            echo '<tr>';
            echo '<td>' . $feedback['subject'] . '</td>';
            echo '<td>' . $feedback['message'] . '</td>';
            echo '<td>' . $feedback['response'] . '</td>';
            echo '<td>' . $feedback['timestamp'] . '</td>';
            echo '<td>';
            echo '<form action="#" method="POST">';
            echo '<input type="hidden" name="feedback_id" value="' . $feedback['id'] . '">';
            echo '<input type="submit" value="Delete" name="submit_response">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
    ?>


</div>
</body>
</html>
