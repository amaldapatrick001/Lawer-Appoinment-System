<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
    header("Location: llogin.php");
    exit();
}

$email = $_SESSION['email'];

// Fetch the existing details
$sql = "SELECT * FROM `lawers` WHERE email = '$email'";
$result = $con->query($sql);


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fname = $row['first_name'];
    $lname = $row['last_name'];
    $email = $row['email'];
    $phone = $row['phone_number'];
    $bar_number = $row['bar_number'];
    $specialization = $row['specialization'];
    $education = $row['education'];
    $experience = $row['experience'];
    $consultation_time = $row['consultation_time'];
    $location = $row['location'];
    $bio = $row['bio'];
    $Practicing_at = $row['Practicing_at'];
    $profile_picture=$row['profile_picture'];
} 

?>


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

        .input-box input,
        .input-box textarea {
            height: 40px;
            width: 100%; 
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
            padding: 0 10px;
            font-size: 16px;
            box-sizing: border-box;
            margin-top: 5px;
        }

        textarea {
            height: 100px; 
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
        <h1>Edit Profile</h1>
        




        <form action="lupdate.php" method="POST" enctype="multipart/form-data">
            <div class="user-details">
                <div class="input-box">
                    <label for="fname">Name:</label>
                    <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>">
                </div>
                <div class="input-box">
                <br><input type="text" id="lname" name="lname" value="<?php echo $lname; ?>">
                </div>
                <div class="input-box">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="input-box">
                    <label for="phone">Phone Number:</label>
                    <input type="number" id="phone" name="phone" value="<?php echo $phone; ?>">
                </div>
                <div class="input-box">
                    <label for="bar_number">Bar Association Registration Number:</label>
                    <input type="text" id="bar_number" name="bar_number" value="<?php echo $bar_number; ?>">
                </div>
                <div class="input-box">
                    <label for="specialization">Legal Specialization:</label>
                    <input type="text" id="specialization" name="specialization" value="<?php echo $specialization; ?>">
                </div>
                <div class="input-box">
                    <label for="profile_picture">Profile Picture:</label>
                    <img src="<?php echo 'imgs/' . $profile_picture; ?>" width="100" height="100" alt="Profile Picture">
                    <input type="file" name="profile_picture" id="profile_picture" accept="image/*">
                </div>

                <div class="input-box">
                    <label for="education">Education:</label>
                    <input type="text" id="education" name="education" value="<?php echo $education; ?>">
                </div>
                <div class="input-box">
                    <label for="experience">Experience:</label>
                    <input type="text" id="experience" name="experience" value="<?php echo $experience; ?>">
                </div>
                <div class="input-box">
                    <label for="Practicing_at">Practicing at:</label>
                    <input type="text" id="Practicing_at" name="Practicing_at" value="<?php echo $Practicing_at; ?>">
                </div>
                <div class="input-box">
                    <label for="consultation_time">Consolation time:</label>
                    <input type="text" id="consultation_time" name="consultation_time" value="<?php echo $consultation_time; ?>">
                </div>
                <div class="input-box">
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" value="<?php echo $location; ?>">
                </div>
                <div class="input-box">
                    <label for="bio">Bio:</label>
                    <textarea id="bio" name="bio"><?php echo $bio; ?></textarea>
                </div>
            </div>

        <div class="button">
            <input type="submit" value="UPDATE" name="UPDATE">

            </div>
        </form>
    </div>
</body>

</html>

