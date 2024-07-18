<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
    header("Location: alogin.php");
    exit();
}

$sql = "SELECT * FROM `clint`";
$result = $con->query($sql);

if (!$result) {
    die("Error: " . $con->error);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="style.css">
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
    <h1>Manage Clients</h1>
    <?php
    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Last Login</th><th>Status</th><th>Action</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['first_name'] . '</td>';
            echo '<td>' . $row['last_name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['phone_number'] . '</td>';
            echo '<td>' . $row['last_login_time'] . '</td>';
            echo '<td>' . $row['Status'] . '</td>';
            echo '<td>';
            echo '<form action="#" method="POST">';
            echo '<input type="hidden" name="cid" value="' . $row['id'] . '">';
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
        echo '<p>No clients found.</p>';
    }

    if (isset($_POST['update_status'])) {
        $cid = $_POST['cid'];
        $newStatus = $_POST['new_status'];

        $updateStatusQuery = "UPDATE `clint` SET `Status`='$newStatus' WHERE `id`='$cid'";
        if (mysqli_query($con, $updateStatusQuery)) {
            echo "<script>alert('Status updated successfully.')</script>";
            // Refresh the page after updating status
            header('location: amclint.php');
        } else {
            echo "Error updating status: " . mysqli_error($con);
        }
    }

    $con->close();
    ?>
</div>
</body>
</html>
