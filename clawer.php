<?php
session_start();
include 'db.php';

$sql = "SELECT * FROM `lawers`";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawyer Profiles</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="view.css">
    <script src="https://kit.fontawesome.com/ee1af068c0.js"></script>
    <style>
        .nav {
            margin-top: 45px;
        }

        body {
            overflow: scroll;
        }

        .lawer {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            max-width: 1200px;
            margin: 0 auto;
        }

        .lawyer-card {
            width: 30%;
            margin: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
            background: white;
        }

        .profil {
            width: 300px;
            background: white;
            height: 300px;
        }
    </style>
</head>

<body>
    <header>
        <img src="logo.jpg" width="10%" height="20%">
        <ul class="nav">
            <li><a href="homes.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="lawer.php">Lawers</a></li>
            <li><a href="condact.php">Contact us</a></li>
            <li style="float:right"><a href="login.php" class="active">Login</a></li>
        </ul>
    </header>

    <div class="lawer">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="lawyer-card">
                <form action="ldetails.php" method="post" enctype="multipart/form-data">
                <center>
                    <br>
                    <img src="<?php echo 'imgs/' . $row['profile_picture']; ?>" width="100" height="100" alt="Profile Picture">
                </center>
                <h3>Adv. <?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h3>
                <h4>Legal Specialization:</h4> <p><?php echo $row['specialization']; ?></p>
                <h4>Practicing at: </h4><p><?php echo $row['Practicing_at']; ?></p>
                    <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                    <input type="submit" name="View_Details" value="View_Details"><br><br>
                </form>
            </div>
        <?php } ?>
    </div>
</body>

</html>

<?php
$con->close();
?>
