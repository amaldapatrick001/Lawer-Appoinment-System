<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
    <style>
        .nav{
            margin-top:50px;
        }
        body {
            overflow: scroll
        }
    </style>
</head>
<body><header>
        <img src="logo.jpg" width="10%" height="20%">
        <ul class="nav">
            <li><a href="chomes.php">Home</a></li>
            <li><a href="cabout.php">About</a></li>
            <li><a href="clawer.php">Lawers</a></li>
            <li><a href="c_a_status.php">Appaoinment Status</a></li>
            <li><a href="cfeedback.php" class="active">Feedback</a></li>
            <li style="float:right"><a href="logout.php" class="active">Logout</a></li>
        </ul>
    </header>
    <div class="container">
        <h1>Appointment Booking</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="lawyer_email" value="<?php echo $row['email']; ?>">
           
            <div class="input-box">
                <label for="date">Date:</label>
                <input type="date" name="date" required>
            </div>
            <div class="input-box">
                <label for="time">Time:</label>
                <input type="time" name="time" required>
            </div>
            <div class="input-box">
                <label for="title">Title:</label>
                <input type="text" name="title" required>
            </div>
            <div class="input-box">
                <label for="case_discription">Case Description:</label>
                <textarea name="case_discription" required></textarea>
            </div>
            <input type="submit" value="Book Appointment" name="submit">
        </form>
    </div>
</body>
</html>
<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
    header("Location: llogin.php");
    exit();
}

// Retrieve the lawyer's email from the session
if (isset($_SESSION['lawyer_email'])) {
    $lawyerEmail = $_SESSION['lawyer_email'];
} else {
    // Handle the case when the lawyer's email is not set
    echo "<script>alert('Lawyer\'s email not found.')</script>";
    header('location: lawer.php');
    exit(); // Added exit to stop further execution
}

if (isset($_POST['submit'])) {
    $clientEmail = mysqli_real_escape_string($con, $_SESSION['email']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $case_description = mysqli_real_escape_string($con, $_POST['case_discription']);
    $status = 'Pending';

    // Get lawyer's ID using the email
    $lawyerIdQuery = "SELECT `id` FROM `lawers` WHERE `email`='$lawyerEmail'";
    $lawyerIdResult = $con->query($lawyerIdQuery);

    if (!$lawyerIdResult) {
        die("Error: " . $con->error);
    }

    $lawyerIdRow = $lawyerIdResult->fetch_assoc();

    if (!$lawyerIdRow) {
        die("Error: Lawyer not found.");
    }

    $lid = $lawyerIdRow['id'];

    // Get client's ID using the email
    $clientIdQuery = "SELECT `id` FROM `clint` WHERE `email`='$clientEmail'";
    $clientIdResult = $con->query($clientIdQuery);

    if (!$clientIdResult) {
        die("Error: " . $con->error);
    }

    $clientIdRow = $clientIdResult->fetch_assoc();

    if (!$clientIdRow) {
        die("Error: Client not found.");
    }

    $cid = $clientIdRow['id'];

    // Insert appointment into the database
    $insertSql = "INSERT INTO `appoinment` (`cid`, `lid`, `date`, `time`, `Title`, `case_discription`, `status`) 
                  VALUES ('$cid', '$lid', '$date', '$time', '$title', '$case_description', '$status')";

    if (mysqli_query($con, $insertSql)) {
        echo "<script>alert('Appointment booked successfully.')</script>";
        header('location: lawer.php');
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Error: " . mysqli_error($con);
}

$con->close();
?>
