<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
    <style>
        .nav{
            margin-top:50px
        }
        body {
            overflow: scroll
        }

        .container {
            height: auto;

        }
    </style>
</head>

<body> <header>
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
    
        <h1>Appointment History</h1>
        
        <?php
        session_start();
        include 'db.php';

        if (!isset($_SESSION['email'])) {
            header("Location: llogin.php");
            exit();
        }

        $email = $_SESSION['email'];

        $query = "SELECT * FROM `appoinment` WHERE `lid`in (SELECT `id` FROM `lawers` WHERE `email`='$email')";
        $result = $con->query($query);

        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>Date</th><th>Time</th><th>Title</th><th>Case Description</th><th>Status</th><th>Action</th></tr>';
            
            while ($appointmentRow = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $appointmentRow['date'] . '</td>';
                echo '<td>' . $appointmentRow['time'] . '</td>';
                echo '<td>' . $appointmentRow['Title'] . '</td>';
                echo '<td>' . $appointmentRow['case_discription'] . '</td>';
                echo '<td>' . $appointmentRow['status'] . '</td>';
                echo '<td>';
                echo '<form action="#" method="POST">';
                echo '<input type="hidden" name="appointment_id" value="' . $appointmentRow['id'] . '">';
                echo '<select name="new_status">';
                echo '<option value="Pending">Pending</option>';
                echo '<option value="Confirmed">Confirmed</option>';
                echo '<option value="Cancelled">Cancelled</option>';
                echo '<option value="Completed">Completed</option>';
                echo '</select>';
                echo '<input type="submit" value="Update" name="update_status">';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo '<p>No appointments found.</p>';
        }

        // Update appointment status
        if (isset($_POST['update_status'])) {
            $appointmentId = $_POST['appointment_id'];
            $newStatus = $_POST['new_status'];

            $updateStatusQuery = "UPDATE `appoinment` SET `status`='$newStatus' WHERE `id`='$appointmentId'";
            if (mysqli_query($con, $updateStatusQuery)) {
                echo "<script>alert('Status updated successfully.')</script>";
                // Refresh the page after updating status
                header('location: lappoinment.php');
            } else {
                echo "Error updating status: " . mysqli_error($con);
            }
        }

        $con->close();
        ?>
    </div>
</body>
</html>
