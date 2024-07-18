<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
    header("Location: clogin.php");
    exit();
}

if (isset($_POST['email'])) {
    $lawyerEmail = $_POST['email'];

    // Store lawyer's email in the session
    $_SESSION['lawyer_email'] = $lawyerEmail;
    
    // Fetch lawyer details based on email
    $sql = "SELECT * FROM `lawers` WHERE `email`='$lawyerEmail'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<script>alert('Viewing details failed.')</script>";
        header('location: lawer.php');
        exit(); // Added exit to stop further execution
    }
} else {
    echo "<script>alert('Viewing details failed.')</script>";
    header('location: lawer.php');
    exit(); // Added exit to stop further execution
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Details</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
    <style>
        .nav{
            margin-top: 3.5%;
        }
        body {
            overflow: scroll;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
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
            <li><a href="chomes.php">Home</a></li>
            <li><a href="cabout.php">About</a></li>
            <li><a href="lawer.php">Lawers</a></li>
            <li><a href="c_a_status.php">Appaoinment Status</a></li>
            <li><a href="cfeedback.php" class="active">Feedback</a></li>
            <li style="float:right"><a href="logout.php" class="active">Logout</a></li>
        </ul>
    </header>

    <div class="container">
        <center>
            <form action="cappoinment.php" method="post" enctype="multipart/form-data">
                <h1>Lawyer Details</h1>
                <h3>Adv. <?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h3>
                <img src="<?php echo 'imgs/' . $row['profile_picture']; ?>" alt="Profile Picture" width="100" height="100"></center>
                <table>
                    <tr>
                        <td>E-mail</td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td><?php echo $row['phone_number']; ?></td>
                    </tr>
                    <tr>
                        <td>Legal Specialization</td>
                        <td><?php echo $row['specialization']; ?></td>
                    </tr>
                    <tr>
                        <td>Practicing at</td>
                        <td><?php echo $row['Practicing_at']; ?></td>
                    </tr>
                    <tr>
                        <td>Consolation Time</td>
                        <td><?php echo $row['consultation_time']; ?></td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td><?php echo $row['location']; ?></td>
                    </tr>
                    <tr>
                        <td>Bio</td>
                        <td><?php echo $row['bio']; ?></td>
                    </tr>
                </table>
                <input type="hidden" name="lawyer_email" value="<?php echo $row['email']; ?>">
                <input type="submit" value="Book Appointment" name="appoinment">
            </form>
        </div>
    </body>
    </html>
