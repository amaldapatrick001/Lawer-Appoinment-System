<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
    header("Location: alogin.php");
    exit();
}

$sql = "SELECT * FROM `lawers`";
$result = $con->query($sql);

if (!$result) {
    die("Error: " . $con->error);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Lawyers</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .nav {
            margin-top: 50px;
        }
        body {
            overflow: scroll
        }

        .c {
            border-radius: 5px;
            margin: 1px;
            background: #fff;
            height: auto;
            width: 95%;
            
    margin-left: 3%;
            padding: 25px 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
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
    <h1>Manage Lawyers</h1>
    <?php
    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Bar Number</th><th>Specialization</th><th>Education</th><th>Experience</th><th>Consultation Time</th><th>Location</th><th>Year</th><th>Status</th><th>Action</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['first_name'] . '</td>';
            echo '<td>' . $row['last_name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['phone_number'] . '</td>';
            echo '<td>' . $row['bar_number'] . '</td>';
            echo '<td>' . $row['specialization'] . '</td>';
            echo '<td>' . $row['education'] . '</td>';
            echo '<td>' . $row['experience'] . '</td>';
            echo '<td>' . $row['consultation_time'] . '</td>';
            echo '<td>' . $row['location'] . '</td>';
            echo '<td>' . $row['experience'] . '</td>';
            echo '<td>' . $row['status'] . '</td>';
            echo '<td>';
            echo '<form action="#" method="POST">';
            echo '<input type="hidden" name="lid" value="' . $row['id'] . '">';
            echo '<select name="new_status">';
            echo '<option value="activate">Activate</option>';
            echo '<option value="deactivate">Deactivate</option>';
            echo '</select>';
            echo '<input type="submit" value="Update" name="update_status">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>No lawyers found.</p>';
    }
    ?>
</div>
</body>
</html>
<?php
if (isset($_POST['update_status'])) {
    $lid = $_POST['lid'];
    $newStatus = $_POST['new_status'];

    $updateStatusQuery = "UPDATE `lawers` SET `Status`='$newStatus' WHERE `id`='$lid'";
    if (mysqli_query($con, $updateStatusQuery)) {
        echo "<script>alert('Status updated successfully.')</script>";
        // Refresh the page after updating status
        header('location: amlawer.php');
    } else {
        echo "Error updating status: " . mysqli_error($con);
    }
}

$con->close();
?>
?>


</div>

</body>
</html>
