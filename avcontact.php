<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
    header("Location: alogin.php");
    exit();
}

$sql = "SELECT * FROM `contacts`";
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
        echo '<tr><th>Name</th><th>Email</th><th>Message</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['message'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>No contacts not found.</p>';
    }

?>
</div>
</body>
</html>
