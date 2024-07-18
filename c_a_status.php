<!-- appointment_history.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment History</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
    <style>
        .nav {
            margin-top: 50px;
        }

        .tables {
    margin-top: 20px;
    width: 75%;
    background-color: white;
    border-radius: 5px;
    margin-left: auto;
    margin-right: auto;
    height: auto;
}



        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #f0f0f0; /* Light gray background color */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #717171; /* Dark green header background color */
            color: white; /* White text color for header */
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
            <li><a href="c_a_status.php">Appaoinment Status</a></li>
            <li><a href="cfeedback.php" class="active">Feedback</a></li>
            <li style="float:right"><a href="logout.php" class="active">Logout</a></li>
        </ul>
    </header>
              
    <div class="tables">
        <h1>Appointment Status</h1>

        <?php
        session_start();
        include 'db.php';

        if (!isset($_SESSION['email'])) {
            header("Location: llogin.php");
            exit();
        }

        $clientEmail = $_SESSION['email'];

        $query = "SELECT * FROM `appoinment` WHERE `cid` IN (SELECT `id` FROM `clint` WHERE `email`='$clientEmail')";
$result = $con->query($query);


        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>Title</th><th>Date</th><th>Time</th><th>Case Description</th><th>Status</th></tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['Title'] . '</td>';
                echo '<td>' . $row['date'] . '</td>';
                echo '<td>' . $row['time'] . '</td>';
                echo '<td>' . $row['case_discription'] . '</td>';
                echo '<td>' . $row['status'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo '<p>No appointments found.</p>';
        }

        $con->close();
        ?>
    </div>
</body>
</html>
